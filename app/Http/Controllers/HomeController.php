<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventSetting;
use App\Models\TicketStatus;

class HomeController extends Controller
{
    public function index()
    {
        $query = EventSetting::first();
        $ticket = TicketStatus::first();
        
        // Pastikan data tersedia, jika tidak buat default
        if (!$query) {
            $query = new EventSetting([
                'location_event' => 'Mega Mall Batam Center, Lt. 3',
                'name_event' => 'Batam Campus Expo 2026',
                'end_event' => now()->addMonth()->addDays(3),
                'no_contact' => '081234567890',
                'google_maps' => '',
                'desc_event' => 'Batam Campus Expo 2026 adalah pameran pendidikan terbesar di Kepulauan Riau.',
            ]);
        }
        
        if (!$ticket) {
            $ticket = new TicketStatus([
                'status' => 'open'
            ]);
        }
        
        $data = [
            'lokasi' => $query->location_event ?? 'Mega Mall Batam Center, Lt. 3',
            'nama_event' => $query->name_event ?? 'Batam Campus Expo 2026',
            'end_event' => $query->end_event ?? now()->addMonth()->addDays(3)->format('Y-m-d H:i:s'),
            'no_contact' => $query->no_contact ?? '081234567890',
            'google_maps' => $query->google_maps ?? '',
            'desc_event' => $query->desc_event ?? 'Batam Campus Expo 2026 adalah pameran pendidikan terbesar di Kepulauan Riau. Acara ini menghadirkan berbagai universitas dan perguruan tinggi dari seluruh Indonesia.',
            'ticket_status' => $ticket->status ?? 'open',
            'nohp' => $query->no_contact ?? '081234567890',
        ];
        
        return view('pages.home', $data);
    }
}