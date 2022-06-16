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
use App\Http\Controllers\StateController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PrioritiesController;
use App\Http\Controllers\SignalmentsController;

use App\Http\Controllers\Infrastructure\AnnexeController;
use App\Http\Controllers\Infrastructure\BlocController;
use App\Http\Controllers\Infrastructure\RoomController;

use App\Http\Controllers\AnnoncesController;
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

Route::get('/signalmentsPriority', function () {
    return view('signalmentsPriority');
});

Route::get('/signalments', function () {
    return view('signalments');
});

Route::get('/signalmentsRapport', function () {
    return view('signalmentsRapport');
});

Route::get('/annonces', function () {
    return view('annonces');
});

Route::get('/addAnnonce', function () {
    return view('addAnnonce');
});
Route::get('/Modifyannonces', function () {
    return view('Modifyannonces');
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

        Route::get('/infrastructure', function () {
            return view('infrastructure');
        });

        Route::controller(AnnexeController::class)->group(function () {
            Route::get('/infrastructure/annexe','index');
            Route::post('/infrastructure/annexe','store');
            Route::get('/infrastructure/annexe/{id}','show');
            Route::post('/infrastructure/annexe/{id}','update');
            Route::post('/infrastructure/annexe/delete/{id}','delete'); 
        });

        Route::controller(BlocController::class)->group(function () {
            Route::get('/infrastructure/bloc/listing/{annexe_id}','listing');
            Route::post('/infrastructure/bloc','store');
            Route::get('/infrastructure/bloc/{id}','show');
            Route::post('/infrastructure/bloc/{id}','update');
            Route::post('/infrastructure/bloc/delete/{id}','delete');
        });

        Route::controller(RoomController::class)->group(function () {
            Route::get('/infrastructure/room/listing/{bloc_id}','listing');
            Route::post('/infrastructure/room','store');
            Route::get('/infrastructure/room/{id}','show');
            Route::post('/infrastructure/room/{id}','update');
            Route::post('/infrastructure/room/delete/{id}','delete');
        });
        Route::resource('/signalmentsState', StateController::class);
        Route::post('/signalmentsState/{id}',[StateController::class,'update']);
        Route::post('/signalmentsState/delete/{id}',[StateController::class,'delete']); 
        Route::get('/states',[StateController::class,'index'])->name('state');
        Route::post('/states/{id}',[StateController::class,'update']);
        Route::post('/states/delete/{id}',[StateController::class,'delete']);
        Route::resource('/signalmentsCategory', CategoryController::class);
        Route::post('/signalmentsCategory/{id}',[CategoryController::class,'update']);
        Route::post('/signalmentsCategory/delete/{id}',[CategoryController::class,'delete']); 

        Route::get('/signalments', [SignalmentsController::class, 'index']);
        // Route::post('/signalments', [SignalmentsController::class, 'store']);
        Route::get('/signalments/{id}/edit', [SignalmentsController::class, 'edit']);
        Route::post('/signalments/{id}',[SignalmentsController::class,'update']);
        Route::post('/signalments/delete/{id}',[SignalmentsController::class,'delete']);

        Route::get('/create',[CheckController::class, 'create'])->name('create');
        Route::get('/indexx',[CheckController::class, 'index'])->name('indexx');

        // Annonces
        Route::get('/annonces',[AnnoncesController::class, 'index']);
        Route::get('/annonces/{id}',[AnnoncesController::class, 'show']);
        Route::post('/annonces',[AnnoncesController::class, 'Add']);
        Route::get('/Modifyannonces/{id}/edit', [AnnoncesController::class, 'edit']);
        Route::post('/annonces/{id}',[AnnoncesController::class,'update']);
        Route::get('/annonces/delete/{id}',[AnnoncesController::class, 'delete']);
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



// Priority Route
Route::get('/signalmentsPriority', [PrioritiesController::class, 'show']);
Route::post('/signalmentsPriority',[PrioritiesController::class, 'Add']);
Route::get('/signalmentsPriority/{id}/edit',[PrioritiesController::class,'edit']);
Route::post('/signalmentsPriority/{id}',[PrioritiesController::class,'update']);
Route::post('/signalmentsPriority/delete/{id}',[PrioritiesController::class,'delete']);
