<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TicketBuyer;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketUserController extends Controller
{
    public function index()
    {
        $ticket_buy = TicketBuyer::where('id_user', Auth::id())->first();
        $tickets = TicketStatus::where('status', '!=', 'close')->get();
        // Fallback if no tickets exist or all closed, maybe show empty list

        $data = [
            'ticket' => $ticket_buy,
            'tickets' => $tickets,
        ];
        if (Auth::user()->nohp == null || Auth::user()->asal_sekolah == null) {
            return redirect()->route('profile')->with('error', 'Silahkan lengkapi data diri Kamu terlebih dahulu yaaa!');
        }
        return view('pages.auth.ticket-user', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:png,jpg,jpeg,pdf|max:5048',
            'ticket_id' => 'required|exists:ticket_status,id',
        ]);

        DB::beginTransaction();
        try {
            // Lock the ticket row for update to prevent race conditions
            $ticket_status = TicketStatus::where('id', $request->ticket_id)->lockForUpdate()->firstOrFail();

            if ($ticket_status->status !== 'open') {
                DB::rollBack();
                return redirect()->back()->with('error', 'Ticket is not available for purchase.');
            }

            if ($ticket_status->sold_ticket >= $ticket_status->kuota_ticket) {
                DB::rollBack();
                return redirect()->back()->with('error', 'This ticket type is sold out.');
            }

            $ticket_buy = TicketBuyer::where('id_user', Auth::id())->lockForUpdate()->first();

            if ($ticket_buy) {
                DB::rollBack();
                return redirect()->back()->with('error', 'You have already purchased a ticket.');
            }

            $file = $request->file('payment_proof');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/payment_proof'), $filename);

            $ticket_status->increment('sold_ticket');

            TicketBuyer::create([
                'id_user' => Auth::id(),
                'id_ticket' => $ticket_status->id,
                'photo_transfer' => $filename,
                'token' => Str::random(60),
                'total_price' => $ticket_status->price * (1 - ($ticket_status->discount / 100)),
                'status_acc' => 0,
            ]);

            DB::commit();
            return redirect()->route('ticket-user')->with('success', 'Bukti transfer berhasil diunggah!');
        } catch (\Exception $e) {
            DB::rollBack();
            // Delete uploaded file if transaction fails to avoid orphans
            if (isset($filename) && file_exists(public_path('images/payment_proof/' . $filename))) {
                unlink(public_path('images/payment_proof/' . $filename));
            }
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses transaksi: ' . $e->getMessage());
        }
    }
}
