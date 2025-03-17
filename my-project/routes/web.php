<?php

use App\Http\Controllers\CMS\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'LoginScreen'])->name('login-screen');
  });
