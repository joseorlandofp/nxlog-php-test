<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'attempt']);

Route::prefix('register')->group(function () {
    Route::resource('/', RegisterController::class)->only(['index', 'store']);
});

Route::prefix('reset-password')->group(function () {
    Route::get('/', [ResetPasswordController::class, 'index']);
    Route::post('/send-email', [ResetPasswordController::class, 'sendMail']);
    Route::post('/reset', [ResetPasswordController::class, 'resetPassword']);
    Route::get('/{token}', [ResetPasswordController::class, 'show']);
});

Route::prefix('auth')->group(function () {
    Route::get('/linkedin/redirect', [LoginController::class, 'linkedinRedirect']);
    Route::get('/{origin}/callback', [LoginController::class, 'socialCallback']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout']);
});
