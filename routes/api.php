<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::post('login', LoginController::class);
