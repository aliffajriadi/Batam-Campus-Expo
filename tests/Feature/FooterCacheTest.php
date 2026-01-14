<?php

use App\Models\EventSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;

uses(RefreshDatabase::class);

test('footer displays cached location and phone on home and community pages', function () {
    // 1. Setup global settings
    $setting = EventSetting::factory()->create([
        'location_event' => 'Test Location 123',
        'no_contact' => '0899-8888-7777',
    ]);

    // Clear cache to ensure we start fresh
    Cache::flush();

    // 2. Check Home Page
    $response = $this->get(route('home'));
    $response->assertStatus(200);
    $response->assertSee('Test Location 123');
    $response->assertSee('0899-8888-7777');

    // 3. Check Community Page
    $response = $this->get(route('komunitas'));
    $response->assertStatus(200);
    $response->assertSee('Test Location 123');
    $response->assertSee('0899-8888-7777');

    // 4. Update Setting (This should automatically flush 'event_settings' tag)
    $setting->update(['location_event' => 'New Buried Location']);

    // Verify Cache is null now
    $this->assertNull(Cache::tags(['event_settings'])->get('global_event_settings'));

    // 5. Access Home Page again
    $response = $this->get(route('home'));
    $response->assertSee('New Buried Location');
    $response->assertDontSee('Test Location 123');

    // 6. Check Community Page
    $response = $this->get(route('komunitas'));
    $response->assertSee('New Buried Location');
});
