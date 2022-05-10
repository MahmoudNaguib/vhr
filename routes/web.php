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
Route::group(['prefix' => (app()->environment() == 'testing') ? 'en' : LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index']);
    AdvancedRoute::controller('contact', \App\Http\Controllers\MessageController::class);

    AdvancedRoute::controller('auth', \App\Http\Controllers\AuthController::class);
    AdvancedRoute::controller('download', \App\Http\Controllers\DownloadController::class);

    Route::group(['middleware' => ['auth']], function () {
        AdvancedRoute::controller('profile', \App\Http\Controllers\ProfileController::class);

        ////////////// Admin Routes
        Route::group(['prefix' => 'admin','middleware' => ['IsSuperAdmin']], function () {
            AdvancedRoute::controller('roles', \App\Http\Controllers\Admin\RolesController::class);
            AdvancedRoute::controller('configs', \App\Http\Controllers\Admin\ConfigsController::class);
        });
        Route::group(['prefix' => 'admin','middleware' => ['IsAdmin']], function () {
            AdvancedRoute::controller('dashboard', \App\Http\Controllers\Admin\DashboardController::class);
            AdvancedRoute::controller('users', \App\Http\Controllers\Admin\UsersController::class);
            AdvancedRoute::controller('countries', \App\Http\Controllers\Admin\CountriesController::class);
            AdvancedRoute::controller('plans', \App\Http\Controllers\Admin\PlansController::class);
            AdvancedRoute::controller('industries', \App\Http\Controllers\Admin\IndustriesController::class);
            AdvancedRoute::controller('messages', \App\Http\Controllers\Admin\MessagesController::class);
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
});
