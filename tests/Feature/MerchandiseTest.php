<?php

use App\Models\MerchandiseProduct;
use App\Models\MerchandiseBuyer;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('user can view merchandise list', function () {
    MerchandiseProduct::factory()->count(3)->create();

    $response = $this->get(route('toko'));
    $response->assertStatus(200);
    $response->assertViewHas('produk');
});

test('admin can manage merchandise products (CRUD)', function () {
    Storage::fake('public');
    $admin = Admin::factory()->create();
    $this->withSession(['admin_id' => $admin->id]);

    // Create
    $response = $this->post(route('admin.merchandise.store'), [
        'name_product' => 'Test Merch',
        'price' => 50000,
        'description' => 'Test Desc',
        'stock' => 10,
        'photo' => UploadedFile::fake()->image('item.png')
    ]);

    $response->assertRedirect(route('admin.merchandise.index'));
    $this->assertDatabaseHas('merchandise_product', ['name_product' => 'Test Merch']);

    $product = MerchandiseProduct::where('name_product', 'Test Merch')->first();

    // Update
    $response = $this->put(route('admin.merchandise.update', $product->id), [
        'name_product' => 'Updated Merch',
        'price' => 60000,
        'description' => 'Updated Desc',
        'stock' => 5
    ]);

    $response->assertRedirect(route('admin.merchandise.index'));
    $this->assertDatabaseHas('merchandise_product', ['name_product' => 'Updated Merch', 'price' => 60000]);

    // Delete
    $response = $this->delete(route('admin.merchandise.destroy', $product->id));
    $this->assertDatabaseMissing('merchandise_product', ['id' => $product->id]);
});

test('admin can approve merchandise purchase', function () {
    $admin = Admin::factory()->create();
    $this->withSession(['admin_id' => $admin->id]);

    $user = User::factory()->create();
    $product = MerchandiseProduct::factory()->create();

    $buyer = MerchandiseBuyer::create([
        'id_user' => $user->id,
        'id_product' => $product->id,
        'photo_transfer' => 'proof.png',
        'status_acc' => false,
        'claimed' => false,
    ]);

    $response = $this->post(route('admin.merchandise.approve-buyer', $buyer->id));
    $response->assertRedirect();

    $this->assertDatabaseHas('merchandise_buyer', [
        'id' => $buyer->id,
        'status_acc' => true
    ]);
});
