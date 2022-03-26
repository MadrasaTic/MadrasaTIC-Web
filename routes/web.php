<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('google', function () {
    return view('googleAuth');
});
    
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','HasPermission'])->group(function () {
    Route::get('/create',[CheckController::class, 'create']);
    Route::get('/indexx',[CheckController::class, 'index']);
});
Route::get('/home', [HomeController::class, 'index'])->name('home');