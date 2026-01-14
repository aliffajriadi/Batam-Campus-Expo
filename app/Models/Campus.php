<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCacheOnMutation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Campus extends Model
{
    use ClearCacheOnMutation, HasFactory;

    protected $table = 'campus';

    protected static $cacheTagsToFlush = ['campuses'];

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

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->logo_campus)) {
                $model->logo_campus = 'dummy/logo/default.png';
            }
        });
    }
}
