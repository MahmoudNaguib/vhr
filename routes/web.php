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

    ////////////// Admin Routes
    Route::group(['prefix' => 'admin','middleware' => ['IsSuperAdmin']], function () {
        AdvancedRoute::controller('roles', \App\Http\Controllers\Admin\RolesController::class);
    });
    Route::group(['prefix' => 'admin','middleware' => ['IsAdmin']], function () {
        AdvancedRoute::controller('users', \App\Http\Controllers\Admin\UsersController::class);
        AdvancedRoute::controller('countries', \App\Http\Controllers\Admin\CountriesController::class);
        AdvancedRoute::controller('industries', \App\Http\Controllers\Admin\IndustriesController::class);
        AdvancedRoute::controller('companies', \App\Http\Controllers\Admin\CompaniesController::class);
    });
    ////////////// End Admin Routes


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
