<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class IndustriesSeeder extends Seeder {

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() {
        \DB::table('industries')->delete();
        if (app()->environment() != 'testing') {
            \DB::statement("ALTER TABLE industries AUTO_INCREMENT = 1");
        }
        insertDefaultIndustries();
    }

}
