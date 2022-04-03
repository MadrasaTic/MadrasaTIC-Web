<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Configure\PermissionsController;
use App\Http\Controllers\Configure\RolesController;
use App\Http\Controllers\Configure\RolesAssignmentController;

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
    return view('auth/login');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/members', function () {
    return view('members');
});

Route::get('google', function () {
    return view('googleAuth');
});
    
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::middleware(['HasPermission'])->group(function () {
        Route::get('/profile', [UserController::class, 'show'])->name('profile');
        Route::get('/create',[CheckController::class, 'create'])->name('create');
        Route::get('/indexx',[CheckController::class, 'index'])->name('indexx');
    });

    Route::middleware(['HasPermission'])->group(function () {

        Route::resource('/permissions', PermissionsController::class, ['as' => 'configure'])
            ->only(['index', 'create', 'store', 'edit', 'update']);
        
        Route::resource('/roles', RolesController::class, ['as' => 'configure']);
        
        Route::resource('/roles-assignment', RolesAssignmentController::class, ['as' => 'configure'])
            ->only(['index', 'edit', 'update']);
        });
});
Route::get('/home', [HomeController::class, 'index'])->name('home');