<?php

namespace App\Http\Controllers;


class CompanyController extends \App\Http\Controllers\Controller {

    public function __construct(\App\Models\Company $model) {
        $this->module = 'company';
        $this->model = $model;
        $this->edit = $model->edit;
    }

    public function getEdit() {
        $data['page_title'] = trans('app.Edit company profile');
        $data['row']=\App\Models\Company::where('user_id',auth()->user()->id)->first();
        if(!$data['row']){
            $data['row'] =\App\Models\Company::create(['user_id'=>auth()->user()->id]);
        }
        return view($this->module . '.edit', $data);
    }

    public function postEdit() {
        $row=\App\Models\Company::where('user_id',auth()->user()->id)->first();
        if($row->commercial_registry){
            $this->edit['commercial_registry']='nullable|max:4000';
        }
        if($row->tax_id_card){
            $this->edit['tax_id_card']='nullable|max:4000';
        }
        $this->validate(request(), $this->edit);
        if ($row->update(request()->all())) {
            \App\Models\User::where('id',auth()->user()->id)->update(['completed_profile'=>1]);
            flash()->success(trans('app.Update successfully'));
            return back();
        }
        flash()->error(trans('app.Failed to handle your request'));
        return back();
    }
}
