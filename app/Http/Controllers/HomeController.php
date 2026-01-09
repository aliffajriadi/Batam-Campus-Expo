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
        $data = [
            'lokasi' => $query->location_event ?? 'Lokasi Belum ada',
            'nama_event' => $query->name_event ?? 'Nama Event Belum ada',
            'end_event' => $query->end_event ?? 'End Event Belum ada',
            'no_contact' => $query->no_contact ?? 'No Contact Belum ada',
            'google_maps' => $query->google_maps ?? 'Google Maps Belum ada',
            'desc_event' => $query->desc_event ?? 'Deskripsi Event Belum ada',
            'ticket_status' => $ticket->status ?? 'close',
            'nohp' => $query->no_contact ?? 'No Contact Belum ada',
        ];
        return view('pages.home', $data);
    }
}