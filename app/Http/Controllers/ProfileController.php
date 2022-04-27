<?php

namespace App\Http\Controllers;


class ProfileController extends \App\Http\Controllers\Controller {

    public function __construct(\App\Models\User $model) {
        $this->module = 'profile';
        $this->model = $model;
        $this->edit = $model->edit;
    }

    public function getIndex() {
        $data['page_title'] = trans('app.Dashboard');
        return view($this->module . '.index', $data);
    }

    public function getEdit() {
        $data['page_title'] = trans('app.Edit account');
        $data['row'] = $this->model->findOrFail(auth()->user()->id);
        return view($this->module . '.edit', $data);
    }

    public function postEdit() {
        $row = $this->model->findOrFail(auth()->user()->id);
        $this->validate(request(), $this->edit);
        if ($row->update(request()->all())) {
            $row->completed_profile=1;
            $row->save();
            flash()->success(trans('app.Update successfully'));
            return back();
        }
        flash(trans('app.Failed to save'))->error();
        return back();
    }

    public function getLogout() {
        auth()->logout();
        session()->flush();
        return redirect('/auth/login');
    }
}
