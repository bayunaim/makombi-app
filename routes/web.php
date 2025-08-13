<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftarController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Notification routes
Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/unread', [App\Http\Controllers\NotificationController::class, 'unread'])->name('notifications.unread');
Route::post('/notifications/{id}/read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::post('/notifications/mark-all-read', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');


// Notification page routes
Route::get('/notifications-page', [App\Http\Controllers\NotificationPageController::class, 'index'])->name('notifications.page');
Route::get('/notifications/{id}/read-and-redirect', [App\Http\Controllers\NotificationPageController::class, 'markAsReadAndRedirect'])->name('notifications.markAsReadAndRedirect');
Route::post('/notifications-page/mark-all-read', [App\Http\Controllers\NotificationPageController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
Route::delete('/notifications-page/{id}', [App\Http\Controllers\NotificationPageController::class, 'destroy'])->name('notifications.destroy');

// Pendaftar CRUD (backend)
Route::get('pendaftar/diterima', [PendaftarController::class, 'diterimaIndex'])->name('pendaftar.diterima.index');
Route::post('pendaftar/{id}/diterima', [PendaftarController::class, 'accept'])->name('pendaftar.accept');
Route::delete('pendaftar/diterima/{id}', [PendaftarController::class, 'destroyDiterima'])->name('pendaftar.diterima.destroy');
Route::get('pendaftar/search', [PendaftarController::class, 'search'])->name('pendaftar.search');
Route::resource('pendaftar', PendaftarController::class);

// Contact Form Routes
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index')->middleware('auth');
Route::get('/contact/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show')->middleware('auth');
Route::post('/contact/{id}/read', [App\Http\Controllers\ContactController::class, 'markAsRead'])->name('contact.markAsRead')->middleware('auth');
Route::delete('/contact/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy')->middleware('auth');





