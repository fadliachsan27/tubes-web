<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AuthWebController;


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
