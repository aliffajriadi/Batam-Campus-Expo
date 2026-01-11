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
        'singkatan',
        'akreditasi',
        'status',
        'tahun_berdiri',
        'jumlah_mahasiswa',
        'fakultas',
        'website',
        'deskripsi',
        'kota',
        'provinsi',
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    protected $casts = [
        'fakultas' => 'array',
        'tahun_berdiri' => 'integer',
        'jumlah_mahasiswa' => 'integer',
    ];

    public function votes()
    {
        return $this->hasMany(CampusVoting::class, 'id_campus');
    }
}
