<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchandiseProduct extends Model
{
    protected $table = 'merchandise_product';

    protected $fillable = [
        'name_product',
        'price',
        'description',
        'stock',
        'photo',
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    public function buyers()
    {
        return $this->hasMany(MerchandiseBuyer::class, 'id_product');
    }
}
