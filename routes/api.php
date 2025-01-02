<?php

use App\Events\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\MeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;

Route::post('login', LoginController::class);
Route::post('register', RegisterController::class);
Route::post('verify-email', VerifyEmailController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    # creates 'me' layer that treats everything about logged in user
    Route::get('me', [MeController::class, 'show']);
});

