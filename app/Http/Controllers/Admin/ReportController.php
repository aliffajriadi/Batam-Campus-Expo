<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketBuyer;
use App\Models\MerchandiseBuyer;
use App\Models\MerchandiseProduct;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Ticket Sales
        $ticketStats = [
            'total_sales' => TicketBuyer::where('status_acc', true)->count(),
            'total_revenue' => TicketBuyer::where('status_acc', true)->sum('total_price'),
            'pending_count' => TicketBuyer::where('done_check', false)->count(),
            'claimed_count' => TicketBuyer::where('done_check', true)->where('status_acc', true)->count(),
        ];

        // Merchandise Sales
        $merchandiseStats = [
            'total_sales' => MerchandiseBuyer::where('status_acc', true)->count(),
            'total_revenue' => MerchandiseBuyer::where('status_acc', true)
                ->join('merchandise_product', 'merchandise_buyer.id_product', '=', 'merchandise_product.id')
                ->sum('merchandise_product.price'),
            'pending_count' => MerchandiseBuyer::where('status_acc', false)->count(),
            'claimed_count' => MerchandiseBuyer::where('claimed', true)->count(),
        ];

        // Combined
        $totalRevenue = $ticketStats['total_revenue'] + $merchandiseStats['total_revenue'];
        $totalSales = $ticketStats['total_sales'] + $merchandiseStats['total_sales'];

        // Top Products
        $topProducts = MerchandiseProduct::withCount(['buyers' => function ($q) {
            $q->where('status_acc', true);
        }])->orderBy('buyers_count', 'desc')->take(5)->get();

        return view('admin.report.index', compact(
            'ticketStats',
            'merchandiseStats',
            'totalRevenue',
            'totalSales',
            'topProducts'
        ));
    }

    public function scanTicket()
    {
        return view('admin.report.scan-ticket');
    }

    public function verifyTicket(Request $request)
    {
        $request->validate([
            'purchase_id' => 'required',
        ]);

        $ticket = TicketBuyer::with(['user', 'ticket'])->find($request->purchase_id);

        if (!$ticket) {
            return back()->with('error', 'Tiket dengan ID #' . $request->purchase_id . ' tidak ditemukan');
        }

        if (!$ticket->status_acc) {
            return back()->with('error', 'Tiket #' . $request->purchase_id . ' belum diapprove');
        }

        if ($ticket->done_check) {
            return back()->with('warning', 'Tiket #' . $request->purchase_id . ' sudah pernah di-scan sebelumnya pada ' . $ticket->check_at);
        }

        // Mark as checked
        $ticket->update([
            'done_check' => true,
            'check_at' => now(),
        ]);

        return back()->with('success', 'Tiket #' . $request->purchase_id . ' berhasil di-scan! Pemilik: ' . $ticket->user->name);
    }
    public function checkTicket(Request $request)
    {
        $request->validate([
            'purchase_id' => 'required|string',
        ]);

        $purchaseId = $request->query('purchase_id');

        $ticket = TicketBuyer::with(['user', 'ticket'])
            ->where('token', $purchaseId)
            ->first();

        if (!$ticket) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tiket tidak ditemukan'
            ], 404);
        }

        if (!$ticket->status_acc) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tiket belum di-approve'
            ], 403);
        }

        if ($ticket->done_check) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Tiket sudah digunakan',
                'checked_at' => $ticket->check_at
            ], 409);
        }

        return response()->json([
            'status' => 'ready',
            'message' => 'Tiket valid, siap dikonfirmasi',
            'data' => [
                'nama'  => $ticket->user->name,
                'email' => $ticket->user->email,
                'event' => $ticket->ticket->name,
                'total_price' => $ticket->total_price,
                'asal_sekolah' => $ticket->user->asal_sekolah,
            ]
        ]);
    }


    public function confirmTicket(Request $request)
    {
        $request->validate([
            'purchase_id' => 'required|string',
        ]);

        $purchaseId = $request->query('purchase_id');

        $ticket = TicketBuyer::where('token', $purchaseId)->first();

        if (!$ticket) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tiket tidak ditemukan'
            ], 404);
        }

        if ($ticket->done_check) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Tiket sudah digunakan sebelumnya'
            ], 409);
        }

        $ticket->update([
            'done_check' => true,
            'check_at' => now(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Tiket berhasil dikonfirmasi'
        ]);
    }



    public function scanMerchandise()
    {
        return view('admin.report.scan-merchandise');
    }

    public function verifyMerchandise(Request $request)
    {
        $request->validate([
            'purchase_id' => 'required',
        ]);

        $purchase = MerchandiseBuyer::with(['user', 'product'])->find($request->purchase_id);

        if (!$purchase) {
            return back()->with('error', 'Pembelian dengan ID #' . $request->purchase_id . ' tidak ditemukan');
        }

        if (!$purchase->status_acc) {
            return back()->with('error', 'Pembelian #' . $request->purchase_id . ' belum diapprove');
        }

        if ($purchase->claimed) {
            return back()->with('warning', 'Merchandise #' . $request->purchase_id . ' sudah pernah diambil pada ' . $purchase->claimed_at);
        }

        // Mark as claimed
        $purchase->update([
            'claimed' => true,
            'claimed_at' => now(),
        ]);

        return back()->with('success', 'Merchandise #' . $request->purchase_id . ' berhasil di-scan! Produk: ' . $purchase->product->name_product . ' | Pemilik: ' . $purchase->user->name);
    }
}
