<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;

trait DefaultData {
    public $adminUser;

    public function setup(): void {
        parent::setup();
        $this->seed(DatabaseSeeder::class);
        $this->adminURL='admin';
        $this->apiURL='api';
        $this->adminUser = \App\Models\User::find(1);
        $this->recruiterUser = \App\Models\User::where('type', '=', 'recruiter')->first();
        $this->employeeUser = \App\Models\User::where('type', '=', 'employee')->first();
    }

    public function actingAsAdmin() {
        $this->actingAs($this->adminUser);
    }

    public function actingAsRecruiterUser() {
        $this->actingAs($this->recruiterUser);
    }

    public function actingAsEmployeeUser() {
        $this->actingAs($this->employeeUser);
    }

    public function actingAsRecruiterUserApi() {
        $this->actingAs($this->recruiterUser)->withHeaders(['Authorization' => $this->recruiterUser->token]);
    }

    public function actingAsEmployeeUserApi() {
        $this->actingAs($this->employeeUser)->withHeaders(['Authorization' => $this->employeeUser->token]);
    }

}
