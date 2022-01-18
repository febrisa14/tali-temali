<?php

use Illuminate\Support\Facades\Route;
//Frontend Route
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JeratController;
use App\Http\Controllers\Frontend\SimpulController;

//Backend Route
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\MateriController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\AnggotaProfileController;
use App\Http\Controllers\Backend\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/#jenis', [HomeController::class, 'jenis'])->name('home-jenis');

Route::middleware(['auth'])->group(function () {

    Route::get('/materi_jerat', [JeratController::class, 'index'])->name('materi-jerat');
    Route::get('/materi_jerat/{slug}',[JeratController::class, 'show'])->name('lihat-materi-jerat');

    Route::get('/materi_simpul', [SimpulController::class, 'index'])->name('materi-simpul');
    Route::get('/materi_simpul/{slug}',[SimpulController::class, 'show'])->name('lihat-materi-simpul');

    //Route Admin
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('pengguna', PenggunaController::class);
        Route::resource('materi', MateriController::class);
        Route::post('editor/image_upload', [MateriController::class, 'upload'])->name('upload');
        Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
        Route::post('/change_profile', [ProfileController::class, 'updateProfile'])->name('change_profile');
    });

    Route::post('/change_password', [PasswordController::class, 'changePassword'])->name('change_password');

    Route::middleware(['anggota'])->prefix('anggota')->name('anggota.')->group(function () {

        Route::get('/profile', [AnggotaProfileController::class, 'index'])->name('profile');
        Route::post('/change_profile', [AnggotaProfileController::class, 'updateProfile'])->name('change_profile');

    });

});

