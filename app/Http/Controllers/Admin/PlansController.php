<?php

namespace App\Http\Controllers\Admin;

class PlansController extends \App\Http\Controllers\Controller {

    public function __construct(\App\Models\Plan $model) {
        $this->module = 'plans';
        $this->title = trans('app.Plans');
        $this->model = $model;
        $this->rules = $model->rules;
    }

    public function getIndex() {
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.List') . " " . $this->title;
        $data['rows'] = $this->model->filterAndSort()->paginate(env('PAGE_LIMIT'));
        $data['row'] = $this->model;
        return view('admin.' . $this->module . '.index', $data);
    }

    public function getCreate() {
        authorize('create-' . $this->module);
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.Create') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => 'admin/' . $this->module];
        $data['row'] = $this->model;
        return view('admin.' . $this->module . '.create', $data);
    }

    public function postCreate() {
        authorize('create-' . $this->module);
        $this->validate(request(), $this->rules);
        if ($row = $this->model->create(request()->except(['parents']))) {
            flash()->success(trans('app.Created successfully'));
            return redirect('admin/' . $this->module);
        }
        flash()->error(trans('app.Failed to handle your request'));
    }

    public function getEdit($id) {
        authorize('edit-' . $this->module);
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.Edit') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => 'admin/' . $this->module];
        $data['row'] = $this->model->findOrFail($id);
        return view('admin.' . $this->module . '.edit', $data);
    }

    public function postEdit($id) {
        authorize('edit-' . $this->module);
        $row = $this->model->findOrFail($id);
        $this->validate(request(), $this->rules);
        if ($row->update(request()->all())) {
            flash(trans('app.Update successfully'))->success();
            return back();
        }
    }

    public function getView($id) {
        authorize('view-' . $this->module);
        $data['module'] = $this->module;
        $data['page_title'] = trans('app.View') . " " . $this->title;
        $data['breadcrumb'] = [$this->title => 'admin/' . $this->module];
        $data['row'] = $this->model->findOrFail($id);
        return view('admin.' . $this->module . '.view', $data);
    }

    public function getDeleteAll() {
        authorize('delete-' . $this->module);
        $rows = $this->model->whereIn('id', explode(',', request('ids')))->get();
        if ($rows) {
            foreach ($rows as $row) {
                $row->delete();
            }
        }
        flash()->success(trans('app.Deleted successfully'));
        return back();
    }

    public function getDelete($id) {
        authorize('delete-' . $this->module);
        $row = $this->model->findOrFail($id);
        $row->delete();
        flash()->success(trans('app.Deleted successfully'));
        return back();
    }

    public function getExport() {
        authorize('view-' . $this->module);
        $rows = $this->model->filterAndSort()->get();
        if ($rows->isEmpty()) {
            flash()->error(trans('app.There is no results to export'));
            return back();
        }
        return $this->model->export($rows, $this->module);
    }

}
