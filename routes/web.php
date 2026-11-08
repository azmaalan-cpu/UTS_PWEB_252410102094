<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Halaman Login
Route::get('/', [PageController::class, 'login'])
    ->name('login');

// Proses Login
Route::post('/login', [PageController::class, 'processLogin'])
    ->name('login.process');

// Halaman Dashboard
Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->name('dashboard');

// Halaman Profil
Route::get('/profile', [PageController::class, 'profile'])
    ->name('profile');

// Halaman Pengelolaan Mahasiswa
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])
    ->name('pengelolaan');
// Logout
Route::post('/logout', function () {
    session()->forget('mahasiswa_login');

    return redirect()->route('login');
})->name('logout');
