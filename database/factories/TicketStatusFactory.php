<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(50000, 200000),
            'status' => 'open',
            'kuota_ticket' => 100,
            'sold_ticket' => 0,
            'link' => $this->faker->url,
        ];
    }
}
