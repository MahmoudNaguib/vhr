<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(BasicSeeder::class);
        if (app()->environment() != 'production' && app()->environment() != 'testing') {
            $this->call(PlansSeeder::class);
            $this->call(NotificationsSeeder::class);
            $this->call(CompaniesSeeder::class);
            $this->call(MessagesSeeder::class);
        }
    }
}
