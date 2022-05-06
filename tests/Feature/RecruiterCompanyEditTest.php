<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecruiterCompanyEditTest extends TestCase {

    use RefreshDatabase,
        DefaultData;

    public function test_get_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsRecruiterUser();
        $this->get('/company/edit')
            ->assertStatus(200);
    }

    public function test_post_edit() {
        dump(get_class($this) . ' ' . __FUNCTION__);
        $this->actingAsRecruiterUser();
        $factory = \App\Models\Company::factory()->make();
        $this->post( '/company/edit', $factory->toArray())
            ->assertStatus(302);
    }
}
