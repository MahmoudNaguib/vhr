<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BasicSeeder extends Seeder {

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() {
        \Cache::forget('configs');
        configureUploads();
        ///////////////////////////////////////////////////////////////// Default Configs
        \DB::table('configs')->delete();
        if (app()->environment() != 'testing') {
            \DB::statement("ALTER TABLE configs AUTO_INCREMENT = 1");
        }
        insertDefaultConfigs();
        ///////////////////////////////////////////////////////////////// Default Configs
        \DB::table('countries')->delete();
        if (app()->environment() != 'testing') {
            \DB::statement("ALTER TABLE countries AUTO_INCREMENT = 1");
        }
        insertDefaultCountries();
        ///////////////////////////////////////////////////////////////// Default Configs
        \DB::table('industries')->delete();
        if (app()->environment() != 'testing') {
            \DB::statement("ALTER TABLE industries AUTO_INCREMENT = 1");
        }
        insertDefaultIndustries();
        ////////////////////////////////////////////////////////// insert default roles
        \DB::table('roles')->delete();
        if (app()->environment() != 'testing') {
            \DB::statement("ALTER TABLE roles AUTO_INCREMENT = 1");
        }
        insertDefaultRoles();
        //////////////////////////////////////////////////// Insert default users
        \DB::table('users')->delete();
        if (app()->environment() != 'testing') {
            DB::statement("ALTER TABLE users AUTO_INCREMENT = 1");
        }
        insertDefaultUsers();
        //////////////////////////////////////////////////// Insert default companies
        \DB::table('companies')->delete();
        if (app()->environment() != 'testing') {
            DB::statement("ALTER TABLE users AUTO_INCREMENT = 1");
        }
        insertDefaultCompanies();
    }
}
