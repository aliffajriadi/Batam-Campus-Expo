<?php

use App\Models\Kegiatan;
use App\Models\EventSetting;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('admin can manage kegiatan (CRUD)', function () {
    $admin = Admin::factory()->create();
    $this->withSession(['admin_id' => $admin->id]);

    // Create
    $response = $this->post(route('admin.kegiatan.store'), [
        'time' => '08:00 - 09:00',
        'activity' => 'Opening Ceremony',
        'icon' => 'star',
        'color' => '#FF0000',
        'order' => 1
    ]);

    $response->assertRedirect(route('admin.kegiatan.index'));
    $this->assertDatabaseHas('kegiatan', ['activity' => 'Opening Ceremony']);

    $kegiatan = Kegiatan::where('activity', 'Opening Ceremony')->first();

    // Update
    $response = $this->put(route('admin.kegiatan.update', $kegiatan->id), [
        'time' => '08:00 - 09:30',
        'activity' => 'Updated Opening',
        'icon' => 'star-fill',
        'color' => '#00FF00',
        'order' => 2
    ]);

    $this->assertDatabaseHas('kegiatan', ['activity' => 'Updated Opening', 'order' => 2]);

    // Delete
    $response = $this->delete(route('admin.kegiatan.destroy', $kegiatan->id));
    $this->assertDatabaseMissing('kegiatan', ['id' => $kegiatan->id]);
});

test('admin can update event settings', function () {
    $admin = Admin::factory()->create();
    $this->withSession(['admin_id' => $admin->id]);

    $response = $this->post(route('admin.event.update'), [
        'location_event' => 'New Location',
        'name_event' => 'New Event Name',
        'start_event' => now()->format('Y-m-d H:i:s'),
        'end_event' => now()->addMonth()->format('Y-m-d H:i:s'),
        'no_contact' => '08123456789',
        'google_maps' => 'https://maps.google.com',
        'desc_event' => 'New description for the event.'
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('event_setting', [
        'location_event' => 'New Location',
        'name_event' => 'New Event Name'
    ]);
});
