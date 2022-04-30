@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    @include('dashboard.'.auth()->user()->type)
@endsection
