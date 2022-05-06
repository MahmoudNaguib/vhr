<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\DefaultData;

class AdminDashboardTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_get_index() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/dashboard')
            ->assertStatus(200);
    }

}
