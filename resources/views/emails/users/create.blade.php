@extends('emails.master')

@section('title')
    {{trans("email.Confirm user account")}}
@endsection

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

    @if($row->mobile)
        <p>
            <strong>{{trans("email.Mobile")}} : </strong> {{$row->mobile_number}}
        </p>
    @endif

    @if(!$row->confirmed)
        <p>{{trans('email.To confirm your account please click the link below')}}</p>
        <a href="{{app()->make("url")->to('/')}}/auth/confirm?token={{$row->confirm_token}}">{{trans('email.Confirm')}}</a>
        </p>
    @endif

@endsection
