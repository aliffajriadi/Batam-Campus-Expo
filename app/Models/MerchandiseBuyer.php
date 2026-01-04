<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchandiseBuyer extends Model
{
    protected $table = 'merchandise_buyer';

    protected $fillable = [
        'id_user',
        'id_product',
        'photo_transfer',
        'status_acc',
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    protected $casts = [
        'status_acc' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(MerchandiseProduct::class, 'id_product');
    }
}
