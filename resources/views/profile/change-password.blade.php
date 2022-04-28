@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::model($row,['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}

    @include('form.password',['name'=>'old_password','attributes'=>['class'=>'form-control','label'=>trans('app.Old password'),'placeholder'=>trans('app.Old password'),'required'=>1]])

    @include('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'required'=>1]])

    @include('form.password',['name'=>'password_confirmation','attributes'=>['class'=>'form-control','label'=>trans('app.Password confirmation'),'placeholder'=>trans('app.Password confirmation'),'required'=>1]])

    <div class="form-group mt-3">
        @include('form.submit',['label'=>trans('Submit')])
    </div>
    {!! Form::close() !!}
@endsection

