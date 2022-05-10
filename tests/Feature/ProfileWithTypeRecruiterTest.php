<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileWithTypeRecruiterTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_get_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsRecruiterUser();
        $this->get('en/profile/edit')
            ->assertStatus(200);
    }

    public function test_post_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsRecruiterUser();
        $factory = [
            'gender' => auth()->user()->gender,
            'name' => auth()->user()->name,
            'mobile' => auth()->user()->mobile,
        ];
        $this->post('en/profile/edit', $factory)
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }

    public function test_get_change_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsRecruiterUser();
        $this->get('en/profile/change-password')
            ->assertStatus(200);
    }

    public function test_post_change_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsRecruiterUser();
        $this->post('en/profile/change-password', [
            'old_password' => 'demo@12345',
            'password' => 'demo@12345',
            'password_confirmation' => 'demo@12345',
        ])->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }

    public function test_get_logout() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsRecruiterUser();
        $this->get('en/profile/logout')
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }
}
