<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\DefaultData;

class AdminCompaniesTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_index() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/companies')
            ->assertStatus(200);
    }

    public function test_get_create() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/companies/create')
            ->assertStatus(200);
    }

    public function test_post_create() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $factory = \App\Models\Company::factory()->make();
        $this->post($this->adminURL . '/companies/create', $factory->toArray())
            ->assertStatus(302);
        $record = \App\Models\Company::orderBy('id', 'desc')->first();
        $record->forceDelete();
    }

    public function test_get_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Company::factory()->create();
        $this->get($this->adminURL . '/companies/edit/' . $record->id)
            ->assertStatus(200);
        $record->forceDelete();
    }

    public function test_post_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Company::factory()->create();
        $factory = \App\Models\Company::factory()->make();
        $this->post($this->adminURL . '/companies/edit/' . $record->id, $factory->toArray())
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_view() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Company::factory()->create();
        $this->get($this->adminURL . '/companies/view/' . $record->id)
            ->assertStatus(200);
        $record->forceDelete();
    }

    public function test_get_delete() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Company::factory()->create();
        $this->get($this->adminURL . '/companies/delete/' . $record->id)
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_delete_all() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Company::factory()->create();
        $this->get($this->adminURL . '/companies/delete-all?ids=' . $record->id)
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_export() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\Company::factory()->create();
        $this->get($this->adminURL . '/companies/export')
            ->assertStatus(200);
        $record->forceDelete();
    }

}
