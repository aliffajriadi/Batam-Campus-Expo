<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [];

        for ($i = 1; $i <= 150; $i++) {
            $users[] = [
                'google_id' => 'google_' . fake()->uuid(),
                'email' => fake()->unique()->safeEmail(),
                'name' => fake()->name(),
                'photo' => 'https://i.pravatar.cc/150?img=' . ($i % 70 + 1),
                'email_verified_at' => now()->toDateTimeString(),
                'created_at' => fake()->dateTimeBetween('-3 months', 'now'),
            ];
        }

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
