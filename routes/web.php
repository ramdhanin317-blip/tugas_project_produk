<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// Pengalihan awal (Bebas)
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Rute Autentikasi (Guest/Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Rute Terproteksi (Harus Login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD Kategori & CRUD Produk (Resource Routes otomatis mencakup store, update, destroy, dll)
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});