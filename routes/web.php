<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/user', [HomeController::class, 'user'])->middleware('auth');

Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'store']);

Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/myFriends', [UserController::class, 'myFriends'])->middleware('auth');

Route::post('/thumb', [UserController::class, 'thumb'])->middleware('auth');

Route::get('/payment', [LoginController::class, 'payment']);
Route::post('/payment', [LoginController::class, 'savePayment']);

Route::get('/top-up', [UserController::class, 'topUp']);
