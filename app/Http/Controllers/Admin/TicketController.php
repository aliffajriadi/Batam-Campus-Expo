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

    public function settings()
    {
        $ticketStatus = TicketStatus::first();
        return view('admin.ticket.settings', compact('ticketStatus'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'price' => 'required|integer|min:0',
            'status' => 'required|in:open,pending,close',
            'kuota_ticket' => 'required|integer|min:0',
            'discount' => 'required|numeric|min:0|max:100',
            'auto_close_ticket_at' => 'required|date',
        ]);

        $ticketStatus = TicketStatus::first();

        if ($ticketStatus) {
            $ticketStatus->update($request->only(['price', 'status', 'kuota_ticket', 'discount', 'auto_close_ticket_at']));
        } else {
            TicketStatus::create($request->only(['price', 'status', 'kuota_ticket', 'discount', 'auto_close_ticket_at']));
        }

        return redirect()->back()->with('success', 'Ticket settings updated successfully');
    }
}
