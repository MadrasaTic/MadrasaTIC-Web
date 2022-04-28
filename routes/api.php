<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthAPIController;
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
