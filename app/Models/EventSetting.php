<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSetting extends Model
{
    use HasFactory;

    protected $table = 'event_setting';

    protected $fillable = [
        'name_event',
        'start_event',
        'end_event',
        'location_event',
        'no_contact',
        'google_maps',
        'desc_event',
        'open_voting',
    ];

    protected $casts = [
        'start_event' => 'datetime',
        'end_event' => 'datetime',
        'open_voting' => 'boolean',
    ];
}
