@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::model($row,['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}
    @include('recruiter.'.$module.'.form',$row)
    <div class="form-group mt-3">
        @include('form.submit',['label'=>trans('Submit')])
    </div>
    {!! Form::close() !!}
@endsection

