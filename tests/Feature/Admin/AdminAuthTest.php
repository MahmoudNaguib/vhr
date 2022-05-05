<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\DefaultData;

class AdminAuthTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_get_login() {
        dump(get_class($this) . ' ' . 'get login');
        $this->get('/auth/login')
            ->assertStatus(200);
    }

    public function test_post_invalid_login() {
        dump(get_class($this) . ' ' . 'post invalid login');
        $this->post('/auth/login', ['email' => 'invalid@example.com', 'password' => 'demo@12345'])
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'danger');
    }

    public function test_post_valid_login() {
        dump(get_class($this) . ' ' . 'post valid login');
        $this->post('/auth/login',
            [
                'email' => $this->adminUser->email,
                'password' => 'demo@12345'
            ])
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }

    public function test_get_forgot_password() {
        dump(get_class($this) . ' ' . 'get forgot password');
        $this->get('/auth/forgot-password')
            ->assertStatus(200)
            ->assertSee('Forgot password');
    }

    public function test_post_invalid_forgot_password() {
        dump(get_class($this) . ' ' . 'post invalid forgot password');
        $this->post('/auth/forgot-password', [
            'email' => 'invalid@example.com',
        ])
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'danger');
    }

    public function test_post_valid_forgot_password() {
        dump(get_class($this) . ' ' . 'post valid forgot password');
        $this->post('/auth/forgot-password',
            [
                'email' => $this->adminUser->email,
            ])
            ->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }

    public function test_get_reset_password() {
        dump(get_class($this) . ' ' . 'get reset password');
        $passwordToken = md5($this->adminUser->id) . md5($this->adminUser->email) . md5(rand(1000, 10000));
        $this->adminUser->password_token = $passwordToken;
        $this->adminUser->save();
        $this->get('/auth/reset-password?token=' . $passwordToken)
            ->assertStatus(200);
    }

    public function test_post_reset_password() {
        dump(get_class($this) . ' ' . 'post reset password');
        $passwordToken = md5($this->adminUser->id) . md5($this->adminUser->email) . md5(rand(1000, 10000));
        $this->adminUser->password_token = $passwordToken;
        $this->adminUser->save();
        $this->post('/auth/reset-password?token=' . $passwordToken, [
            'password' => 'demo@12345',
            'password_confirmation' => 'demo@12345'
        ])->assertStatus(302)
            ->assertSessionHas('flash_notification.0.level', 'success');
    }
}
