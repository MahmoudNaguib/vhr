@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::model($row,['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{request('token')}}">
    @include('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'autocomplete'=>"off",'required'=>1]])

    @include('form.password',['name'=>'password_confirmation','attributes'=>['class'=>'form-control','label'=>trans('app.Password confirmation'),'placeholder'=>trans('app.Password confirmation'),'autocomplete'=>"off",'required'=>1]])

    <div class="form-group mt-3">
        @include('form.submit',['label'=>trans('app.Submit')])
        <a href="auth/login">{{ trans('app.Login') }}</a>
    </div>
    {!! Form::close() !!}
@endsection

