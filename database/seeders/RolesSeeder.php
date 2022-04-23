<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RolesSeeder extends Seeder {

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() {
        if (app()->environment() != 'production') {
            \DB::table('roles')->delete();
            if (app()->environment() != 'testing') {
                \DB::statement("ALTER TABLE roles AUTO_INCREMENT = 1");
            }
            insertDefaultRoles();
        }
    }
}
