<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\EventSetting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
    {
        // Get top 3 campuses with highest votes
        $topCampuses = Campus::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->take(3)
            ->get();

        // Get all campuses with vote counts
        $allCampuses = Campus::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->get();

        // Get event settings
        $eventSetting = EventSetting::first();

        $data = [
            'topCampuses' => $topCampuses,
            'allCampuses' => $allCampuses,
            'lokasi' => $eventSetting->location_event ?? 'Mega Mall Batam Center, Lt. 3',
            'nohp' => $eventSetting->no_contact ?? '081234567890',
        ];

        return view('pages.voting', $data);
    }
}
