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
            'lokasi' => $query->location_event,
            'nama_event' => $query->name_event,
            'end_event' => $query->end_event,
            'no_contact' => $query->no_contact,
            'google_maps' => $query->google_maps,
            'desc_event' => $query->desc_event,
            'ticket_status' => $ticket->status,
            'nohp' => $query->no_contact,
        ];
        return view('pages.home', $data);
    }
}