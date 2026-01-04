<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventSettingController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\MerchandiseController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/voting', [VotingController::class, 'index']);
Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::get('/toko', [TokoController::class, 'index']);

// Admin Auth Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Event Settings
    Route::get('/event', [EventSettingController::class, 'index'])->name('event.index');
    Route::post('/event', [EventSettingController::class, 'update'])->name('event.update');

    // Ticket Management
    Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('ticket.show');
    Route::post('/tickets/{id}/approve', [TicketController::class, 'approve'])->name('ticket.approve');
    Route::post('/tickets/{id}/reject', [TicketController::class, 'reject'])->name('ticket.reject');

    // Merchandise Products
    Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
    Route::get('/merchandise/create', [MerchandiseController::class, 'create'])->name('merchandise.create');
    Route::post('/merchandise', [MerchandiseController::class, 'store'])->name('merchandise.store');
    Route::get('/merchandise/{id}/edit', [MerchandiseController::class, 'edit'])->name('merchandise.edit');
    Route::put('/merchandise/{id}', [MerchandiseController::class, 'update'])->name('merchandise.update');
    Route::delete('/merchandise/{id}', [MerchandiseController::class, 'destroy'])->name('merchandise.destroy');

    // Merchandise Buyers
    Route::get('/merchandise-buyers', [MerchandiseController::class, 'buyers'])->name('merchandise.buyers');
    Route::get('/merchandise-buyers/{id}', [MerchandiseController::class, 'showBuyer'])->name('merchandise.show-buyer');
    Route::post('/merchandise-buyers/{id}/approve', [MerchandiseController::class, 'approveBuyer'])->name('merchandise.approve-buyer');
    Route::post('/merchandise-buyers/{id}/reject', [MerchandiseController::class, 'rejectBuyer'])->name('merchandise.reject-buyer');
});
