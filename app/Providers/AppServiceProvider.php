<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Form;
use Validator;
use Config;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(250);
        /// validation rules
        Validator::extend('mobile', function ($attribute, $value, $parameters, $validator) {
            if ($value == '') {
                return true;
            }
            if (!trim($value) && intval($value) != 0) {
                return true;
            }
            return (preg_match('/^([(+)0-9,\\-,+,]){4,20}$/', $value));
            //return is_numeric($value);
        });
        Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            if ($value == '') {
                return true;
            }
            if (!trim($value) && intval($value) != 0) {
                return true;
            }
            return (preg_match('/^([(+)0-9,\\-,+,]){4,15}$/', $value));
        });
        //////////// Custom User validator
        Validator::extend('in_degree', function ($attribute, $value, $parameters, $validator) {
            $row=new \App\Models\User;
            return in_array($value,array_keys($row->getDegrees()));
        });
        Paginator::useBootstrap();
        /*$timezone=(conf('time_zone'))?:'Asia/Dubai';
        Config::set("app.timezone",$timezone);
        date_default_timezone_set($timezone);*/
    }

}
