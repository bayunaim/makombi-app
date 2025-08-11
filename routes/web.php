<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
route::get('/register', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/register/success', [MahasiswaController::class, 'showRegisterSuccess'])->name('mahasiswa.register_success');




// Dashboard (hanya bisa diakses kalau sudah login)
Route::get('/dashboard', function () {
    return 'Selamat datang di Dashboard!';
})->middleware('');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');





