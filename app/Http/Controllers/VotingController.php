<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\EventSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VotingController extends Controller
{
    public function index()
    {
        $data = Cache::tags(['voting_page', 'campuses'])->remember('voting_data_campuses', 3600, function () {
            // Get top 3 campuses with highest votes
            $topCampuses = Campus::withCount('votes')
                ->orderBy('votes_count', 'desc')
                ->take(3)
                ->get();

            // Get top 10 campuses with vote counts
            $allCampuses = Campus::withCount('votes')
                ->orderBy('votes_count', 'desc')
                ->take(10)
                ->get();

            return [
                'topCampuses' => $topCampuses,
                'allCampuses' => $allCampuses,
            ];
        });

        return view('pages.voting', $data);
    }
}
