<?php

use App\Models\Campus;
use App\Models\EventSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('model creation flushes relevant cache tags', function () {
    Cache::tags(['campuses'])->put('test_key', 'test_value', 3600);
    expect(Cache::tags(['campuses'])->get('test_key'))->toBe('test_value');

    Campus::create([
        'name_campus' => 'Test Campus',
        'location' => 'Test Location',
        'logo_campus' => 'test.png',
        'singkatan' => 'TC',
        'status' => 'negeri'
    ]);

    // Cache should be flushed
    expect(Cache::tags(['campuses'])->get('test_key'))->toBeNull();
});

test('model update flushes relevant cache tags', function () {
    $campus = Campus::create([
        'name_campus' => 'Test Campus',
        'location' => 'Test Location',
        'logo_campus' => 'test.png',
        'singkatan' => 'TC',
        'status' => 'negeri'
    ]);

    Cache::tags(['campuses'])->put('test_key', 'test_value', 3600);

    $campus->update(['name_campus' => 'Updated Campus']);

    expect(Cache::tags(['campuses'])->get('test_key'))->toBeNull();
});

test('event setting mutation flushes event_settings tag', function () {
    Cache::tags(['event_settings'])->put('settings_cache', 'old_data', 3600);

    EventSetting::create([
        'name_event' => 'Test Event',
        'location_event' => 'Test Location',
        'start_event' => now(),
        'end_event' => now()->addDays(2),
        'no_contact' => '08123',
        'desc_event' => 'Test Description'
    ]);

    expect(Cache::tags(['event_settings'])->get('settings_cache'))->toBeNull();
});
