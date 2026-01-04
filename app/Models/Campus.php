<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campus';

    protected $fillable = [
        'name_campus',
        'location',
        'logo_campus',
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    public function votes()
    {
        return $this->hasMany(CampusVoting::class, 'id_campus');
    }
}
