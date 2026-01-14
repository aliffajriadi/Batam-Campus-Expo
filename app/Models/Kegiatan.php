<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCacheOnMutation;

class Kegiatan extends Model
{
    use HasFactory, ClearCacheOnMutation;

    protected $table = 'kegiatan';

    protected static $cacheTagsToFlush = ['kegiatans'];

    protected $fillable = [
        'time',
        'activity',
        'icon',
        'color',
        'order',
    ];
}
