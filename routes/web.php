<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'attempt']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/reset-password', [ResetPasswordController::class, 'index']);
Route::post('/reset-password', [ResetPasswordController::class, 'sendMail']);
Route::post('/reset-password/reset', [ResetPasswordController::class, 'resetPassword']);
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show']);

Route::get('/auth/linkedin/redirect', [LoginController::class, 'linkedinRedirect']);
Route::get('/auth/{origin}/callback', [LoginController::class, 'socialCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout']);
});
