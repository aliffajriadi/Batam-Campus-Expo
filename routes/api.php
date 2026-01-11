<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReportController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/scan/cek-ticket', [ReportController::class, 'checkTicket']);
Route::get('/scan/confirm-ticket', [ReportController::class, 'confirmTicket']);