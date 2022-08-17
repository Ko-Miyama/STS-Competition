<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubmitController;

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

Route::get('/', [UserController::class, 'home_page']);
Route::group(['middleware' => ['auth']], function() {
    Route::get('/top', [UserController::class, 'top']);
    Route::get('/submit', [SubmitController::class, 'submit']);
    Route::post('/submit/result', [SubmitController::class, 'store']);
    Route::get('/overview', [SubmitController::class, 'overview']);
    Route::get('/leaderboard', [SubmitController::class, 'leaderboard']);
    Route::get('/discussion', [PostController::class, 'discussion']);
    Route::get('/rule', [UserController::class, 'rule']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
