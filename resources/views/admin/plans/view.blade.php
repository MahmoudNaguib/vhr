@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    <div class="single-row mt-3">
        <table class="table table-striped float-start">
            <tr>
                <td>{{trans('app.Title')}}</td>
                <td>{{$row->title}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Users count')}}</td>
                <td>{{$row->users_count}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Unlock count')}}</td>
                <td>{{$row->unlock_count}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Posts count')}}</td>
                <td>{{$row->posts_count}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Duration in month')}}</td>
                <td>{{$row->duration_in_month}} {{trans('app.Months')}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Price')}}</td>
                <td>{{$row->price}} {{trans('app.EGP')}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Created at')}}</td>
                <td>{{@$row->created_at}}</td>
            </tr>
        </table>
    </div>
@endsection

