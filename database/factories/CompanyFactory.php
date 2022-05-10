<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $industry = \App\Models\Industry::inRandomOrder()->first();
        $country = \App\Models\Country::inRandomOrder()->first();
        return [
            'title' => $this->faker->sentence(2),
            'industry_id' => $industry->id,
            'country_id' => $country->id,
            'city' => $this->faker->sentence(2),
            'address' => $this->faker->sentence(4),
            'commercial_registry' => RandomString(10) . time().'.png',
            'tax_id_card' => RandomString(10) . time().'.png',
            'website' => 'https://example'.rand(10,10000).'.com',
            'linkedin' => 'https://linkedin.com/in/'.RandomString(10),
            'facebook' => 'https://facebook.com/'.RandomString(10),
            'instagram' => 'https://instagram.com/'.RandomString(10),
            'image' => RandomString(10) . time().'.png',
            'plan_id'=>1,
            'expiry_date'=>date('Y-m-d', strtotime(date('Y-m-d') . ' +1 year'))
        ];
    }
}
