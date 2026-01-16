<?php

namespace Tests\Feature;

use App\Models\Campus;
use App\Models\CampusVoting;
use App\Models\EventSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageDynamicContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_uses_dynamic_event_settings()
    {
        $endEvent = now()->addDays(10)->format('Y-m-d H:i:s');
        $googleMaps = 'https://www.google.com/maps/embed?pb=test';

        EventSetting::create([
            'name_event' => 'Test Event',
            'start_event' => now(),
            'end_event' => $endEvent,
            'location_event' => 'Test Location',
            'no_contact' => '123456789',
            'google_maps' => $googleMaps,
            'desc_event' => 'Test Description',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($endEvent);
        $response->assertSee($googleMaps);
    }
}
