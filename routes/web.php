<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
AdvancedRoute::controller('auth', \App\Http\Controllers\AuthController::class);
AdvancedRoute::controller('download', \App\Http\Controllers\DownloadController::class);

Route::group(['middleware' => ['auth']], function () {
    AdvancedRoute::controller('profile', \App\Http\Controllers\ProfileController::class);
    Route::group(['middleware' => ['RecruiterUser']], function () {
        AdvancedRoute::controller('company', \App\Http\Controllers\CompanyController::class);
    });
    Route::group(['middleware' => ['CompletedProfile']], function () {
        AdvancedRoute::controller('dashboard', \App\Http\Controllers\DashboardController::class);
        AdvancedRoute::controller('notifications', \App\Http\Controllers\NotificationsController::class);
    });
});





/*Route::get('/', function () {
    return view('welcome');
});*/
