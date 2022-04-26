<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\CheckController;

use App\Http\Controllers\Configure\PermissionsController;
use App\Http\Controllers\Configure\RolesController;
use App\Http\Controllers\Configure\RolesAssignmentController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ServicesController;

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
// views
Route::get('/', [LoginController::class, 'showLoginForm']);

Route::get('google', function () {
    return view('googleAuth');
});

Route::get('/departments', function () {
    return view('departments');
});

Route::get('/signalmentsState', function () {
    return view('signalmentsState');
});

Route::get('/infrastructure', function () {
    return view('infrastructure');
});

// Route::get('/permissions', function () {
//     return view('permissions');
// });



//====================================================================================================
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);


// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('resetPasswordFromLogin');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm']);
Route::post('password/reset', [ResetPasswordController::class, 'reset']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::post('/profile', [UserController::class, 'update']);
    Route::post('/profile/updatePassword', [UserController::class, 'updatePassword'])->name('updatePasswordFromProfile');
    Route::post('/profile/uploadProfilePicture', [UserController::class, 'uploadProfilePicture'])->name('uploadProfilePicture');
    Route::get('/profile', [UserController::class, 'show'])->name('profile');

    // Route::post('/members', 'App\Http\Controllers\MemberController@store');
    // Route::post('/members/edit/{id}', 'App\Http\Controllers\MemberController@update');
    // Route::post('/members/delete/{id}', 'App\Http\Controllers\MemberController@softDelete');

    //Route::get('/members', function () {
        //  return view('members');
        //});
        // Route::get('/dashboard', function () {
            //     return Inertia::render('Dashboard');
            // })->name('dashboard');


    Route::middleware(['HasPermission'])->group(function () {
        Route::resource('/roles', RolesController::class, ['as' => 'configure']);
        Route::get('/roles',[RolesController::class,'index'])->name('roles');
        Route::post('/roles/{id}',[RolesController::class,'update']);
        Route::post('/roles/delete/{id}',[RolesController::class,'delete']);

        Route::resource('/members', MembersController::class);
        Route::get('/members',[MembersController::class,'index'])->name('members');
        Route::post('/members/{id}',[MembersController::class,'update']);
        Route::post('/members/delete/{id}',[MembersController::class,'delete']);

        Route::resource('/permissions', PermissionsController::class);
        Route::get('/permissions',[PermissionsController::class,'index'])->name('permissions');
        Route::post('/permissions/{id}',[PermissionsController::class,'update']);
        Route::post('/permissions/delete/{id}',[PermissionsController::class,'delete']);

        Route::get('/create',[CheckController::class, 'create'])->name('create');
        Route::get('/indexx',[CheckController::class, 'index'])->name('indexx');
    });

    Route::middleware(['HasPermission'])->group(function () {

        //Route::resource('/permissions', PermissionsController::class, ['as' => 'configure'])
        //  ->only(['index', 'create', 'store', 'edit', 'update']);

        //  Route::resource('/roles', RolesController::class, ['as' => 'configure']);

        Route::resource('/roles-assignment', RolesAssignmentController::class, ['as' => 'configure'])
            ->only(['index', 'edit', 'update']);
        });
});
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::get('/members', 'App\Http\Controllers\MemberController@show');


// Route::post('/permissions',[PermissionsController::class,'store'])->name('permissions');
// Route::get('/permissions',[PermissionsController::class,'index'])->name('permissions');

// Route::get('/permissions/{id}',[PermissionsController::class,'edit']);
// Route::post('/permissions/{id}',[PermissionsController::class,'update']);
// Route::post('/permissions/delete/{id}',[PermissionsController::class,'delete']);

// Service Routes
Route::get('/departments', [ServicesController::class, 'show']);
Route::post('/departments',[ServicesController::class, 'Add']);
Route::get('/departments/{id}/edit',[ServicesController::class,'edit']);
Route::post('/departments/{id}',[ServicesController::class,'update']);
Route::post('/departments/delete/{id}',[ServicesController::class,'delete']);