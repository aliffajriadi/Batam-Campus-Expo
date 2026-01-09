<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TicketBuyer;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        if (Auth::user()->nohp == null || Auth::user()->asal_sekolah == null) {
            return redirect()->route('profile')->with('error', 'Silahkan lengkapi data diri Kamu terlebih dahulu yaaa!');
        }
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

        $ticket->update([
            'sold_ticket' => $ticket->sold_ticket + 1,
        ]);

        TicketBuyer::updateOrCreate(
            ['id_user' => Auth::id()], // Cari data yang id_user-nya ini
            [                          // Update atau buat dengan data ini
                'id_ticket' => 1,
                'photo_transfer' => $filename,
                'token' => Str::random(60),
                'total_price' => $ticket->price,
                'status_acc' => 0,
            ]
        );

        return redirect()->route('ticket-user')->with('success', 'Bukti transfer berhasil diunggah!');
    }
}
