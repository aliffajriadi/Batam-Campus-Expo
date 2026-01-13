<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCacheOnMutation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use ClearCacheOnMutation, HasFactory;

    protected $fillable = ['user_id', 'post_id'];

    protected static $cacheTagsToFlush = ['posts'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
