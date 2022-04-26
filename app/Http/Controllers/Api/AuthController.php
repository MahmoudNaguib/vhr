<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\PushToken;
use Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class AuthController extends Controller {

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
        $this->rules = $model->rules;
        $this->loginRules = $model->loginRules;
        $this->forgotRules = $model->forgotRules;
        $this->resetRules = $model->resetRules;
    }

    public function postLogin() {
        $validator = Validator::make(request()->all(), $this->loginRules);
        if ($validator->fails()) {
            return response()->json([
                'message' => trans('api.Validation errors'),
                'errors' => transformValidation($validator->errors()->messages())
            ], 422);
        }
        $row = $this->model->where('email', request('email'))->whereNULL('role_id')->first();
        if (!$row) {
            return response()->json([
                'message' => trans('api.There is no account with this email'),
            ], 403);
        }
        if (!$row->confirmed) {
            return response()->json([
                'message' => trans('api.Account with this email is not confirmed'),
            ], 403);
        }
        if (!$row->is_active) {
            return response()->json([
                'message' => trans('api.Account with this email is banned'),
            ], 403);
        }
        if (!Hash::check(trim(request('password')), $row->password)) {
            return response()->json([
                'message' => trans('api.Trying to login with invalid password')
            ], 403);
        }
        $data = [
            'last_logged_in_at' => date("Y-m-d H:i:s"),
            'last_ip' => @$_SERVER['REMOTE_ADDR']
        ];
        if ($row->update($data)) {
            \Auth::login($row);
            request()->headers->set('Authorization', 'Bearer ' . $row->token);
            /////////////// Update Push Token
            if (request('push_token')) {
                $pushToken = \App\Models\PushToken::where('created_by', $row->id)->where('push_token', request('push_token'))->first();
                if (!$pushToken) {
                    \App\Models\PushToken::create([
                        'push_token' => request('push_token')
                    ]);
                }
            }
            /// //////////////////
            $row = $this->model->includes()->findOrFail($row->id);
            return response()->json([
                'message' => trans('api.Successfully logged in'),
                'data' => new \App\Http\Resources\UserResource($row),
            ], 200);
        }
        return response()->json(['message' => trans('api.Failed to do this action')], 400);
    }

    public function postRegister() {
        $validator = Validator::make(request()->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => trans('api.Validation errors'),
                'errors' => transformValidation($validator->errors()->messages())
            ], 422);
        }
        $token = generateToken(request('email'));
        request()->request->add([
            'confirm_token' => md5(request('email')) . RandomString(10) . md5(time()),
            'last_ip' => @$_SERVER['REMOTE_ADDR'],
            'token' => $token,
            'image' => resizeImage(public_path() . '/images/users/avatar.png', \App\Models\User::$attachFields['image']['sizes'])
        ]);
        //// if type is recruiter
        if(request('type')=='recruiter'){
            request()->request->add(['is_company_admin'=>1]);
        }
        if ($row = $this->model->create(request()->except(['password_confirmation', 'accept']))) {
            return response()->json(['message' => trans("api.Welcome to our community, We have sent you an email, Please check your inbox")], 201);
        }
        return response()->json(['message' => trans('api.Failed to do this action')], 400);
    }

    public function postForgotPassword() {
        $validator = Validator::make(request()->all(), $this->forgotRules);
        if ($validator->fails()) {
            return response()->json([
                'message' => trans('api.Validation errors'),
                'errors' => transformValidation($validator->errors()->messages())
            ], 422);
        }
        $row = $this->model->where('email', request('email'))->first();
        if (!$row) {
            return response()->json([
                'message' => trans('api.There is no account with this email'),
            ], 403);

        }
        if (!$row->confirmed) {
            return response()->json([
                'message' => trans('api.Account with this email is not confirmed')
            ], 403);

        }
        if (!$row->is_active) {
            return response()->json([
                'message' => trans('api.Account with this email is banned')
            ], 403);
        }
        $row->password_token = generateToken($row->email);
        if ($row->save()) {
            \App\Jobs\ForgotPassword::dispatch($row);
            return response()->json(['message' => trans('api.Password reset link has been sent to your email')], 200);
        }
        return response()->json(['message' => trans('api.Failed to do this action')], 400);
    }
}
