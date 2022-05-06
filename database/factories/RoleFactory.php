<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoleFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $permissions=config('modules.Users');
        return [
            'title' => $this->faker->sentence(2),
            'permissions'=>array_keys($permissions),
            'created_by' =>1
        ];
    }
}
