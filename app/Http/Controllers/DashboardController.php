<?php

namespace App\Http\Controllers;


class DashboardController extends \App\Http\Controllers\Controller {

    public function __construct(\App\Models\User $model) {
        $this->module = 'dashboard';
        $this->model = $model;
    }

    public function getIndex() {
        $data['page_title'] = trans('app.Dashboard');
        return view($this->module . '.index', $data);
    }
}
