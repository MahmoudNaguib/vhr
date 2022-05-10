<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlanFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'title' => $this->faker->sentence(2),
            'users_count'=>rand(1,10),
            'unlock_count' => rand(10,100),
            'posts_count'=>rand(5,100),
            'duration_in_month'=>1,
            'price'=>rand(10,100)
        ];
    }
}
