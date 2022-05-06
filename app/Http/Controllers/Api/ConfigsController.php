<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Validator;

class ConfigsController extends Controller {


    public function __construct(\App\Models\Config $model) {
        $this->model = $model;
    }

    public function getIndex() {
        $rows = getConfigsPairs();
        return response()->json(['data' => $rows], 200);
    }
}
