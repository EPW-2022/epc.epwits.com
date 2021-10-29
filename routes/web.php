<?php

use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/daftar', [AuthController::class, 'register'])->middleware('guest');

Route::post('/daftar', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'authentication']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/registrasi', [PagesController::class, 'registrasi']);
Route::get('/prapenyisihan', [PagesController::class, 'prapenyisihan']);
Route::get('/loginepc',function(){
  return view ('main.loginepc',[
    'title'=>'loginepc'
  ]);
});

Route::get('/', function () {
    return view('dashboard.index');
})->middleware('auth');
