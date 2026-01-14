<?php

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;

uses(RefreshDatabase::class);

test('updating user profile flushes community posts cache', function () {
    // 1. Setup
    $user = User::factory()->create(['name' => 'Old Name']);
    $post = Post::factory()->create(['user_id' => $user->id, 'content' => 'Test Post']);

    // 2. Access Community Page to populate cache
    $this->actingAs($user);
    $response = $this->get(route('komunitas'));
    $response->assertSee('Old Name');

    // Verify cache exists
    $cacheKey = "community_posts_full_1_latest__" . $user->id;
    $this->assertNotNull(Cache::tags(['community_page', 'posts'])->get($cacheKey), "Cache key {$cacheKey} not found");

    // 3. Update Profile
    $user->update(['name' => 'New Name']);

    // 4. Verify Cache is flushed
    $this->assertNull(Cache::tags(['community_page', 'posts'])->get($cacheKey));

    // 5. Access Community Page again
    $response = $this->get(route('komunitas'));
    $response->assertSee('New Name');
    $response->assertDontSee('Old Name');
});
