<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CompaniesSeeder extends Seeder {

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() {
        if (app()->environment() != 'production') {
            \DB::table('companies')->delete();
            if (app()->environment() != 'testing') {
                \DB::statement("ALTER TABLE companies AUTO_INCREMENT = 1");
            }
            insertDefaultCompanies();
        }
    }
}
