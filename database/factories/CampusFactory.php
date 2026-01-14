<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CampusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_campus' => $this->faker->company . ' University',
            'location' => $this->faker->address,
            'logo_campus' => 'dummy/logo/default.png',
            'singkatan' => $this->faker->lexify('????'),
            'akreditasi' => $this->faker->randomElement(['A', 'B', 'C']),
            'status' => $this->faker->randomElement(['negeri', 'swasta']),
            'tahun_berdiri' => $this->faker->year,
            'jumlah_mahasiswa' => $this->faker->numberBetween(1000, 20000),
            'fakultas' => json_encode(['Fakultas Teknik', 'Fakultas Ekonomi']),
            'website' => $this->faker->url,
            'deskripsi' => $this->faker->paragraph,
            'kota' => 'Batam',
            'provinsi' => 'Kepulauan Riau',
        ];
    }
}
