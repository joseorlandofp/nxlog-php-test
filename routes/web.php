<?php

use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/reset-password', [ResetPasswordController::class, 'index']);

Route::get('/auth/linkedin/redirect', [LoginController::class, 'linkedinRedirect']);
Route::get('/auth/{source}/callback', [LoginController::class, 'socialCallback']);

Route::middleware(Auth::class)->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard']);
    Route::get('/logout', [LoginController::class, 'logout']);
});
