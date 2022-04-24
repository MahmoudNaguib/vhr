@extends('emails.master')
@section('title'){{trans("email.Forgot password")}}@endsection
@section('content')
    <p>{{trans("email.Welcome")}} <strong>{{$row->name}}</strong></p>
    <p>{{trans("email.Thanks for joining us at")}} {{ appName() }}</p>
    <p>
        {{trans("email.Here is your account details")}}
    </p>

    @if($row->name)
        <p>
            <strong>{{trans("email.Name")}} : </strong> {{$row->name}}
        </p>
    @endif

    @if($row->email)
        <p>
            <strong>{{trans("email.Email")}} : </strong> {{$row->email}}
        </p>
    @endif

    <p>
        {{trans('email.Click the below link to reset password')}}
    </p>
    <p>
        @if($row->role_id)
            <a href="{{app()->make("url")->to('/')}}/{{lang()}}/admin/auth/reset-password?token={{$row->password_token}}">{{trans('email.Reset password')}}</a>
        @else
            <a href="{{env('BASE_URL')}}/{{lang()}}/auth/reset-password?token={{$row->password_token}}">{{trans('email.Reset password')}}</a>
        @endif
    </p>

@endsection
