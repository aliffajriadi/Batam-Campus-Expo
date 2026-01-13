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

    public function test_homepage_shows_top_three_campuses()
    {
        // Create campuses
        $campus1 = Campus::create(['name_campus' => 'Campus A', 'location' => 'Loc A', 'logo_campus' => 'logoA.png']);
        $campus2 = Campus::create(['name_campus' => 'Campus B', 'location' => 'Loc B', 'logo_campus' => 'logoB.png']);
        $campus3 = Campus::create(['name_campus' => 'Campus C', 'location' => 'Loc C', 'logo_campus' => 'logoC.png']);
        $campus4 = Campus::create(['name_campus' => 'Campus D', 'location' => 'Loc D', 'logo_campus' => 'logoD.png']);

        // Create users
        $user1 = User::create(['name' => 'User 1', 'email' => 'user1@example.com', 'id_google' => '123', 'id_role' => 1]);
        $user2 = User::create(['name' => 'User 2', 'email' => 'user2@example.com', 'id_google' => '456', 'id_role' => 1]);
        $user3 = User::create(['name' => 'User 3', 'email' => 'user3@example.com', 'id_google' => '789', 'id_role' => 1]);
        $user4 = User::create(['name' => 'User 4', 'email' => 'user4@example.com', 'id_google' => '012', 'id_role' => 1]);

        // Add votes
        CampusVoting::create(['id_campus' => $campus1->id, 'id_user' => $user1->id]);
        CampusVoting::create(['id_campus' => $campus1->id, 'id_user' => $user2->id]);
        CampusVoting::create(['id_campus' => $campus2->id, 'id_user' => $user3->id]);
        CampusVoting::create(['id_campus' => $campus3->id, 'id_user' => $user4->id]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Campus A');
        $response->assertSee('Campus B');
        $response->assertSee('Campus C');
        $response->assertDontSee('Campus D');
    }

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
