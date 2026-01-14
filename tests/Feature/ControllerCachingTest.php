<?php

use App\Models\Campus;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('home page uses caching for top campuses', function () {
    Campus::create([
        'name_campus' => 'Test Top Campus',
        'location' => 'Location',
        'logo_campus' => 'logo.png',
        'singkatan' => 'TTC',
        'status' => 'negeri'
    ]);

    // Access home to trigger cache
    $this->get(route('home'));

    expect(Cache::tags(['home_page', 'campuses'])->has('home_data_campuses'))->toBeTrue();
});

test('kampus page uses dynamic caching based on parameters', function () {
    $this->get(route('kampus', ['page' => 1, 'search' => 'test']));

    $cacheKey = "kampus_list_full_1_test_all";
    expect(Cache::tags(['kampus_page', 'campuses'])->has($cacheKey))->toBeTrue();
});
