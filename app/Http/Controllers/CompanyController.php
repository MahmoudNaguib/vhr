<?php

namespace App\Http\Controllers;


class CompanyController extends \App\Http\Controllers\Controller {

    public function __construct(\App\Models\Company $model) {
        $this->module = 'company';
        $this->model = $model;
        $this->rules = $model->rules;
    }

    public function getEdit() {
        $data['page_title'] = trans('app.Edit company profile');
        if(!auth()->user()->company_id){
            $company=\App\Models\Company::create(['title'=>'Company name']);
            if($company){
                \App\Models\User::where('id',auth()->user()->id)->update([
                    'company_id'=>$company->id,
                    'is_company_admin'=>1
                ]);
            }
        }
        $user=\App\Models\User::find(auth()->user()->id);
        $data['row']=\App\Models\Company::where('id',$user->company_id)->first();
        return view($this->module . '.edit', $data);
    }

    public function postEdit() {
        $user=\App\Models\User::find(auth()->user()->id);
        $row=\App\Models\Company::where('id',$user->company_id)->first();
        if($row->commercial_registry){
            $this->rules['commercial_registry']='nullable|max:4000';
        }
        if($row->tax_id_card){
            $this->rules['tax_id_card']='nullable|max:4000';
        }
        $this->validate(request(), $this->rules);
        if ($row->update(request()->all())) {
            \App\Models\User::where('id',auth()->user()->id)->update(['completed_profile'=>1]);
            flash()->success(trans('app.Update successfully'));
            return back();
        }
        flash()->error(trans('app.Failed to handle your request'));
        return back();
    }
}
