<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampusVoting extends Model
{
    protected $table = 'campus_voting';

    protected $fillable = [
        'id_campus',
        'id_user',
        'created_at',
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'id_campus');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
