<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\GameLeaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    public function index()
    {
        return view('pages.game');
    }

    public function getQuestions()
    {
        // Get 10 random campuses for the game
        $campuses = Campus::inRandomOrder()
            ->limit(10)
            ->get(['id', 'name_campus', 'logo_campus']);

        $questions = $campuses->map(function ($campus) {
            // Get 3 other random campuses as options
            $options = Campus::where('id', '!=', $campus->id)
                ->inRandomOrder()
                ->limit(3)
                ->pluck('name_campus')
                ->toArray();

            $options[] = $campus->name_campus;
            shuffle($options);

            return [
                'id' => $campus->id,
                'logo' => asset('storage/' . $campus->logo_campus),
                'correct_answer' => $campus->name_campus,
                'options' => $options,
            ];
        });

        return response()->json($questions);
    }

    public function submitScore(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validator = Validator::make($request->all(), [
            'score' => 'required|integer',
            'time_taken' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();
        $existingLeaderboard = GameLeaderboard::where('user_id', $user->id)->first();

        if ($existingLeaderboard) {
            // Only update if current score is better
            // Better = higher score OR same score with faster time
            $isBetterScore = $request->score > $existingLeaderboard->score;
            $isFasterSameScore = ($request->score == $existingLeaderboard->score) && ($request->time_taken < $existingLeaderboard->time_taken);

            if ($isBetterScore || $isFasterSameScore) {
                $existingLeaderboard->update([
                    'username' => $user->name,
                    'score' => $request->score,
                    'time_taken' => $request->time_taken,
                ]);

                // Clear Redis cache
                \Illuminate\Support\Facades\Cache::forget('game_leaderboard');

                return response()->json([
                    'message' => 'Skor tertinggi baru berhasil disimpan! 🔥',
                    'data' => $existingLeaderboard
                ]);
            }

            return response()->json([
                'message' => 'Main lagi yuk! Skor ini belum sanggup mengalahkan rekor terbaikmu. 💪',
                'data' => $existingLeaderboard
            ]);
        }

        $leaderboard = GameLeaderboard::create([
            'user_id' => $user->id,
            'username' => $user->name,
            'score' => $request->score,
            'time_taken' => $request->time_taken,
        ]);

        // Clear Redis cache
        \Illuminate\Support\Facades\Cache::forget('game_leaderboard');

        return response()->json([
            'message' => 'Skor berhasil masuk ke papan juara! 🎊',
            'data' => $leaderboard
        ]);
    }

    public function getLeaderboard()
    {
        $leaderboard = \Illuminate\Support\Facades\Cache::remember('game_leaderboard', 3600, function () {
            return GameLeaderboard::with('user:id,name,photo')
                ->orderBy('score', 'desc')
                ->orderBy('time_taken', 'asc')
                ->limit(10)
                ->get();
        });

        return response()->json($leaderboard);
    }
}
