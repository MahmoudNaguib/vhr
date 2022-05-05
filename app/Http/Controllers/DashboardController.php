<?php

namespace App\Http\Controllers;


class DashboardController extends \App\Http\Controllers\Controller {

    public function __construct() {
        $this->module = 'dashboard';
    }

    public function getIndex() {
        $data['page_title'] = trans('app.Dashboard');
        return view($this->module . '.index', $data);
    }
}
