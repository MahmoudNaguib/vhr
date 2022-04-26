@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::open(['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{request('token')}}">
    @include('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'autocomplete'=>"off",'required'=>1]])

    @include('form.password',['name'=>'password_confirmation','attributes'=>['class'=>'form-control','label'=>trans('app.Password confirmation'),'placeholder'=>trans('app.Password confirmation'),'autocomplete'=>"off",'required'=>1]])

    <div class="form-group mt-3">
        <button class="btn btn-primary">{{ trans('app.Submit') }}</button>
        <p>
            <a href="auth/login">{{ trans('app.Login') }}</a>
        </p>
    </div>
    {!! Form::close() !!}
@endsection

