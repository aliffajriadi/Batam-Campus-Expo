<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventSetting;
use App\Models\TicketStatus;
use App\Models\Campus;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $data = Cache::tags(['home_page', 'campuses'])->remember('home_data_campuses', 3600, function () {
            return [
                'top_campuses' => Campus::withCount('votes')
                    ->orderBy('votes_count', 'desc')
                    ->take(3)
                    ->get(),
            ];
        });

        return view('pages.home', $data);
    }
}
