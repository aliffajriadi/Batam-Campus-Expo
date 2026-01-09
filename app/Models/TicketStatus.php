<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    protected $table = 'ticket_status';

    protected $fillable = [
        'price',
        'status',
        'kuota_ticket',
        'discount',
        'auto_close_ticket_at',
        'sold_ticket',
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
