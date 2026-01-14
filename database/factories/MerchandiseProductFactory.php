<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MerchandiseProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_product' => $this->faker->words(3, true),
            'price' => $this->faker->numberBetween(10000, 500000),
            'description' => $this->faker->paragraph,
            'stock' => $this->faker->numberBetween(0, 100),
            'photo' => 'dummy/merch/item.png',
        ];
    }
}
