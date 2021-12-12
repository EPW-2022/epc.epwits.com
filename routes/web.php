<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\PenyisihanController;
use App\Http\Controllers\Admin\SetupController;
use App\Models\Team;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\Route;

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

// DASHBOARD ROUTES
Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/daftar', [AuthController::class, 'register'])->middleware('guest');

Route::post('/daftar', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'authentication']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'registered', 'participant'])->group(function () {
  Route::get('/', [PagesController::class, 'index']);
  Route::get('/profile', [PagesController::class, 'profile']);
  Route::put('/profile/{user:username}', [PagesController::class, 'update']);

  Route::post('/getSession/{team:team_number}', [QuizController::class, 'getSession']);
});
Route::get('/verifying', [PagesController::class, 'verifying'])->middleware('auth');

// PENYISIHAN ROUTES
Route::middleware(['auth', 'registered', 'participant', 'startQuiz'])->group(function () {
  Route::get('/quiz/{quiz_attempt}/submission', [QuizController::class, 'submission']);
  Route::get('/quiz/{quiz_attempt}/{quiz_tryout}', [QuizController::class, 'startQuiz']);
  Route::post('/saveAnswer/{quiz_tryout}', [QuizController::class, 'saveAnswer']);
  Route::post('/removeAnswer/{quiz_tryout}', [QuizController::class, 'removeAnswer']);
  Route::post('/addflagged/{quiz_tryout}', [QuizController::class, 'addflagged']);
  Route::post('/removeflagged/{quiz_tryout}', [QuizController::class, 'removeflagged']);
  Route::get('/endQuiz/{quiz_attempt}', [QuizController::class, 'endSession']);
});

// ADMIN ROUTES
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

  Route::get('/', [AdminController::class, 'index']);

  Route::prefix('tim')->group(function () {
    Route::get('/', [AdminTeamController::class, 'index']);
    Route::get('/verifikasi', [AdminTeamController::class, 'verifying']);
    Route::get('/ketua', [AdminTeamController::class, 'leader']);
    Route::get('/anggota', [AdminTeamController::class, 'member']);
    Route::get('/{team:team_number}', [AdminTeamController::class, 'show']);

    Route::post('/verifikasi/{user:id}', [AdminTeamController::class, 'verified']);
    Route::post('/resetpass/{user:id}', [AdminTeamController::class, 'resetpass']);
    Route::post('/deleteData/{user:id}', [AdminTeamController::class, 'deletingData']);
  });

  Route::prefix('penyisihan')->group(function () {
    // TOKEN ROUTES
    Route::get('/setup', [SetupController::class, 'setup']);
    Route::get('/status', [PenyisihanController::class, 'status']);
    Route::get('/ranking', [PenyisihanController::class, 'ranking']);
    Route::put('/token/{quiz_token:id}', [SetupController::class, 'generate_token']);
    Route::delete('/token/delete_token/{quiz_token:id}', [SetupController::class, 'delete_token']);
    // TIMER ROUTES
    Route::put('/timer/{quiz_timer:id}', [SetupController::class, 'set_timer']);
    Route::get('/jawaban/{team:team_number}', [PenyisihanController::class, 'answer']);
  });
  Route::resource('/penyisihan', PenyisihanController::class)->parameters([
    'penyisihan' => 'quiz_tryout'
  ]);
});

// SUPERADMIN ROUTES
Route::prefix('superadmin')->middleware(['auth', 'superadmin'])->group(function () {
  Route::get('/', [SuperadminController::class, 'index']);

  Route::get('/trashed', [SuperadminController::class, 'trashed']);
  Route::get('/trashed/{team:team_number}', [SuperadminController::class, 'show']);
  Route::post('/restore/{user}', [SuperadminController::class, 'restore']);
  Route::post('/destroy/{user}', [SuperadminController::class, 'destroy']);

  Route::get('/attempt', [SuperadminController::class, 'attempt']);
  Route::delete('/deleteSession/{quiz_attempt}', [SuperadminController::class, 'deleteSession']);
});
