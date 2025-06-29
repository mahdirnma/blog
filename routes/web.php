<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('guest')->group(function () {
    Route::get('/login',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'registerForm'])->name('register.form');
    Route::post('/register',[AuthController::class,'register'])->name('register');
});
Route::middleware('auth')->group(function () {
    Route::get('/home',[UserController::class,'dashboard'])->name('home');
    Route::resource('/posts',PostController::class);
    Route::resource('/categories',CategoryController::class);
    Route::resource('/tags',TagController::class);
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});
Route::get('/',[UserController::class,'userDashboard'])->name('user.dashboard');
