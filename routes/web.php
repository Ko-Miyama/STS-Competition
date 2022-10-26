<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;

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
    Route::delete('/overview/{submit}', [SubmitController::class, 'delete']);
    Route::get('/leaderboard', [SubmitController::class, 'leaderboard']);
    Route::get('/discussion', [PostController::class, 'discussion']);
    Route::get('/discussion/create', [PostController::class, 'create']);
    Route::post('/discussion/create/store', [PostController::class, 'store']);
    Route::get('/discussion/{post}', [PostController::class, 'show']);
    Route::get('/discussion/{post}/edit', [PostController::class, 'edit']);
    Route::put('/discussion/{post}', [PostController::class, 'update']);
    Route::delete('/discussion/{post}', [PostController::class, 'delete']);
    Route::get('/discussion/user/{user}', [UserController::class, 'squeeze']);
    Route::get('/discussion/category/{category}', [CategoryController::class, 'squeeze']);
    Route::post('/discussion/{post}/msgstore', [MessageController::class, 'store']);
    Route::get('/discussion/{post}/{message}/edit', [MessageController::class, 'edit']);
    Route::put('/discussion/{post}/{message}', [MessageController::class, 'update']);
    Route::delete('/discussion/{post}/{message}', [MessageController::class, 'delete']);
    Route::get('/rule', [UserController::class, 'rule']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
