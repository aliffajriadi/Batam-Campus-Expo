<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameLeaderboard extends Model
{
    protected $table = 'game_leaderboard';

    protected $fillable = [
        'user_id',
        'username',
        'score',
        'time_taken',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
