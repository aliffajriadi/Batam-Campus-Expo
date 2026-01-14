<?php

use App\Models\TicketStatus;
use App\Models\TicketBuyer;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

test('user can register for a ticket', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $ticketType = TicketStatus::factory()->create([
        'kuota_ticket' => 10,
        'sold_ticket' => 0,
        'status' => 'open',
        'discount' => 0
    ]);

    Storage::fake('public');

    $response = $this->post(route('ticket-user.store'), [
        'ticket_id' => $ticketType->id,
        'payment_proof' => UploadedFile::fake()->image('transfer.jpg')
    ]);

    $response->assertRedirect(route('ticket-user'));
    $this->assertDatabaseHas('ticket_buyer', [
        'id_user' => $user->id,
        'id_ticket' => $ticketType->id,
        'status_acc' => false
    ]);
});

test('admin can manage ticket types (CRUD)', function () {
    $admin = Admin::factory()->create();
    $this->withSession(['admin_id' => $admin->id]);

    // Create
    $response = $this->post(route('admin.ticket.type.store'), [
        'name' => 'VIP Access',
        'price' => 150000,
        'kuota_ticket' => 50,
        'description' => 'VIP description',
        'status' => 'open',
        'discount' => 10,
        'auto_close_ticket_at' => now()->addMonth()->format('Y-m-d H:i:s')
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('ticket_status', ['name' => 'VIP Access']);

    $type = TicketStatus::where('name', 'VIP Access')->first();

    // Update
    $response = $this->put(route('admin.ticket.type.update', $type->id), [
        'name' => 'VIP Updated',
        'price' => 160000,
        'kuota_ticket' => 45,
        'status' => 'pending',
        'discount' => 5,
        'auto_close_ticket_at' => now()->addMonth()->format('Y-m-d H:i:s')
    ]);

    $this->assertDatabaseHas('ticket_status', ['name' => 'VIP Updated', 'status' => 'pending']);

    // Delete
    $response = $this->delete(route('admin.ticket.type.destroy', $type->id));
    $this->assertDatabaseMissing('ticket_status', ['id' => $type->id]);
});

test('admin can approve ticket buyer', function () {
    $admin = Admin::factory()->create();
    $this->withSession(['admin_id' => $admin->id]);

    $buyer = TicketBuyer::factory()->create(['status_acc' => false]);

    $response = $this->post(route('admin.ticket.approve', $buyer->id));
    $response->assertRedirect();

    $this->assertDatabaseHas('ticket_buyer', [
        'id' => $buyer->id,
        'status_acc' => true
    ]);
});
