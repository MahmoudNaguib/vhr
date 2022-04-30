@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    @if (!$rows->isEmpty())
        <div class="float-end">
            <b>{{ trans('app.Total')}}</b>: {{$rows->total()}} {{trans('app.records')}}
        </div>
        <div class="grid-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th class="ml-1">{{trans('app.ID')}} </th>
                    <th class="ml-2">{{trans('app.Title')}} </th>
                    <th class="ml-2">{{trans('app.Seen at')}} </th>
                    <th class="ml-2">{{trans('app.Created at')}}</th>
                    <th class="ml-3">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td data-label="#">{{$row->id}}</td>
                        <td data-label="{{trans('app.Title')}}">
                            {{$row->title}}
                        </td>
                        <td data-label="{{trans('app.Seen at')}}">
                            {{($row->seen_at)?str_limit($row->seen_at,10,false):'----'}}
                        </td>
                        <td data-label="{{trans('app.Created at')}}">
                            {{str_limit($row->created_at,10,false)}}
                        </td>
                        <td data-label="">
                            <a class="btn btn-xs" href="{{$module}}/view/{{$row->id}}" title="{{trans('app.View')}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-xs" href="{{$module}}/delete/{{$row->id}}" title="{{trans('app.Delete')}}" data-confirm="{{trans('app.Are you sure you want to delete')}}?">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $rows->render() !!}
        </div>
    @else
        {{locale("app.There is no results")}}
    @endif
@endsection
