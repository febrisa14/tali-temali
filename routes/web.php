<?php

use Illuminate\Support\Facades\Route;
//Frontend Route
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\KurikulumController;
use App\Http\Controllers\Frontend\JeratController;
use App\Http\Controllers\Frontend\SimpulController;
use App\Http\Controllers\Frontend\QuizzesController;

//Backend Route
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AnggotaController;
use App\Http\Controllers\Backend\MateriController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\AnggotaProfileController;
use App\Http\Controllers\Backend\PasswordController;
use App\Http\Controllers\Exam\QuizController;
use App\Http\Controllers\Exam\QuestionController;

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

Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');

Route::middleware(['auth'])->group(function () {

    Route::get('/kurikulum/mountenering', [KurikulumController::class, 'mountenering'])->name('mountenering');
    Route::get('/kurikulum/navigasi-darat', [KurikulumController::class, 'navigasidarat'])->name('navigasidarat');
    Route::get('/kurikulum/rock-climbing', [KurikulumController::class, 'rockclimbing'])->name('rockclimbing');
    Route::get('/kurikulum/survival', [KurikulumController::class, 'survival'])->name('survival');

    Route::get('/materi_jerat', [JeratController::class, 'index'])->name('materi-jerat');
    Route::get('/materi_jerat/{slug}',[JeratController::class, 'show'])->name('lihat-materi-jerat');

    Route::get('/materi_simpul', [SimpulController::class, 'index'])->name('materi-simpul');
    Route::get('/materi_simpul/{slug}',[SimpulController::class, 'show'])->name('lihat-materi-simpul');

    //Route Admin
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('anggota', AnggotaController::class);
        Route::resource('materi', MateriController::class);

        //Route Quiz
        Route::resource('quiz', QuizController::class);
        Route::get('quiz/hasil/{id}',[QuizController::class, 'hasilQuiz'])->name('quiz.hasil');

        //Route Question
        Route::resource('quiz/{id}/question', QuestionController::class)->except(['edit','destroy','update','store']);
        Route::resource('question', QuestionController::class)->only(['edit','destroy','update','store']);

        Route::post('editor/image_upload', [MateriController::class, 'upload'])->name('upload');
        Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
        Route::post('/change_profile', [ProfileController::class, 'updateProfile'])->name('change_profile');
    });

    Route::post('/change_password', [PasswordController::class, 'changePassword'])->name('change_password');

    //Route Anggota
    Route::middleware(['anggota'])->prefix('anggota')->name('anggota.')->group(function () {

        Route::get('/profile', [AnggotaProfileController::class, 'index'])->name('profile');
        Route::post('/change_profile', [AnggotaProfileController::class, 'updateProfile'])->name('change_profile');

        Route::get('quiz', [QuizzesController::class, 'index'])->name('quiz.index');
        Route::post('quiz-start/{id}',[QuizzesController::class, 'startQuiz'])->name('quiz.start');
        Route::get('quiz-start/{id}',[QuizzesController::class, 'mulaiQuiz'])->name('quiz.mulai');
        Route::post('quiz',[QuizzesController::class, 'submitQuiz'])->name('quiz.submit');
        Route::get('quiz/hasil/{id}',[QuizzesController::class, 'hasilQuiz'])->name('quiz.hasil');
    });

});

