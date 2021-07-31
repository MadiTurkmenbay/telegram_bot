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
Route::post('/save_texts', [HomeController::class, 'save_texts'])->name('save_texts');
Route::GET('/get_chats', [HomeController::class, 'get_chats'])->name('get_chats');



