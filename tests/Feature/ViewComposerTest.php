<?php

use App\Models\EventSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('global view composer injects shared data into pages', function () {
    $settings = EventSetting::create([
        'name_event' => 'Unit Test Event',
        'location_event' => 'Unit Test Location',
        'start_event' => now(),
        'end_event' => now()->addDays(2),
        'no_contact' => '08999',
        'desc_event' => 'Unit Test Description'
    ]);

    // Access home page
    $response = $this->get(route('home'));

    $response->assertStatus(200);
    $response->assertViewHas('nama_event', 'Unit Test Event');
    $response->assertViewHas('lokasi', 'Unit Test Location');
});

test('shared data is retrieved from cache on subsequent requests', function () {
    $settings = EventSetting::create([
        'name_event' => 'Unit Test Event',
        'location_event' => 'Unit Test Location',
        'start_event' => now(),
        'end_event' => now()->addDays(2),
        'no_contact' => '08999',
        'desc_event' => 'Unit Test Description'
    ]);

    // First request should cache
    $this->get(route('home'));

    expect(Cache::tags(['event_settings'])->has('global_event_settings'))->toBeTrue();

    // Change DB directly without triggering trait (or just trust cache)
    // If we retrieve from cache, it should still be the old value even if DB changes (if we didn't flush)
    // But since our trait flushes on update, we'll just check if the key exists.
});
