<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    protected $fillable = [
        'nama_kampus',
        'singkatan',
        'kota',
        'provinsi',
        'deskripsi',
        'website',
        'logo',
        'akreditasi',
        'status',
        'tahun_berdiri',
        'jumlah_mahasiswa',
        'fakultas'
    ];

    protected $casts = [
        'fakultas' => 'array',
        'tahun_berdiri' => 'integer',
        'jumlah_mahasiswa' => 'integer'
    ];
}
