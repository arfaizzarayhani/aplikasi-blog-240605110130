<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PenulisController; // Ditambahkan agar controller penulis dikenali

// Rute Pengunjung / Publik
Route::get('/', [PengunjungController::class, 'index']);
Route::get('/blog', [PengunjungController::class, 'index']);
Route::get('/blog/kategori/{id}', [PengunjungController::class, 'kategori']);
Route::get('/blog/detail/{id}', [PengunjungController::class, 'detail']);

// Middleware untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Middleware untuk Auth (Sudah Login Admin)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Rute CRUD Utama Backend
    Route::resource('kategori', KategoriArtikelController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('penulis', PenulisController::class); // Ditambahkan untuk mengatasi error 404 penulis
});
