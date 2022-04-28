<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\PushToken;
use Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProfileController extends Controller {

    /*
     * 200: success   // Can have message
     * 201 created    //Always have message
     * 401: unauthorized  //Always have message
     * 422: Validation error   //Always have message and errors object with the field key that has error
     * 403: Forbidden //Always have message
     * 404: page not found //Always have message
     * 400: Bad Request //Always have message
     */
    public function __construct(\App\Models\User $model) {
        $this->model = $model;
        $this->editRecruiter = $model->editRecruiter;
        $this->editEmployee = $model->editEmployee;
        $this->changePassword = $model->changePassword;
    }

    public function getIndex() {
        return response()->json([
            'data' => new \App\Http\Resources\UserResource($this->model->includes()->findOrFail(auth()->user()->id))
        ], 200);
    }

    public function postEdit() {
        $row = $this->model->findOrFail(auth()->user()->id);
        ValidateRequestApi(request()->all(), ($row->type == 'recruiter') ? $this->editRecruiter : $this->editEmployee);
        if ($row->update(request()->all())) {
            return response()->json([
                'message' => trans('app.Update successfully'),
                'data' => new \App\Http\Resources\UserResource($this->model->includes()->findOrFail($row->id)),
            ], 200);
        }
        return response()->json(['message' => trans('app.Failed to handle your request')], 400);
    }
    public function postChangePassword(){
        $row = $this->model->findOrFail(auth()->user()->id);
        ValidateRequestApi(request()->all(), $this->changePassword);
        if (!\Hash::check(request('old_password'), $row->password)) {
            return response()->json(['old_password' => trans('app.Entered password is not matching your old password')], 422);
        }
        if ($row->update(request()->except(['password_confirmation','old_password']))) {
            //////////////////// Update token
            $this->model->updateToken($row);
            //////////////////////////////
            return response()->json([
                'message' => trans('app.Update successfully'),
                'data' => new \App\Http\Resources\UserResource($this->model->includes()->findOrFail(auth()->user()->id))
            ], 200);
        }
        return response()->json(['message' => trans('app.Failed to handle your request')], 400);
    }
    public function getLogout() {
        auth()->logout();
        session()->flush();
        return response()->json(['message' => trans('app.Log out successfully')], 200);
    }
}
