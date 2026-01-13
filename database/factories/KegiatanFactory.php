<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KegiatanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'time' => $this->faker->time('H:i') . ' - ' . $this->faker->time('H:i'),
            'activity' => $this->faker->sentence,
            'icon' => $this->faker->word,
            'color' => $this->faker->hexColor,
            'order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
