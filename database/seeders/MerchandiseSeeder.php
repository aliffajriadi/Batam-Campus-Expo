<?php

namespace Database\Seeders;

use App\Models\MerchandiseProduct;
use App\Models\MerchandiseBuyer;
use App\Models\User;
use Illuminate\Database\Seeder;

class MerchandiseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 15 products
        $productNames = [
            'Kaos BCE 2026' => 85000,
            'Hoodie BCE Limited' => 250000,
            'Topi Snapback BCE' => 75000,
            'Lanyard ID Card' => 25000,
            'Sticker Pack (5pcs)' => 15000,
            'Tumbler BCE' => 95000,
            'Totebag Canvas' => 65000,
            'Pin Badge Set' => 20000,
            'Notebook BCE' => 35000,
            'Gantungan Kunci' => 12000,
            'Masker BCE (3pcs)' => 30000,
            'Gelang Karet' => 10000,
            'Poster A3' => 20000,
            'Jacket Bomber BCE' => 350000,
            'Mousepad Gaming' => 45000,
        ];

        $products = [];
        foreach ($productNames as $name => $price) {
            $products[] = MerchandiseProduct::create([
                'name_product' => $name,
                'price' => $price,
                'description' => fake()->paragraph(2),
                'stock' => fake()->numberBetween(20, 100),
                'photo' => null,
                'created_at' => fake()->dateTimeBetween('-2 months', '-1 month'),
            ]);
        }

        // Get all users
        $users = User::all();

        // Create 100 merchandise buyers
        for ($i = 0; $i < 100; $i++) {
            $user = $users->random();
            $product = $products[array_rand($products)];
            $statusAcc = fake()->boolean(65); // 65% approved

            MerchandiseBuyer::create([
                'id_user' => $user->id,
                'id_product' => $product->id,
                'photo_transfer' => 'dummy/transfer_merch_' . fake()->uuid() . '.jpg',
                'status_acc' => $statusAcc,
                'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
            ]);
        }
    }
}
