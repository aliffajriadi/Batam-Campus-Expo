<?php

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Mockery\MockInterface;

uses(RefreshDatabase::class);

test('admin can login and logout', function () {
    $admin = Admin::create([
        'username' => 'superadmin',
        'password' => Hash::make('password123')
    ]);

    // Login
    $response = $this->post(route('admin.login.post'), [
        'username' => 'superadmin',
        'password' => 'password123'
    ]);

    $response->assertRedirect(route('admin.dashboard'));
    $this->assertEquals($admin->id, session('admin_id'));

    // Logout
    $response = $this->post(route('admin.logout'));
    $response->assertRedirect(route('admin.login'));
    $this->assertFalse(session()->has('admin_id'));
});

test('user can login via google mock', function () {
    $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
    $abstractUser->email = 'user@example.com';
    $abstractUser->name = 'John Doe';
    $abstractUser->id = 'google-id-123';
    $abstractUser->avatar = 'https://avatar.com/john';

    $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
    $provider->shouldReceive('user')->andReturn($abstractUser);

    Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

    // Call the callback route
    $response = $this->get('/auth/google/callback');

    $response->assertRedirect(route('ticket-user'));
    $this->assertDatabaseHas('users', [
        'google_id' => 'google-id-123',
        'email' => 'user@example.com'
    ]);
    $this->assertAuthenticated();
});

test('suspended user cannot access protected routes', function () {
    $user = User::factory()->create(['is_suspended' => true]);
    $this->actingAs($user);

    $response = $this->get(route('profile'));
    // Based on middleware, it might redirect or return error. 
    // Let's assume it returns a redirect to home with error if suspended.
    $response->assertRedirect(route('home'));
});
