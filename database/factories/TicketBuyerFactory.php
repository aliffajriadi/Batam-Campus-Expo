<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketBuyerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_user' => \App\Models\User::factory(),
            'id_ticket' => \App\Models\TicketStatus::factory(),
            'total_price' => 50000,
            'status_acc' => false,
            'photo_transfer' => 'proof.png',
            'done_check' => false,
            'token' => Str::upper(Str::random(10)),
        ];
    }
}
