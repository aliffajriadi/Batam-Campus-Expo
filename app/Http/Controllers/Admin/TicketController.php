<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketBuyer;
use App\Models\TicketStatus;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $query = TicketBuyer::with(['user', 'ticket']);

        // Search by user name or email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'pending') {
                // Pending is when status_acc is NULL
                $query->whereNull('status_acc');
            } elseif ($request->status === 'approved') {
                $query->where('status_acc', true);
            } elseif ($request->status === 'rejected') {
                $query->where('status_acc', false);
            }
        }

        // Filter by claimed status (done_check)
        if ($request->filled('claimed')) {
            if ($request->claimed === 'yes') {
                // Only show tickets that are approved and have been claimed
                $query->where('status_acc', true)->where('done_check', true);
            } elseif ($request->claimed === 'no') {
                // Only show tickets that are approved but not yet claimed
                $query->where('status_acc', true)->where('done_check', false);
            }
        }

        $buyers = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.ticket.index', compact('buyers'));
    }

    public function show($id)
    {
        $buyer = TicketBuyer::with(['user', 'ticket'])->findOrFail($id);
        return view('admin.ticket.show', compact('buyer'));
    }

    public function approve($id)
    {
        $buyer = TicketBuyer::findOrFail($id);
        $buyer->update([
            'status_acc' => true,
            // 'done_check' => true, // Remove this: Check-in is done via scan
            // 'check_at' => now(),
        ]);

        return redirect()->route('admin.ticket.index')->with('success', 'Ticket purchase approved');
    }

    public function reject($id)
    {
        $buyer = TicketBuyer::findOrFail($id);
        $buyer->update([
            'status_acc' => false,
            // 'done_check' => true, // Remove this
            // 'check_at' => now(),
        ]);

        return redirect()->route('admin.ticket.index')->with('success', 'Ticket purchase rejected');
    }

    public function destroy($id)
    {
        $buyer = TicketBuyer::findOrFail($id);
        $buyer->ticket->update([
            "sold_ticket" => $buyer->ticket->sold_ticket - 1
        ]);
        $buyer->delete();

        return redirect()->route('admin.ticket.index')->with('success', 'Ticket buyer deleted successfully');
    }

    public function settings()
    {
        $tickets = TicketStatus::all();
        return view('admin.ticket.settings', compact('tickets'));
    }

    public function editType($id)
    {
        $ticket = TicketStatus::findOrFail($id);
        return view('admin.ticket.edit', compact('ticket'));
    }

    public function storeType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'status' => 'required|in:open,pending,close',
            'kuota_ticket' => 'required|integer|min:0',
            'discount' => 'required|numeric|min:0|max:100',
            'auto_close_ticket_at' => 'required|date',
            'link' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
            'qr_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('qr_image')) {
            $path = $request->file('qr_image')->store('ticket-qr', 'public');
            $data['qr_image'] = $path;
        }

        TicketStatus::create($data);

        return redirect()->back()->with('success', 'Ticket type created successfully');
    }

    public function updateType(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'status' => 'required|in:open,pending,close',
            'kuota_ticket' => 'required|integer|min:0',
            'discount' => 'required|numeric|min:0|max:100',
            'auto_close_ticket_at' => 'required|date',
            'link' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
            'qr_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ticket = TicketStatus::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('qr_image')) {
            // Delete old image if exists
            if ($ticket->qr_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($ticket->qr_image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($ticket->qr_image);
            }
            $path = $request->file('qr_image')->store('ticket-qr', 'public');
            $data['qr_image'] = $path;
        }

        $ticket->update($data);

        return redirect()->route('admin.ticket.settings')->with('success', 'Ticket type updated successfully');
    }

    public function destroyType($id)
    {
        $ticket = TicketStatus::findOrFail($id);

        // Prevent deleting if ticket has buyers
        if ($ticket->buyers()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete ticket type because it has already been purchased.');
        }

        $ticket->delete();

        return redirect()->back()->with('success', 'Ticket type deleted successfully');
    }

    public function updateSettings(Request $request)
    {
        // Deprecated or redirect to new structure if called legacy
        return redirect()->route('admin.ticket.settings');
    }

    public function toggleCheck($id)
    {
        $buyer = TicketBuyer::findOrFail($id);

        $newState = !$buyer->done_check;
        $buyer->update([
            'done_check' => $newState,
            'check_at' => $newState ? now() : null,
        ]);

        $statusMsg = $newState ? 'marked as checked-in' : 'marked as not checked-in';

        return redirect()->back()->with('success', "Ticket status updated: $statusMsg");
    }

    public function export()
    {
        $fileName = 'tickets_sales_export_' . date('Y-m-d_H-i-s') . '.csv';
        $buyers = TicketBuyer::with(['user', 'ticket'])->orderBy('created_at', 'desc')->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('No', 'Name', 'Email', 'Phone', 'School', 'Ticket Type', 'Price', 'Status', 'Check-in Status', 'Purchase Date');

        $callback = function () use ($buyers, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($buyers as $index => $buyer) {
                $status = 'Pending';
                if ($buyer->status_acc === true) $status = 'Approved';
                if ($buyer->status_acc === false) $status = 'Rejected';

                $checkIn = $buyer->done_check ? 'Checked In' : 'Not Checked In';

                $row['No']  = $index + 1;
                $row['Name']    = $buyer->user->name;
                $row['Email']   = $buyer->user->email;
                $row['Phone']   = $buyer->user->nohp ?? '-';
                $row['School']  = $buyer->user->asal_sekolah ?? '-';
                $row['Ticket Type']  = $buyer->ticket->name ?? '-';
                $row['Price']  = $buyer->total_price;
                $row['Status']  = $status;
                $row['Check-in Status']  = $checkIn;
                $row['Purchase Date']  = $buyer->created_at;

                fputcsv($file, array($row['No'], $row['Name'], $row['Email'], $row['Phone'], $row['School'], $row['Ticket Type'], $row['Price'], $row['Status'], $row['Check-in Status'], $row['Purchase Date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
