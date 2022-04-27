@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::model($row,['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}

    @include('form.select',['name'=>'type','options'=>$row->getTypes(),'attributes'=>['class'=>'form-control','label'=>trans('app.Type'),'placeholder'=>trans('app.Type'),'required'=>1]])

    @include('form.input',['name'=>'name','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Name'),'placeholder'=>trans('app.Name'),'autocomplete'=>"off",'required'=>1]])

    @include('form.input',['name'=>'email','type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Email'),'placeholder'=>trans('app.Email'),'autocomplete'=>"off",'required'=>1]])

    @include('form.input',['name'=>'mobile','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Mobile'),'placeholder'=>trans('app.Mobile'),'autocomplete'=>"off",'required'=>1]])

    @include('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'required'=>1]])

    @include('form.password',['name'=>'password_confirmation','attributes'=>['class'=>'form-control','label'=>trans('app.Password confirmation'),'placeholder'=>trans('app.Password confirmation'),'required'=>1]])

    <div class="form-group mt-3">
        @include('form.submit',['label'=>trans('Submit')])
        <a href="auth/forgot-password">{{ trans('app.Forgot password') }}</a> |
        <a href="auth/register">{{ trans('app.Register') }}</a>
    </div>
    {!! Form::close() !!}
@endsection

