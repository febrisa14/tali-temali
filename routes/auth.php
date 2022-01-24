<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthController::class, 'store'])
                ->middleware('guest');

Route::post('/logout', [AuthController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
