<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Kategori\KategoriController;
use App\Http\Controllers\API\Other\DashboardController;
use App\Http\Controllers\API\Pelanggan\PelangganController;
use App\Http\Controllers\API\Produk\ProdukController;
use App\Http\Controllers\API\Transaksi\TransaksiController;
use App\Http\Controllers\API\User\UserController;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'actionlogin']);
    Route::middleware('auth:sanctum')->post('logout', [LoginController::class, 'actionlogout']);
    Route::middleware('auth:sanctum')->post('check', [LoginController::class, 'login']);
  });
Route::middleware('auth:sanctum')->prefix('pelanggan')->group(function () {
    Route::get('get-data', [PelangganController::class, 'getData']);
    Route::get('get-all', [PelangganController::class, 'getAll']);
    Route::post('search-data', [PelangganController::class, 'searchData']);
    Route::post('add-data', [PelangganController::class, 'addData']);
    Route::post('edit-data/{id}', [PelangganController::class, 'editData']);
    Route::delete('delete-data/{id}', [PelangganController::class, 'deleteData']);
    Route::get('show-data/{id}', [PelangganController::class, 'showData']);
});

Route::middleware('auth:sanctum')->prefix('kategori')->group(function () {
    Route::get('get-data', [KategoriController::class, 'getData']);
    Route::get('get-all', [KategoriController::class, 'getAll']);
    Route::post('search-data', [KategoriController::class, 'searchData']);
    Route::post('add-data', [KategoriController::class, 'addData']);
    Route::post('edit-data/{id}', [KategoriController::class, 'editData']);
    Route::delete('delete-data/{id}', [KategoriController::class, 'deleteData']);
    Route::get('show-data/{id}', [KategoriController::class, 'showData']);
});
  
Route::middleware('auth:sanctum')->prefix('user')->group(function () {
    Route::get('get-data', [UserController::class, 'getData']);
    Route::get('get-profile', [UserController::class, 'getProfile']);
    Route::post('search-data', [UserController::class, 'searchData']);
    Route::post('add-data', [UserController::class, 'addData']);
    Route::post('edit-data/{id}', [UserController::class, 'editData']);
    Route::delete('delete-data/{id}', [UserController::class, 'deleteData']);
    Route::get('show-data/{id}', [UserController::class, 'showData']);
    Route::get('get-login', [UserController::class, 'getLogin']);
    Route::get('get-level', [UserController::class, 'getLevel']);
    Route::post('update-pass', [UserController::class, 'updatePassword']);
  });

Route::middleware('auth:sanctum')->prefix('produk')->group(function () {
    Route::get('get-data', [ProdukController::class, 'getData']);
    Route::post('search-data', [ProdukController::class, 'searchData']);
    Route::post('add-data', [ProdukController::class, 'addData']);
    Route::post('edit-data/{id}', [ProdukController::class, 'editData']);
    Route::post('update-stok', [ProdukController::class, 'updateStok']);
    Route::delete('delete-data/{id}', [ProdukController::class, 'deleteData']);
    Route::get('show-data/{id}', [ProdukController::class, 'showData']);
  });

Route::middleware('auth:sanctum')->prefix('transaksi')->group(function () {
    Route::get('get-data', [TransaksiController::class, 'getData']);
    Route::post('search-data', [TransaksiController::class, 'searchData']);
    Route::post('add-data', [TransaksiController::class, 'addData']);
    Route::post('edit-data/{id}', [TransaksiController::class, 'editData']);
    Route::delete('delete-data/{id}', [TransaksiController::class, 'deleteData']);
    Route::get('show-data/{id}', [TransaksiController::class, 'showData']);
    Route::get('excel', [TransaksiController::class, 'exportExcel']);
    Route::post('pdf', [TransaksiController::class, 'exportPDF']);
    Route::get('detail-pdf/{id}', [TransaksiController::class, 'exportDetailPDF']);
  });

Route::middleware('auth:sanctum')->prefix('other')->group(function () {
    Route::get('get-counter', [DashboardController::class, 'getCounter']);
  });
