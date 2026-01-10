<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            EventSeeder::class,
            TicketStatusSeeder::class,
            UserSeeder::class,
            TicketSeeder::class,
            MerchandiseSeeder::class,
            CampusSeeder::class,
        ]);
    }
}
