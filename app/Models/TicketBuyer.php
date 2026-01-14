<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketBuyer extends Model
{
    use HasFactory;

    protected $table = 'ticket_buyer';

    protected $fillable = [
        'id_user',
        'id_ticket',
        'total_price',
        'status_acc',
        'photo_transfer',
        'done_check',
        'token',
        'check_at',
    ];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    protected $casts = [
        'status_acc' => 'boolean',
        'done_check' => 'boolean',
        'check_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ticket()
    {
        return $this->belongsTo(TicketStatus::class, 'id_ticket');
    }
}
