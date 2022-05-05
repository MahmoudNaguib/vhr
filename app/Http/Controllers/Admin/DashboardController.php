<?php

namespace App\Http\Controllers\Admin;

use Intervention\Image\Facades\Image;
use File;

class DashboardController extends \App\Http\Controllers\Controller {

    public function __construct() {
        $this->module = 'dashboard';
        $this->title = trans('app.Admin dashboard');
        $this->user=new \App\Models\User();
        $this->message=new \App\Models\Message();
        $this->company=new \App\Models\Company();
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['page_title'] = $this->title;
        $data['totalRoles'] = \App\Models\Role::count();
        $data['totalUsers'] = \App\Models\User::count();
        $data['totalPlans'] = \App\Models\Plan::count();
        $data['totalMessages'] = \App\Models\Message::count();
        $data['totalCompanies'] = \App\Models\Company::count();
        $data['users'] = $this->user->includes()->latest()->limit(5)->get();
        $data['messages'] = $this->message->latest()->limit(5)->get();
        $data['companies'] =$this->company->includes()->latest()->limit(5)->get();
        return view('admin.' . $this->module . '.index', $data);
    }

}
