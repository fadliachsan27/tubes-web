<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthWebController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\Api\AbsensiController;
use App\Http\Controllers\JobdeskController;
use App\Http\Controllers\PenggajianController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthWebController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthWebController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthWebController::class, 'registerStore'])->name('register.store');

Route::get('/dashboard', [AuthWebController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AuthWebController::class, 'logout']);

Route::post('/set-session', function (\Illuminate\Http\Request $request) {
    session(['user' => $request->all()]);
    return response()->json(['status' => true]);
});

Route::get('/absensi', function () {
    return view('absensi.index');
});


Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');


Route::get('/profile', function () {
    return view('profile.index');
});

Route::resource('jobdesk', JobdeskController::class);

Route::get('/penggajian', [PenggajianController::class, 'index']);
Route::post('/penggajian', [PenggajianController::class, 'store']);
Route::put('/penggajian/{id}', [PenggajianController::class, 'update']);
Route::delete('/penggajian/{id}', [PenggajianController::class, 'destroy']);
