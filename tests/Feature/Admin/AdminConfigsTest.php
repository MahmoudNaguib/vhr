<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\DefaultData;

class AdminConfigsTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_get_index() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/configs')
            ->assertStatus(200);
    }

    public function test_post_index() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Config::first();
        $this->post($this->adminURL . '/configs', [$record->field => $record->value])
            ->assertStatus(302);
    }
}
