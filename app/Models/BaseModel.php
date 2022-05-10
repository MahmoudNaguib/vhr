<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model {
    use SoftDeletes,
        HasFactory;

    public $timestamps = false;

    public function getCountries() {
        return \App\Models\Country::pluck('title', 'id');
    }

    public function getIndustries() {
        return \App\Models\Industry::pluck('title', 'id');
    }

    public function getPlans() {
        return \App\Models\Plan::pluck('title', 'id');
    }
}
