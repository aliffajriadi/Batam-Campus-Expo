<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventSetting;

class KegiatanController extends Controller
{
    public function index()
    {
        // Get event settings for layout variables
        $query = EventSetting::first();
        
        // Provide default values if no event settings exist
        $data = [
            'lokasi' => $query->location_event ?? 'Pollux Mall Batam Centre',
            'nohp' => $query->no_contact ?? '+62 812-3456-7890',
        ];
        
        return view('pages.kegiatan', $data);
    }
}