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
use App\Http\Controllers\Admin\CampusController;
use App\Http\Controllers\Admin\kampusController;
use App\Http\Controllers\Admin\ReportController;

// Rute untuk halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute dummy untuk testing
Route::get('/voting', function () {
    return view('pages.voting');
})->name('voting');

Route::get('/kampus', function () {
    return view('pages.kampus');
})->name('kampus');

Route::get('/kegiatan', function () {
    return view('pages.kegiatan');
})->name('kegiatan');

Route::get('/toko', [TokoController::class, 'index'])->name('toko');

Route::get('/tickets', function () {
    return view('pages.tickets');
})->name('tickets');

/// Rute autentikasi pengguna
//Route::middleware(['auth'])->group(function () {
    //Route::get('/dashboard', function () {
        //return view('dashboard');
    //})->name('dashboard');
    
    //Route::get('/profile', function () {
       // return view('profile');
    //})->name('profile');
//});


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
    Route::get('/tickets/settings', [TicketController::class, 'settings'])->name('ticket.settings');
    Route::post('/tickets/settings', [TicketController::class, 'updateSettings'])->name('ticket.settings.update');
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

    // Campus Management
    Route::get('/campus', [CampusController::class, 'index'])->name('campus.index');
    Route::get('/campus/create', [CampusController::class, 'create'])->name('campus.create');
    Route::post('/campus', [CampusController::class, 'store'])->name('campus.store');
    Route::get('/campus/{id}/edit', [CampusController::class, 'edit'])->name('campus.edit');
    Route::put('/campus/{id}', [CampusController::class, 'update'])->name('campus.update');
    Route::delete('/campus/{id}', [CampusController::class, 'destroy'])->name('campus.destroy');
    Route::get('/campus/{id}/votes', [CampusController::class, 'votes'])->name('campus.votes');

    // Reports & Scan
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/scan/ticket', [ReportController::class, 'scanTicket'])->name('report.scan-ticket');
    Route::post('/scan/ticket', [ReportController::class, 'verifyTicket'])->name('report.verify-ticket');
    Route::get('/scan/merchandise', [ReportController::class, 'scanMerchandise'])->name('report.scan-merchandise');
    Route::post('/scan/merchandise', [ReportController::class, 'verifyMerchandise'])->name('report.verify-merchandise');
});
