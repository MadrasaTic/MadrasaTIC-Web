<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\SignalementController;

use App\Http\Controllers\API\AnnexeController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\StateController;
use App\Http\Controllers\API\InfrastructureController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AnnonceController;

use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return User::with('UserInformation')->find($request->user()->id);
});

Route::get('/login/{provider}', [AuthAPIController::class,'redirectToProvider']);
Route::get('/auth/{provider}/callback', [AuthAPIController::class,'handleProviderCallback']);

Route::post('requestToken', [AuthAPIController::class, 'requestToken']);
Route::post('requestTokenGoogle', [AuthAPIController::class, 'requestTokenGoogle']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('states', [StateController::class, "index"]);
    // Route::get('categories', [SignalementController::class, "index"]);
    // Route::get('infrastructure', [SignalementController::class, "index"]);
    // Route::get('services', [SignalementController::class, "index"]);
    // Route::get('priorities', [SignalementController::class, "index"]);
    // Route::get('users', [SignalementController::class, "index"]);

    Route::get('signalement', [SignalementController::class, "index"]);
    Route::post('signalement', [SignalementController::class, "store"]);
    Route::get('signalement/{id}', [SignalementController::class, "show"]);
    Route::post('signalement/{id}', [SignalementController::class, "update"]);
    Route::delete('signalement/delete/{id}',[SignalementController::class,'delete']);

    Route::post('signalement/{id}/react/{reaction}', [SignalementController::class, "react"]);
    Route::post('signalement/{id}/save', [SignalementController::class, "save"]);

    Route::get('/annonce',[AnnonceController::class, 'index']);
    Route::get('/annonce/{id}',[AnnonceController::class, 'show']);
    Route::post('/annonce',[AnnonceController::class, 'store']);

    Route::get('user/saved', [UserController::class, "saved"]);
    Route::get('user/upvoted', [UserController::class, "upvoted"]);
    Route::get('user/downvoted', [UserController::class, "downvoted"]);
});
Route::get('annexe', [AnnexeController::class, "index"]);
Route::post('annexe', [AnnexeController::class, "store"]);
Route::get('annexe/{id}', [AnnexeController::class, "show"]);

Route::get('category', [CategoryController::class, "index"]);
Route::get('infrastructure', [InfrastructureController::class, "index"]);
Route::get('states', [StateController::class, "index"]);

Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});
