<?php

use App\Http\Controllers\BotController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users', [HomeController::class, 'users'])->name('users.index');
Route::get('/telegram', [HomeController::class, 'telegram'])->name('telegram');
Route::get('/telegram/sending', [HomeController::class, 'sending'])->name('sending');
Route::get('/telegram/bot', [BotController::class, 'bot']);


