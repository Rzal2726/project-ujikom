<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Pelanggan\PelangganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'actionlogin']);
    Route::get('logout', [LoginController::class, 'actionlogin']);
  });
Route::prefix('pelanggan')->group(function () {
    Route::get('get-data', [PelangganController::class, 'getData']);
    Route::post('add-data', [PelangganController::class, 'addData']);
    Route::post('edit-data/{id}', [PelangganController::class, 'editData']);
    Route::delete('delete-data/{id}', [PelangganController::class, 'deleteData']);
    Route::get('show-data/{id}', [PelangganController::class, 'showData']);
  });
