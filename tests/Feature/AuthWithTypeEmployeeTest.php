<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthWithTypeEmployeeTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_get_login() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->get('/auth/login')
            ->assertStatus(200);
    }

    public function test_post_invalid_login() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->post('/auth/login', ['email' => 'invalid@example.com', 'password' => 'demo@12345'])
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'danger');
    }

    public function test_post_valid_login() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->post('/auth/login',
            [
                'email' => $this->employeeUser->email,
                'password' => 'demo@12345'
            ])
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }

    public function test_get_forgot_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->get('/auth/forgot-password')
            ->assertStatus(200)
            ->assertSee('Forgot password');
    }

    public function test_post_invalid_forgot_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->post('/auth/forgot-password', [
            'email' => 'invalid@example.com',
        ])
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'danger');
    }

    public function test_post_valid_forgot_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->post('/auth/forgot-password',
            [
                'email' => $this->employeeUser->email,
            ])
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }

    public function test_get_reset_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $passwordToken = md5($this->employeeUser->id) . md5($this->employeeUser->email) . md5(rand(1000, 10000));
        $this->employeeUser->password_token = $passwordToken;
        $this->employeeUser->save();
        $this->get('/auth/reset-password?token=' . $passwordToken)
            ->assertStatus(200);
    }

    public function test_post_reset_password() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $passwordToken = md5($this->employeeUser->id) . md5($this->employeeUser->email) . md5(rand(1000, 10000));
        $this->employeeUser->password_token = $passwordToken;
        $this->employeeUser->save();
        $this->post('/auth/reset-password?token=' . $passwordToken, [
            'password' => 'demo@12345',
            'password_confirmation' => 'demo@12345'
        ])->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }
}
