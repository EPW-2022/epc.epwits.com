<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Models\Team;
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
});
Route::get('/verifying', [PagesController::class, 'verifying'])->middleware('auth');

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
});

// SUPERADMIN ROUTES
Route::prefix('superadmin')->middleware(['auth', 'superadmin'])->group(function () {
  Route::get('/', [SuperadminController::class, 'index']);

  Route::get('/trashed', [SuperadminController::class, 'trashed']);
  Route::get('/trashed/{team:team_number}', [SuperadminController::class, 'show']);
  Route::post('/restore/{user}', [SuperadminController::class, 'restore']);
  Route::post('/destroy/{user}', [SuperadminController::class, 'destroy']);
});
