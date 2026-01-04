<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventSetting;
use Illuminate\Http\Request;

class EventSettingController extends Controller
{
    public function index()
    {
        $eventSetting = EventSetting::first();
        return view('admin.event.index', compact('eventSetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name_event' => 'required|string',
            'start_event' => 'required|date',
            'end_event' => 'required|date|after:start_event',
            'location_event' => 'required|string',
            'no_contact' => 'required|string',
            'google_maps' => 'nullable|string',
            'desc_event' => 'required|string',
            'open_voting' => 'boolean',
        ]);

        $data = $request->all();
        $data['open_voting'] = $request->has('open_voting');

        $eventSetting = EventSetting::first();
        if ($eventSetting) {
            $eventSetting->update($data);
        } else {
            EventSetting::create($data);
        }

        return redirect()->back()->with('success', 'Event setting updated successfully');
    }
}
