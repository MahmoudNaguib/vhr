<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Validator;

class MessagesController extends Controller {


    public function __construct(\App\Models\Message $model) {
        $this->model = $model;
        $this->rules = $model->rules;
    }

    public function postIndex() {
        ValidateRequestApi(request()->all(), $this->rules);
        if ($row = $this->model->create(request()->all())) {
            return response()->json(['message' => trans('app.Your message has been sent')], 201);
        }
        return response()->json(['message' => trans('app.Failed to handle your request')], 400);
    }
}
