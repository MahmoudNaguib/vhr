<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\DefaultData;

class AdminUsersWithTypeRecruiterTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_index() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/users')
            ->assertStatus(200);
    }

    public function test_get_create() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $this->get($this->adminURL . '/users/create')
            ->assertStatus(200);
    }

    public function test_post_create() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $factory = \App\Models\User::factory()->make(['type'=>'recruiter','company_id'=>1,'is_company_admin'=>1]);
        $this->post($this->adminURL . '/users/create', $factory->toArray())
            ->assertStatus(302);
        $record = \App\Models\User::orderBy('id', 'desc')->first();
        $record->forceDelete();
    }

    public function test_get_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\User::factory()->create(['type'=>'recruiter','company_id'=>1,'is_company_admin'=>1]);
        $this->get($this->adminURL . '/users/edit/' . $record->id)
            ->assertStatus(200);
        $record->forceDelete();
    }

    public function test_post_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\User::factory()->create(['type'=>'recruiter','company_id'=>1,'is_company_admin'=>1]);
        $factory = \App\Models\User::factory()->make(['type'=>'recruiter','company_id'=>1,'is_company_admin'=>1]);
        $this->post($this->adminURL . '/users/edit/' . $record->id, $factory->toArray())
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_view() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\User::factory()->create(['type'=>'recruiter','company_id'=>1,'is_company_admin'=>1]);
        $this->get($this->adminURL . '/users/view/' . $record->id)
            ->assertStatus(200);
        $record->forceDelete();
    }

    public function test_get_delete() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\User::factory()->create(['type'=>'recruiter','company_id'=>1,'is_company_admin'=>1]);
        $this->get($this->adminURL . '/users/delete/' . $record->id)
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_delete_all() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\User::factory()->create(['type'=>'recruiter','company_id'=>1,'is_company_admin'=>1]);
        $this->get($this->adminURL . '/users/delete-all?ids=' . $record->id)
            ->assertStatus(302);
        $record->forceDelete();
    }

    public function test_export() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsAdmin();
        $record = \App\Models\User::factory()->create(['type'=>'recruiter','company_id'=>1,'is_company_admin'=>1]);
        $this->get($this->adminURL . '/users/export')
            ->assertStatus(200);
        $record->forceDelete();
    }

}
