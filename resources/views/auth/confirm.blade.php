@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    <div class="alert alert-{{$type}}" role="alert">
        {{$message}}
    </div>
@endsection

