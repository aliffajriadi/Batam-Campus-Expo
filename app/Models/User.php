<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'google_id',
        'email',
        'name',
        'photo',
        'email_verified_at',
        'password',
        'nohp',
        'asal_sekolah',
        'is_suspended',
    ];

    public $timestamps = true;

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
