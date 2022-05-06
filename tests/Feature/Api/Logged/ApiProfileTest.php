<?php

namespace Tests\Feature\Api\Logged;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\DefaultData;

class ApiProfileTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_get_index() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUserApi();
        $this->get($this->apiURL . '/profile')
            ->assertStatus(200);
    }

    public function test_post_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUserApi();
        $factory = [
            'gender' => auth()->user()->gender,
            'name' => auth()->user()->name,
            'mobile' => auth()->user()->mobile,
            'country_id' => 62,
            'city' => 'cairo',
            'national_id' => '12345678910',
            'birth_date' => '2005-05-04',
            'degree' => 'bachelor',
            'bio' => 'Bio information',
        ];
        $this->post($this->apiURL . '/profile/edit', $factory)
            ->assertStatus(200);
    }

    public function test_post_change_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUserApi();
        $this->post($this->apiURL . '/profile/change-password', [
            'old_password' => 'demo@12345',
            'password' => 'demo@12345',
            'password_confirmation' => 'demo@12345',
        ])
            ->assertStatus(200);
    }

    public function test_get_logout() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUserApi();
        $this->get($this->apiURL . '/profile/logout')
            ->assertStatus(200);
    }
}
