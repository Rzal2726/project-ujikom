<?php

use App\Http\Controllers\CMS\Auth\LoginController;
use App\Http\Controllers\CMS\Dashboard\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'LoginScreen'])->name('login-screen');
Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'LoginScreen'])->name('login-screen');
  });

Route::prefix('dashboard')->group(function () {
  Route::get('/', [Controller::class, 'HomeScreen'])->name('home-screen');
  Route::get('/user', [Controller::class, 'UserScreen'])->name('user-screen');
  Route::get('/pelanggan', [Controller::class, 'PelangganScreen'])->name('pelanggan-screen');
  Route::get('/transaksi', [Controller::class, 'TransaksiScreen'])->name('transaksi-screen');
  Route::get('/produk', [Controller::class, 'ProdukScreen'])->name('produk-screen');
});
