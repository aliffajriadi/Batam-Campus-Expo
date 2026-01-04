<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use App\Models\TicketBuyer;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        // Create ticket status first
        $ticketStatus = TicketStatus::create([
            'price' => 75000,
            'status' => 'open',
            'kuota_ticket' => 500,
            'discount' => 10,
            'auto_close_ticket_at' => now()->addMonths(2),
        ]);

        // Get all users
        $users = User::all();

        // Create 80 ticket buyers
        $count = min(80, $users->count());
        $selectedUsers = $users->random($count);

        foreach ($selectedUsers as $index => $user) {
            $statusAcc = fake()->boolean(70); // 70% approved
            $doneCheck = $statusAcc || fake()->boolean(50);

            TicketBuyer::create([
                'id_user' => $user->id,
                'id_ticket' => $ticketStatus->id,
                'total_price' => $ticketStatus->price * (1 - $ticketStatus->discount / 100),
                'status_acc' => $statusAcc,
                'photo_transfer' => 'dummy/transfer_' . fake()->uuid() . '.jpg',
                'done_check' => $doneCheck,
                'check_at' => $doneCheck ? fake()->dateTimeBetween('-1 month', 'now') : now(),
                'created_at' => fake()->dateTimeBetween('-2 months', 'now'),
            ]);
        }
    }
}
