<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\DefaultData;

class AdminContactMessagesTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_index() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/messages')
            ->assertStatus(200);
    }

    public function test_view() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Message::factory()->create();
        $this->get($this->adminURL . '/messages/view/' . $record->id)
            ->assertStatus(200);
        $record->forceDelete();
    }

    public function test_get_delete() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $record = \App\Models\Message::factory()->create();
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/messages/delete/' . $record->id)
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_delete_all() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $record = \App\Models\Message::factory()->create();
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/messages/delete-all?ids=' . $record->id)
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_export() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Message::factory()->create();
        $this->get($this->adminURL . '/messages/export')
            ->assertStatus(200);
        $record->forceDelete();
    }

}
