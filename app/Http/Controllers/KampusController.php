<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\EventSetting;
use Illuminate\Support\Facades\Log;

class KampusController extends Controller
{
    public function index(Request $request)
    {
        $query = Campus::orderBy('name_campus', 'asc');

        // Search Filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_campus', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('singkatan', 'like', '%' . $search . '%');
            });
        }

        // Status Filter
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Pagination
        $kampuses = $query->paginate(10);

        // Handle AJAX Request
        if ($request->ajax()) {
            $view = view('pages.partials.kampus-cards', compact('kampuses'))->render();
            return response()->json([
                'html' => $view,
                'next_page_url' => $kampuses->nextPageUrl(),
                'kampuses_data' => $kampuses->items() // Send data for modal usage
            ]);
        }

        // Get event settings for layout variables
        $eventSetting = EventSetting::first();

        // Provide default values if no event settings exist
        $data = [
            'kampuses' => $kampuses,
            'lokasi' => $eventSetting->location_event ?? 'Mega Mall Batam Center, Lt. 3',
            'nohp' => $eventSetting->no_contact ?? '081234567890',
        ];

        return view('pages.kampus', $data);
    }

    public function vote(Request $request)
    {
        \Log::info('Voting request received', $request->all());

        $request->validate([
            'campus_id' => 'required|exists:campus,id'
        ]);

        $userId = auth()->id();
        $campusId = $request->campus_id;

        // Check if user already voted for this campus
        $existingVote = \App\Models\CampusVoting::where('id_user', $userId)
            ->where('id_campus', $campusId)
            ->first();

        if ($existingVote) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah memberikan vote untuk kampus ini sebelumnya.'
            ], 400);
        }

        // Create new vote
        \App\Models\CampusVoting::create([
            'id_user' => $userId,
            'id_campus' => $campusId,
            'created_at' => now()
        ]);

        \Log::info('Vote created successfully', ['user' => $userId, 'campus' => $campusId]);

        // Get updated vote count
        $voteCount = \App\Models\CampusVoting::where('id_campus', $campusId)->count();

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih telah memberikan vote!',
            'vote_count' => $voteCount
        ]);
    }
}
