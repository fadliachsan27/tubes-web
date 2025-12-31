<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AbsensiController;

Route::get('/absensi', [AbsensiController::class, 'index']);
Route::post('/absensi/masuk', [AbsensiController::class, 'masuk']);
Route::post('/absensi/keluar', [AbsensiController::class, 'keluar']);


