<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCacheOnMutation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use ClearCacheOnMutation, HasFactory;

    protected $fillable = ['user_id', 'content'];

    protected static $cacheTagsToFlush = ['posts'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}
