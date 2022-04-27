@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::model($row,['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}
    @include('form.input',['name'=>'email','type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Email'),'placeholder'=>trans('app.Email'),'autocomplete'=>"off",'required'=>1]])

    <div class="form-group mt-3">
        @include('form.submit',['label'=>trans('Submit')])
        <a href="auth/login">{{ trans('app.Login') }}</a> |
        <a href="auth/register">{{ trans('app.Register') }}</a>
    </div>
    {!! Form::close() !!}
@endsection

