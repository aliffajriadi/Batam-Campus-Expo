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

        $data = [
            'ticket' => $ticket_buy,
            'tickets' => $tickets,
        ];

        if (Auth::user()->nohp == null || Auth::user()->asal_sekolah == null) {
            return redirect()->route('profile')->with('error', 'Haiii! Sebelum membeli tiket, silakan lengkapi nomor WhatsApp dan asal sekolah Kamu di halaman profil yaaa!');
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

            $ticket_buy = TicketBuyer::where('id_user', Auth::id())->lockForUpdate()->first();

            // Check if user already has a pending or approved ticket
            if ($ticket_buy && $ticket_buy->status_acc !== false) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Kamu sudah memiliki tiket yang sedang diproses atau sudah diverifikasi.');
            }

            if (!$ticket_buy || ($ticket_buy && $ticket_buy->id_ticket != $ticket_status->id)) {
                // If it's a new purchase OR changed ticket type from rejected one
                if ($ticket_status->sold_ticket >= $ticket_status->kuota_ticket) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'This ticket type is sold out.');
                }
            }

            // File upload logic
            $file = $request->file('payment_proof');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/payment_proof'), $filename);

            if ($ticket_buy) {
                // Handle Re-submission
                if ($ticket_buy->id_ticket != $ticket_status->id) {
                    // Changed ticket type: decrement old, increment new
                    $ticket_buy->ticket->decrement('sold_ticket');
                    $ticket_status->increment('sold_ticket');
                }
                // If same ticket type, we don't increment as it was already counted

                // Delete old photo if exists
                if ($ticket_buy->photo_transfer && file_exists(public_path('images/payment_proof/' . $ticket_buy->photo_transfer))) {
                    unlink(public_path('images/payment_proof/' . $ticket_buy->photo_transfer));
                }

                $ticket_buy->update([
                    'id_ticket' => $ticket_status->id,
                    'photo_transfer' => $filename,
                    'total_price' => $ticket_status->price * (1 - ($ticket_status->discount / 100)),
                    'status_acc' => null, // Reset to pending
                ]);
            } else {
                // New Purchase
                $ticket_status->increment('sold_ticket');
                TicketBuyer::create([
                    'id_user' => Auth::id(),
                    'id_ticket' => $ticket_status->id,
                    'photo_transfer' => $filename,
                    'token' => Str::random(60),
                    'total_price' => $ticket_status->price * (1 - ($ticket_status->discount / 100)),
                    'status_acc' => null, // Pending
                ]);
            }

            DB::commit();
            return redirect()->route('ticket-user')->with('success', 'Bukti transfer berhasil diunggah! Mohon tunggu verifikasi admin.');
        } catch (\Exception $e) {
            DB::rollBack();
            if (isset($filename) && file_exists(public_path('images/payment_proof/' . $filename))) {
                unlink(public_path('images/payment_proof/' . $filename));
            }
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
