<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MessageFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $industry = \App\Models\Industry::inRandomOrder()->first();
        $country = \App\Models\Country::inRandomOrder()->first();
        return [
            'name' =>$this->faker->name,
            'email' =>$this->faker->unique()->safeEmail,
            'mobile' => '0122' . rand(1000000, 9999999),
            'message'=> $this->faker->sentence(10)
        ];
    }
}
