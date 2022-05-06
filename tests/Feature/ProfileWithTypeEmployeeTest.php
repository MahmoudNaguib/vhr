<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileWithTypeEmployeeTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_get_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUser();
        $this->get('/profile/edit')
            ->assertStatus(200);
    }

    public function test_post_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUser();
        $factory = [
            'gender' => auth()->user()->gender,
            'name' => auth()->user()->name,
            'mobile' => auth()->user()->mobile,
            'country_id'=>62,
            'city'=>'cairo',
            'national_id'=>'12345678910',
            'birth_date'=>'2005-05-04',
            'degree'=>'bachelor',
            'bio'=>'Bio information',
        ];
        $this->post('/profile/edit', $factory)
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }

    public function test_get_change_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUser();
        $this->get('/profile/change-password')
            ->assertStatus(200);
    }

    public function test_post_change_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUser();
        $this->post('/profile/change-password', [
            'old_password' => 'demo@12345',
            'password' => 'demo@12345',
            'password_confirmation' => 'demo@12345',
        ])->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }

    public function test_get_logout() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsEmployeeUser();
        $this->get('/profile/logout')
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }
}
