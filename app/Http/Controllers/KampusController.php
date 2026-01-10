<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kampus;
use App\Models\EventSetting;

class KampusController extends Controller
{
    public function index()
    {
        $kampuses = Kampus::orderBy('nama_kampus', 'asc')->get();
        
        // Get event settings for layout variables
        $query = EventSetting::first();
        
        // Provide default values if no event settings exist
        $data = [
            'kampuses' => $kampuses,
            'lokasi' => $query->location_event ?? 'Mega Mall Batam Center, Lt. 3',
            'nohp' => $query->no_contact ?? '081234567890',
        ];
        
        return view('pages.kampus', $data);
    }
}