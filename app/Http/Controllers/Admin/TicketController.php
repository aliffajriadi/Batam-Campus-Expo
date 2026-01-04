<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketBuyer;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $buyers = TicketBuyer::with(['user', 'ticket'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

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
            'done_check' => true,
            'check_at' => now(),
        ]);

        return redirect()->route('admin.ticket.index')->with('success', 'Ticket purchase approved');
    }

    public function reject($id)
    {
        $buyer = TicketBuyer::findOrFail($id);
        $buyer->update([
            'status_acc' => false,
            'done_check' => true,
            'check_at' => now(),
        ]);

        return redirect()->route('admin.ticket.index')->with('success', 'Ticket purchase rejected');
    }
}
