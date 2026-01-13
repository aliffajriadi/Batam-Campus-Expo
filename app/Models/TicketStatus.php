<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ClearCacheOnMutation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketStatus extends Model
{
    use ClearCacheOnMutation, HasFactory;

    protected $table = 'ticket_status';

    protected static $cacheTagsToFlush = ['tickets'];

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'kuota_ticket',
        'discount',
        'auto_close_ticket_at',
        'sold_ticket',
        'link',
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    protected $casts = [
        'auto_close_ticket_at' => 'datetime',
        'discount' => 'decimal:2',
    ];

    public function buyers()
    {
        return $this->hasMany(TicketBuyer::class, 'id_ticket');
    }
}
