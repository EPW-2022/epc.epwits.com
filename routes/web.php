<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\PenyisihanController;
use App\Http\Controllers\Admin\SetupController;
use App\Http\Controllers\Admin\PerempatController;
use App\Http\Controllers\Admin\QuarterController;
use App\Http\Controllers\Admin\SemifinalController;
use App\Http\Middleware\Superadmin;
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
  Route::post('/quarterSession/{team:team_number}', [QuarterController::class, 'quarterSession']);
  Route::post('/semifinalAttend/{team:team_number}', [SemifinalController::class, 'semifinalAttend']);
  Route::post('/answerSubmit', [SemifinalController::class, 'answerSubmit']);
});
Route::get('/verifying', [PagesController::class, 'verifying'])->middleware('auth');

// PENYISIHAN ROUTES
Route::middleware(['auth', 'registered', 'participant', 'startQuiz'])->group(function () {
  // Penyisihan
  Route::get('/quiz/{quiz_attempt}/submission', [QuizController::class, 'submission']);
  Route::get('/quiz/{quiz_attempt}/{quiz_tryout}', [QuizController::class, 'startQuiz']);
  // Saving Answer
  Route::post('/saveAnswer/{quiz_tryout}', [QuizController::class, 'saveAnswer']);
  Route::post('/removeAnswer/{quiz_tryout}', [QuizController::class, 'removeAnswer']);
  // Perempat Final
  Route::get('/quarter/{quarter_attempt}/submission', [QuarterController::class, 'submission']);
  Route::get('/quarter/{quarter_attempt}/endQuiz', [QuarterController::class, 'endSession']);
  Route::get('/quarter/{quarter_attempt}/{quarter_tryout}', [QuarterController::class, 'startQuiz']);
  // Upload Answer
  Route::post('/uploadAnswer/{quarter_tryout}', [QuarterController::class, 'uploadAnswer']);
  Route::delete('/deleteAnswer/{quarter_answer:answer_file}/{quarter_tryout}', [QuarterController::class, 'deleteAnswer']);
  // Flagged Question
  Route::post('/addflagged/{quiz_tryout}', [QuizController::class, 'addflagged']);
  Route::post('/removeflagged/{quiz_tryout}', [QuizController::class, 'removeflagged']);
  // Submission
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

  Route::prefix('setup')->group(function () {
    Route::get('/', [SetupController::class, 'setup']);
    Route::put('/token/{quiz_token:id}', [SetupController::class, 'generate_token']);
    Route::put('/timer/{quiz_timer:id}', [SetupController::class, 'set_timer']);
  });
  // Penyisihan
  Route::prefix('penyisihan')->group(function () {
    // TOKEN ROUTES
    Route::get('/status', [PenyisihanController::class, 'status']);
    Route::get('/ranking', [PenyisihanController::class, 'ranking']);
    Route::get('/jawaban/{team:team_number}', [PenyisihanController::class, 'answer']);
    Route::put('/changerole/{team:team_number}', [PenyisihanController::class, 'changerole']);
  });
  Route::resource('/penyisihan', PenyisihanController::class)->parameters([
    'penyisihan' => 'quiz_tryout'
  ]);

  // Perempat Final
  Route::prefix('perempat')->group(function () {
    Route::get('/status', [PerempatController::class, 'status']);
    Route::get('/jawaban', [PerempatController::class, 'jawaban']);
    Route::get('/ranking', [PerempatController::class, 'ranking']);
    Route::post('/submitScore/{quarter_answer}', [PerempatController::class, 'submitScore']);
    Route::put('/changerole/{team:team_number}', [PerempatController::class, 'changerole']);
  });
  Route::resource('/perempat', PerempatController::class)->parameters([
    'perempat' => 'quarter_tryout'
  ]);

  // Semifinal
  Route::prefix('semifinal')->group(function () {
    Route::get('/platform', [SemifinalController::class, 'platform']);
    Route::get('/status', [SemifinalController::class, 'status']);
    Route::get('/jawaban', [SemifinalController::class, 'jawaban']);
    Route::post('/submitScore/{semifinal_answer}', [SemifinalController::class, 'submitScore']);
    Route::get('/ranking', [SemifinalController::class, 'ranking']);
    Route::get('/requestQuestion/{semifinal_tryout}', [SemifinalController::class, 'requestQuestion']);
    Route::post('/questionAssign/{semifinal_tryout}', [SemifinalController::class, 'questionAssign']);
    Route::get('/questionFinished/{semifinal_tryout}', [SemifinalController::class, 'questionFinished']);
    Route::get('/dataPlatform', [SemifinalController::class, 'dataPlatform']);
  });
  Route::resource('/semifinal', SemifinalController::class)->parameters([
    'semifinal' => 'semifinal_tryout'
  ])->except(['create', 'store', 'delete']);
});

// SUPERADMIN ROUTES
Route::prefix('superadmin')->middleware(['auth', 'superadmin'])->group(function () {
  Route::get('/', [SuperadminController::class, 'index']);

  Route::get('/trashed', [SuperadminController::class, 'trashed']);
  Route::get('/trashed/{team:team_number}', [SuperadminController::class, 'show']);
  Route::post('/restore/{user}', [SuperadminController::class, 'restore']);
  Route::post('/destroy/{user}', [SuperadminController::class, 'destroy']);

  Route::prefix('attempt')->group(function () {
    Route::get('/penyisihan', [SuperadminController::class, 'penyisihan']);
    Route::get('/perempat', [SuperadminController::class, 'perempat']);
  });
  Route::delete('/deleteQuiz/{quiz_attempt}', [SuperadminController::class, 'deleteQuiz']);
  Route::delete('/deleteQuarter/{quarter_attempt}', [SuperadminController::class, 'deleteQuarter']);

  Route::get('/semifinal', [SuperadminController::class, 'semifinal']);
  Route::get('/requestQuestion/{semifinal_tryout}', [SuperadminController::class, 'requestQuestion']);
  Route::get('/semifinal/{semifinal_tryout}', [SuperadminController::class, 'resetQuestion']);
  Route::delete('/semifinal/deleteAnswer/{semifinal_answer}', [SuperadminController::class, 'deleteAnswer']);
});
