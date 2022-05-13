@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {!! Form::model($row,['method' => 'post','files' => true] ) !!}
    {{ csrf_field() }}

    @include('form.input',['name'=>'title','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Title'),'placeholder'=>trans('app.Title'),'autocomplete'=>"off",'required'=>1]])

    @include('form.select',['name'=>'industry_id','options'=>$row->getIndustries(),'attributes'=>['class'=>'form-control','label'=>trans('app.Industry'),'placeholder'=>trans('app.Industry'),'required'=>1]])

    @include('form.select',['name'=>'country_id','options'=>$row->getCountries(),'attributes'=>['class'=>'form-control','label'=>trans('app.Country'),'placeholder'=>trans('app.Country'),'required'=>1]])

    @include('form.input',['name'=>'city','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.City'),'placeholder'=>trans('app.City'),'autocomplete'=>"off",'required'=>1]])

    @include('form.input',['name'=>'address','type'=>'textarea','attributes'=>['class'=>'form-control ','label'=>trans('app.Address'),'placeholder'=>trans('app.Address'),'required'=>1]])

    @include('form.file',['name'=>'commercial_registry','attributes'=>['class'=>'form-control','file_type'=>'attachment','label'=>trans('app.Commercial registry'),'placeholder'=>trans('app.Commercial registry'),'required'=>($row->commercial_registry)?false:true]])

    @include('form.file',['name'=>'tax_id_card','attributes'=>['class'=>'form-control','file_type'=>'attachment','label'=>trans('app.Tax ID card'),'placeholder'=>trans('app.Tax ID card'),'required'=>($row->tax_id_card)?false:true]])

    @include('form.input',['name'=>'website','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Website'),'placeholder'=>trans('app.Website'),'autocomplete'=>"off"]])

    @include('form.input',['name'=>'linkedin','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Linkedin'),'placeholder'=>trans('app.Linkedin'),'autocomplete'=>"off"]])

    @include('form.input',['name'=>'facebook','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.facebook'),'placeholder'=>trans('app.facebook'),'autocomplete'=>"off"]])

    @include('form.input',['name'=>'instagram','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Instagram'),'placeholder'=>trans('app.Instagram'),'autocomplete'=>"off"]])

    @include('form.file',['name'=>'image','attributes'=>['class'=>'form-control custom-file-input','label'=>trans('app.Image'),'placeholder'=>trans('app.Image')]])

    <div class="form-group mt-3">
        @include('form.submit',['label'=>trans('app.Submit')])
    </div>
    {!! Form::close() !!}
@endsection

