@extends('layouts.master')
@section('title')
    <h2>
        {{$page_title}}
        @if(can('create-'.$module))
            <a href="admin/{{$module}}/create" class="btn btn-success">
                <i class="fa fa-plus"></i> {{trans('app.Create')}}
            </a>
        @endif
        @if(can('view-'.$module))
            <a href="admin/{{$module}}/export?{{@$_SERVER['QUERY_STRING']}}" class="btn btn-secondary">
                <i class="fa fa-download"></i> {{trans('app.Export')}}
            </a>
        @endif
    </h2>
@endsection
@section('content')
    @if(can('view-'.$module))
        @include('admin.'.$module.'.partials.filters',['row'=>@$row])
        @if (!$rows->isEmpty())
            <div>
                <div class="float-end">
                    <b>{{ trans('app.Total')}}</b>: {{$rows->total()}} {{trans('app.records')}}
                </div>
                <div class="float-start">
                    <button class="btn btn-danger delete_all btn-sm mb-2"
                            href="admin/{{$module}}/delete-all"
                            data-confirm="{{trans('app.Are you sure you want to delete the selected')}}?">
                        {{trans('app.Delete selected')}}
                    </button>
                </div>
            </div>
            <div class="grid-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="ml-1"><input type="checkbox" id="master"></th>
                        <th class="ml-1">{{trans('app.ID')}} </th>
                        <th class="ml-2">{{trans('app.Title')}} </th>
                        <th class="ml-2">{{trans('app.Users count')}} </th>
                        <th class="ml-2">{{trans('app.Unlock count')}} </th>
                        <th class="ml-2">{{trans('app.Posts count')}} </th>
                        <th class="ml-2">{{trans('app.Duration in month')}} </th>
                        <th class="ml-2">{{trans('app.Price')}} </th>
                        <th class="ml-2">{{trans('app.Created at')}}</th>
                        <th class="ml-3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            <td>
                                <input type="checkbox" class="sub_chk" data-id="{{$row->id}}">
                            </td>
                            <td data-label="#">{{$row->id}}</td>
                            <td data-label="{{trans('app.Title')}}">
                                {{$row->title}}
                            </td>
                            <td data-label="{{trans('app.Users count')}}">
                                {{$row->users_count}}
                            </td>
                            <td data-label="{{trans('app.Unlock count')}}">
                                {{$row->unlock_count}}
                            </td>
                            <td data-label="{{trans('app.Posts count')}}">
                                {{$row->posts_count}}
                            </td>
                            <td data-label="{{trans('app.Duration in month')}}">
                                {{$row->duration_in_month}} {{trans('app.Months')}}
                            </td>
                            <td data-label="{{trans('app.Price')}}">
                                {{$row->price}} {{trans('app.EGP')}}
                            </td>
                            <td data-label="{{trans('app.Created at')}}">
                                {{str_limit($row->created_at,10,false)}}
                            </td>
                            <td data-label="">
                                @if(can('edit-'.$module))
                                    <a class="btn btn-xs" href="admin/{{$module}}/edit/{{$row->id}}" title="{{trans('app.Edit')}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @endif
                                @if(can('view-'.$module))
                                    <a class="btn btn-xs" href="admin/{{$module}}/view/{{$row->id}}" title="{{trans('app.View')}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                                @if(can('delete-'.$module))
                                    <a class="btn btn-xs" href="admin/{{$module}}/delete/{{$row->id}}" title="{{trans('app.Delete')}}"
                                       data-confirm="{{trans('app.Are you sure you want to delete')}}?">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!! $rows->appends(['title'=>request('title')])->links() !!}
            </div>
        @else
            {{trans("app.There is no results")}}
        @endif
    @endif
@endsection

