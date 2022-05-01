<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class PlansSeeder extends Seeder {

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() {
        if (app()->environment() != 'production') {
            \DB::table('plans')->delete();
            if (app()->environment() != 'testing') {
                \DB::statement("ALTER TABLE plans AUTO_INCREMENT = 1");
                insertDefaultPlans();
            }
        }
    }
}
