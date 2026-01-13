<?php

namespace Database\Factories;

use App\Models\EventSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventSettingFactory extends Factory
{
    protected $model = EventSetting::class;

    public function definition(): array
    {
        return [
            'location_event' => 'Mega Mall Batam Center, Lt. 3',
            'name_event' => 'Batam Campus Expo 2026',
            'start_event' => now(),
            'end_event' => now()->addMonth(),
            'no_contact' => '081234567890',
            'google_maps' => '',
            'desc_event' => 'Batam Campus Expo 2026 adalah pameran pendidikan terbesar di Kepulauan Riau.',
        ];
    }
}
