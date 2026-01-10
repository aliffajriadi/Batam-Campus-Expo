<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    public function run(): void
    {
        TicketStatus::create([
            'price' => 75000,
            'status' => 'open',
            'kuota_ticket' => 500,
            'discount' => 10,
            'auto_close_ticket_at' => now()->addMonths(2),
            'sold_ticket' => 0,
        ]);
    }
}