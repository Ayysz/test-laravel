<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
/* 
Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function() {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('register', [UserController::class, 'register']) -> name('register');
Route::post('register', [UserController::class, 'register_act']) -> name('register.act');
Route::get('login', [UserController::class, 'login']) -> name('login');
Route::post('login', [UserController::class, 'login_act']) -> name('login.act');
Route::get('password', [UserController::class, 'password']) -> name('password');
Route::post('password', [UserController::class, 'password_act']) -> name('password.act');
Route::get('logout', [UserController::class, 'logout']) -> name('logout');
