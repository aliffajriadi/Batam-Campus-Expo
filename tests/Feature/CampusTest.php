<?php

use App\Models\Campus;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('user can view campus list with search and filters', function () {
    Campus::create([
        'name_campus' => 'Politeknik Negeri Batam',
        'location' => 'Batam Centre',
        'logo_campus' => 'polibatam.png',
        'singkatan' => 'Polibatam',
        'status' => 'negeri',
        'akreditasi' => 'A'
    ]);

    Campus::create([
        'name_campus' => 'Universitas Internasional Batam',
        'location' => 'Baloi',
        'logo_campus' => 'uib.png',
        'singkatan' => 'UIB',
        'status' => 'swasta',
        'akreditasi' => 'A'
    ]);

    // Test list
    $response = $this->get(route('kampus'));
    $response->assertStatus(200);
    $response->assertSee('Politeknik Negeri Batam');
    $response->assertSee('Universitas Internasional Batam');

    // Test search
    $response = $this->get(route('kampus', ['search' => 'Politeknik']));
    $response->assertSee('Politeknik Negeri Batam');
    $response->assertDontSee('Universitas Internasional Batam');

    // Test filter status
    $response = $this->get(route('kampus', ['status' => 'swasta']));
    $response->assertSee('Universitas Internasional Batam');
    $response->assertDontSee('Politeknik Negeri Batam');
});

test('user can vote for a campus', function () {
    $campus = Campus::create([
        'name_campus' => 'Test Campus',
        'location' => 'Location',
        'logo_campus' => 'logo.png',
        'singkatan' => 'TC',
        'status' => 'negeri',
        'akreditasi' => 'B'
    ]);

    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->postJson(route('kampus.vote'), [
        'campus_id' => $campus->id
    ]);

    $response->assertStatus(200);
    $response->assertJson([
        'success' => true,
        'message' => 'Terima kasih telah memberikan vote!'
    ]);

    $this->assertDatabaseHas('campus_voting', [
        'id_user' => $user->id,
        'id_campus' => $campus->id
    ]);
});

test('admin can manage campuses (CRUD)', function () {
    Storage::fake('public');
    $admin = Admin::factory()->create();
    $this->withSession(['admin_id' => $admin->id]);

    // Create
    $response = $this->post(route('admin.campus.store'), [
        'name_campus' => 'New Campus Admin',
        'location' => 'Admin Location',
        'logo_campus' => UploadedFile::fake()->image('logo.png'),
        'singkatan' => 'NCA',
        'akreditasi' => 'A',
        'status' => 'negeri',
        'tahun_berdiri' => 2000,
        'jumlah_mahasiswa' => 5000,
        'fakultas' => 'Teknik, Ekonomi',
        'website' => 'https://nca.ac.id',
        'deskripsi' => 'Description here'
    ]);

    $response->assertRedirect(route('admin.campus.index'));
    $this->assertDatabaseHas('campus', ['name_campus' => 'New Campus Admin', 'singkatan' => 'NCA']);

    $campus = Campus::where('name_campus', 'New Campus Admin')->first();

    // Update
    $response = $this->put(route('admin.campus.update', $campus->id), [
        'name_campus' => 'Updated Campus Name',
        'location' => 'Updated Location',
        'singkatan' => 'UCN',
        'akreditasi' => 'A',
        'status' => 'swasta',
        'fakultas' => 'Teknik Elektro, Manajemen'
    ]);

    $response->assertRedirect(route('admin.campus.index'));
    $this->assertDatabaseHas('campus', ['name_campus' => 'Updated Campus Name', 'status' => 'swasta']);

    // Delete
    $response = $this->delete(route('admin.campus.destroy', $campus->id));
    $this->assertDatabaseMissing('campus', ['id' => $campus->id]);
});
