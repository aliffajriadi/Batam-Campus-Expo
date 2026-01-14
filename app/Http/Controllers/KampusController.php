<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\EventSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class KampusController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $search = $request->get('search', '');
        $status = $request->get('status', 'all');
        $isAjax = $request->ajax() ? 'ajax' : 'full';

        $cacheKey = "kampus_list_{$isAjax}_{$page}_{$search}_{$status}";

        $data = Cache::tags(['kampus_page', 'campuses'])->remember($cacheKey, 3600, function () use ($request) {
            $query = Campus::orderBy('name_campus', 'asc');

            // Search Filter
            if ($request->filled('search')) {
                $searchVal = $request->search;
                $query->where(function ($q) use ($searchVal) {
                    $q->where('name_campus', 'like', '%' . $searchVal . '%')
                        ->orWhere('location', 'like', '%' . $searchVal . '%')
                        ->orWhere('singkatan', 'like', '%' . $searchVal . '%');
                });
            }

            // Status Filter
            if ($request->filled('status') && $request->status !== 'all') {
                $query->where('status', $request->status);
            }

            // Pagination
            $kampuses = $query->paginate(10);

            // Handle AJAX Request data
            if ($request->ajax()) {
                $view = view('pages.partials.kampus-cards', compact('kampuses'))->render();
                return [
                    'ajax' => true,
                    'html' => $view,
                    'next_page_url' => $kampuses->nextPageUrl(),
                    'kampuses_data' => $kampuses->items()
                ];
            }

            return [
                'ajax' => false,
                'kampuses' => $kampuses,
            ];
        });

        if ($data['ajax']) {
            return response()->json([
                'html' => $data['html'],
                'next_page_url' => $data['next_page_url'],
                'kampuses_data' => $data['kampuses_data']
            ]);
        }

        return view('pages.kampus', $data);
    }

    public function vote(Request $request)
    {
        Log::info('Voting request received', $request->all());

        $request->validate([
            'campus_id' => 'required|exists:campus,id'
        ]);

        $userId = Auth::id();
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

        Log::info('Vote created successfully', ['user' => $userId, 'campus' => $campusId]);

        // Get updated vote count
        $voteCount = \App\Models\CampusVoting::where('id_campus', $campusId)->count();

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih telah memberikan vote!',
            'vote_count' => $voteCount
        ]);
    }
}
