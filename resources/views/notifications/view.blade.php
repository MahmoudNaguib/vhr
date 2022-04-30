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
                <td>{{trans('app.Content')}}</td>
                <td>{!!$row->content!!}</td>
            </tr>
            <tr>
                <td>{{trans('app.Seen at')}}</td>
                <td>{{@$row->seen_at}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Created at')}}</td>
                <td>{{@$row->created_at}}</td>
            </tr>
        </table>
    </div>
@endsection

