<?php

namespace App\Http\Controllers;


class NotificationsController extends \App\Http\Controllers\Controller {

    public function __construct(\App\Models\Notification $model) {
        $this->module = 'notifications';
        $this->title = trans('app.Notifications');
        $this->model = $model;
    }

    public function getIndex() {
        $data['page_title'] = $this->title.' - '.trans('app.List');
        $data['module']=$this->module;
        $data['rows'] = $this->model->filterAndSort()->own()->paginate(env('PAGE_LIMIT'));
        return view($this->module . '.index', $data);
    }

}
