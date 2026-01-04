<?php

namespace Database\Seeders;

use App\Models\EventSetting;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        EventSetting::create([
            'name_event' => 'Batam Campus Expo 2026',
            'start_event' => now()->addMonth(),
            'end_event' => now()->addMonth()->addDays(3),
            'location_event' => 'Mega Mall Batam Center, Lt. 3',
            'no_contact' => '081234567890',
            'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0556044694874!2d104.0306!3d1.1217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMcKwMDcnMTguMSJOIDEwNMKwMDEnNTAuMiJF!5e0!3m2!1sen!2sid!4v1" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'desc_event' => 'Batam Campus Expo 2026 adalah pameran pendidikan terbesar di Kepulauan Riau. Acara ini menghadirkan berbagai universitas dan perguruan tinggi dari seluruh Indonesia. Dapatkan informasi lengkap tentang program studi, beasiswa, dan kesempatan karir. Jangan lewatkan kesempatan untuk bertemu langsung dengan perwakilan kampus dan mendapatkan konsultasi gratis!',
            'open_voting' => true,
        ]);
    }
}
