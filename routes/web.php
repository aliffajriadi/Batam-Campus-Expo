<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\TokoController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/voting', [VotingController::class, 'index']);
Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::get('/toko', [TokoController::class, 'index']);