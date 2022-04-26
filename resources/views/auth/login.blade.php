@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::open(['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}
    @include('form.input',['name'=>'email','type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Email'),'placeholder'=>trans('app.Email'),'autocomplete'=>"off",'required'=>1]])

    @include('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'required'=>1]])

    <div class="form-group">
        <label class="ckbox">
            <input type="checkbox" name="remember_me"><span> {{trans('app.Remember me')}}</span>
        </label>
    </div>
    <div class="form-group mt-3">
        <button class="btn btn-primary">{{ trans('app.Submit') }}</button>
        <p>
            <a href="auth/forgot-password">{{ trans('app.Forgot password') }}</a>
        </p>
    </div>

    {!! Form::close() !!}
@endsection

