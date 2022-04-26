@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::model($row,['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}
    @include('form.select',['name'=>'gender','options'=>$row->getGenders(),'attributes'=>['class'=>'form-control','label'=>trans('app.Gender'),'placeholder'=>trans('app.Gender'),'required'=>1]])

    @include('form.input',['name'=>'name','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Name'),'placeholder'=>trans('app.Name'),'autocomplete'=>"off",'required'=>1]])

    @include('form.input',['name'=>'mobile','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Mobile'),'placeholder'=>trans('app.Mobile'),'autocomplete'=>"off",'required'=>1]])

    @include('form.select',['name'=>'country_id','options'=>$row->getCountries(),'attributes'=>['class'=>'form-control select2','label'=>trans('app.Country'),'placeholder'=>trans('app.Country'),'required'=>1]])

    @include('form.input',['name'=>'city','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.City'),'placeholder'=>trans('app.City'),'autocomplete'=>"off",'required'=>1]])

    @include('form.input',['name'=>'national_id','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.National ID'),'placeholder'=>trans('app.National ID'),'autocomplete'=>"off",'required'=>1]])

   {{-- @include('form.input',['name'=>'birth_date','type'=>'text','attributes'=>['class'=>'form-control datepicker','label'=>trans('app.Birth date'),'placeholder'=>trans('app.Birth date'),'autocomplete'=>"off",'required'=>1]])--}}

    @include('form.file',['name'=>'image','attributes'=>['class'=>'form-control custom-file-input','label'=>trans('app.Image'),'placeholder'=>trans('app.Image')]])

    <div class="form-group mt-3">
        <button class="btn btn-primary btn-block ">{{ trans('app.Submit') }}</button>
    </div>
    {!! Form::close() !!}
@endsection

