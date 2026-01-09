<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TicketBuyer;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketUserController extends Controller
{
    public function index()
    {
        $ticket_buy = TicketBuyer::where('id_user', Auth::id())->first();
        $ticket = TicketStatus::first();
        $data = [
            'ticket' => $ticket_buy,
            'ticket_status' => $ticket,
        ];
        return view('pages.auth.ticket-user', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:png,jpg,jpeg,pdf|max:5048',
        ]);

        $ticket_buy = TicketBuyer::where('id_user', Auth::id())->first();
        $ticket = TicketStatus::first();

        $file = $request->file('payment_proof');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/payment_proof'), $filename);

        TicketBuyer::updateOrCreate(
            ['id_user' => Auth::id()], // Cari data yang id_user-nya ini
            [                          // Update atau buat dengan data ini
                'id_ticket' => 1,
                'photo_transfer' => $filename,
                'total_price' => $ticket->price,
                'status_acc' => 0,
            ]
        );

        return redirect()->route('ticket-user')->with('success', 'Bukti transfer berhasil diunggah!');
    }
}
