<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthController::class, 'store'])
                ->middleware('guest');

Route::post('/logout', [AuthController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');