<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventSetting;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Cache;

class KegiatanController extends Controller
{
    public function index()
    {
        $data = Cache::tags(['kegiatan_page', 'kegiatans'])->remember('kegiatan_data_schedule', 3600, function () {
            $schedule = Kegiatan::orderBy('order', 'asc')->get();

            return [
                'schedule' => $schedule,
            ];
        });

        return view('pages.kegiatan', $data);
    }
}
