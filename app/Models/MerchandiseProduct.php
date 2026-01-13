<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCacheOnMutation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MerchandiseProduct extends Model
{
    use ClearCacheOnMutation, HasFactory;

    protected $table = 'merchandise_product';

    protected static $cacheTagsToFlush = ['merchandise'];

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
