<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CountriesSeeder extends Seeder {

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() {
        \DB::table('countries')->delete();
        if (app()->environment() != 'testing') {
            \DB::statement("ALTER TABLE countries AUTO_INCREMENT = 1");
        }
        insertDefaultCountries();
    }

}
