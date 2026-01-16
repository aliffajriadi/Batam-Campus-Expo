<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiChatSetting extends Model
{
    protected $fillable = ['api_key', 'is_active', 'system_instruction'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
