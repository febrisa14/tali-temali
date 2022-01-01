<?php

use Illuminate\Support\Facades\Route;
//Frontend Route
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JeratController;
use App\Http\Controllers\Frontend\SimpulController;

//Backend Route
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AnggotaController;
use App\Http\Controllers\Backend\MateriController;
use App\Http\Controllers\Backend\KategoriController;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/materi_jerat', [JeratController::class, 'index'])->name('materi-jerat');
    Route::get('/materi_jerat/{slug}',[JeratController::class, 'show'])->name('lihat-materi-jerat');

    Route::get('/materi_simpul', [SimpulController::class, 'index'])->name('materi-simpul');
    Route::get('/materi_simpul/{slug}',[SimpulController::class, 'show'])->name('lihat-materi-simpul');

    //Route Admin
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('anggota', AnggotaController::class);
        Route::resource('materi', MateriController::class);
        Route::post('editor/image_upload', [MateriController::class, 'upload'])->name('upload');

    });

});

