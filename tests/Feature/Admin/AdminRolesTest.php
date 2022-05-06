<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\DefaultData;

class AdminRolesTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_index() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/roles')
            ->assertStatus(200);
    }

    public function test_get_create() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/roles/create')
            ->assertStatus(200);
    }

    public function test_post_create() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $factory = \App\Models\Role::factory()->make();
        $this->post($this->adminURL . '/roles/create', $factory->toArray())
            ->assertStatus(302);
        $record = \App\Models\Role::orderBy('id', 'desc')->first();
        $record->forceDelete();
    }

    public function test_get_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Role::factory()->create();
        $this->get($this->adminURL . '/roles/edit/' . $record->id)
            ->assertStatus(200);
        $record->forceDelete();
    }

    public function test_post_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Role::factory()->create();
        $factory = \App\Models\Role::factory()->make();
        $this->post($this->adminURL . '/roles/edit/' . $record->id, $factory->toArray())
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_view() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Role::factory()->create();
        $this->get($this->adminURL . '/roles/view/' . $record->id)
            ->assertStatus(200);
        $record->forceDelete();
    }

    public function test_get_delete() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Role::factory()->create();
        $this->get($this->adminURL . '/roles/delete/' . $record->id)
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_delete_all() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Role::factory()->create();
        $this->get($this->adminURL . '/roles/delete-all?ids=' . $record->id)
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_export() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Role::factory()->create();
        $this->get($this->adminURL . '/roles/export')
            ->assertStatus(200);
        $record->forceDelete();
    }

}
