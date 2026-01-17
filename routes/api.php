<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReportController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

$route = 'scan' . config('app.admin_username');
Route::get('/scan/cek-ticket ' . $route, [ReportController::class, 'checkTicket']);
Route::get('/scan/confirm-ticket ' . $route, [ReportController::class, 'confirmTicket']);