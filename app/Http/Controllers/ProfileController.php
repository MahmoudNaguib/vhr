<?php

namespace App\Http\Controllers;


class ProfileController extends \App\Http\Controllers\Controller {

    public function __construct(\App\Models\User $model) {
        $this->module = 'profile';
        $this->model = $model;
        $this->editRecruiter = $model->editRecruiter;
        $this->editEmployee = $model->editEmployee;
        $this->changePassword = $model->changePassword;
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
        $this->validate(request(), ($row->type=='recruiter')?$this->editRecruiter:$this->editEmployee);
        if ($row->update(request()->all())) {
            flash()->success(trans('app.Update successfully'));
            return back();
        }
        flash()->error(trans('app.Failed to handle your request'));
        return back();
    }

    public function getChangePassword() {
        $data['row'] = $this->model->findOrFail(auth()->user()->id);
        $data['page_title'] = trans('app.Change password');
        return view($this->module . '.change-password', $data);
    }

    public function postChangePassword(){
        $row = $this->model->findOrFail(auth()->user()->id);
        $this->validate(request(), $this->changePassword);
        if (!\Hash::check(request('old_password'), $row->password)) {
            flash()->error(trans('app.Entered password is not matching your old password'));
            return back();
        }
        if ($row->update(request()->except(['password_confirmation','old_password']))) {
            flash(trans('app.Update successfully'))->success();
            return back();
        }
        flash()->error(trans('app.Failed to handle your request'));
        return back();
    }

    public function getLogout() {
        auth()->logout();
        session()->flush();
        return redirect('auth/login');
    }
}
