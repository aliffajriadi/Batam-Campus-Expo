<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['username' => env('ADMIN_USERNAME')],
            [
                'username' => env('ADMIN_USERNAME'),
                'password' => Hash::make(env('ADMIN_PASSWORD')),
            ]
        );
    }
}
