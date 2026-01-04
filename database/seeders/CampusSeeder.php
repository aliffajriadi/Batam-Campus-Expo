<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\CampusVoting;
use App\Models\User;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    public function run(): void
    {
        // Create 20 campuses
        $campuses = [
            'Politeknik Negeri Batam',
            'Universitas Batam',
            'Universitas Internasional Batam',
            'Universitas Putera Batam',
            'Universitas Riau Kepulauan',
            'STT Ibnu Sina',
            'STMIK Putera Batam',
            'Akademi Keperawatan Batam',
            'Politeknik Kesehatan Kemenkes',
            'Universitas Maritim Raja Ali Haji',
            'Institut Teknologi Batam',
            'Sekolah Tinggi Ilmu Ekonomi (STIE) Batam',
            'Akademi Akuntansi Permata Harapan',
            'Politeknik Pariwisata Batam',
            'Universitas Universal',
            'Akademi Teknik Ibnu Sina',
            'STIKES Mitra Bunda Persada',
            'Akademi Farmasi Ikifa',
            'Politeknik Astra',
            'Universitas Pelita Harapan',
        ];

        $campusModels = [];
        foreach ($campuses as $index => $name) {
            $campusModels[] = Campus::create([
                'name_campus' => $name,
                'location' => fake()->city() . ', Indonesia',
                'logo_campus' => 'https://via.placeholder.com/100x100?text=' . urlencode(substr($name, 0, 3)),
                'created_at' => now(),
            ]);
        }

        // Get users for voting
        $users = User::all();
        $votedUserIds = [];

        // Create 120 votes (unique per user)
        $voteCount = min(120, $users->count());
        $selectedUsers = $users->random($voteCount);

        foreach ($selectedUsers as $user) {
            $campus = $campusModels[array_rand($campusModels)];

            CampusVoting::create([
                'id_campus' => $campus->id,
                'id_user' => $user->id,
                'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
            ]);
        }
    }
}
