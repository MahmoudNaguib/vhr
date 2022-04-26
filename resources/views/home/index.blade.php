@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    {{trans('app.Welcome to')}} {{appName()}}
@endsection

