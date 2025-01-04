<?php

use Illuminate\Http\Request;
use App\Events\UserRegistered;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::post('login', LoginController::class);
Route::post('register', RegisterController::class);
Route::post('verify-email', VerifyEmailController::class);
Route::post('forgot-password', ForgotPasswordController::class);
Route::post('reset-password', ResetPasswordController::class);

Route::middleware(['auth:sanctum', 'team'])->group(function () {
    # creates 'me' layer that treats everything about logged in user
    Route::get('me', [MeController::class, 'show']);
});

