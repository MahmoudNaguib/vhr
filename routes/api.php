<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

AdvancedRoute::controller('auth', \App\Http\Controllers\Api\AuthController::class);
Route::group(['middleware' => ['ApiAuth']], function () {
    AdvancedRoute::controller('profile', \App\Http\Controllers\Api\ProfileController::class);
});



/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
