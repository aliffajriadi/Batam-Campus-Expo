<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventSetting;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $query = EventSetting::first();

        // Provide default values if no event settings exist
        if (!$query) {
            $query = new EventSetting([
                'location_event' => 'Pollux Mall Batam Centre',
                'name_event' => 'Batam Campus Expo 2026',
                'end_event' => now()->addMonth()->addDays(3),
                'no_contact' => '+62 812-3456-7890',
                'google_maps' => '',
                'desc_event' => 'Batam Campus Expo 2026 adalah pameran pendidikan terbesar di Kepulauan Riau.',
            ]);
        }

        $schedule = Kegiatan::orderBy('order', 'asc')->get();

        $data = [
            'lokasi' => $query->location_event ?? 'Pollux Mall Batam Centre',
            'nama_event' => $query->name_event ?? 'Batam Campus Expo 2026',
            'end_event' => $query->end_event ?? now()->addMonth()->addDays(3)->format('Y-m-d H:i:s'),
            'no_contact' => $query->no_contact ?? '+62 812-3456-7890',
            'nohp' => $query->no_contact ?? '+62 812-3456-7890',
            'schedule' => $schedule,
        ];

        return view('pages.kegiatan', $data);
    }
}
