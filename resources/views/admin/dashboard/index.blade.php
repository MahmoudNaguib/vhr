@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-award"></i> {{@$totalRoles}} </h2>
            <div class="text-center">
                {{ trans('app.Roles')}}
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-users"></i> {{@$totalUsers}} </h2>
            <div class="text-center">
                {{ trans('app.Users')}}
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-bars"></i> {{@$totalPlans}} </h2>
            <div class="text-center">
                {{ trans('app.Plans')}}
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-envelope"></i> {{@$totalMessages}} </h2>
            <div class="text-center">
                {{ trans('app.Contact messages')}}
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-database"></i> {{@$totalCompanies}} </h2>
            <div class="text-center">
                {{ trans('app.Companies')}}
            </div>
        </div>
    </div>
    <div class="row">
        @if(can('view-users'))
            <h4>
                {{trans('app.Latest')}} {{trans('app.Users')}}
                <span class="fs-6">
                        <a href="admin/users">
                            {{trans('app.View all')}}
                        </a>
                    </span>
            </h4>
            <div class="grid-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="ml-1">{{trans('app.ID')}} </th>
                        <th class="ml-2">{{trans('app.Type')}} </th>
                        <th class="ml-2">{{trans('app.Name')}} </th>
                        <th class="ml-2">{{trans('app.Email')}} </th>
                        <th class="ml-2">{{trans('app.Mobile')}} </th>
                        <th class="ml-2">{{trans('app.Created at')}}</th>
                        <th class="ml-3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!@$users->isEmpty())
                        @foreach($users as $row)
                            <tr>
                                <td data-label="#">{{$row->id}}</td>
                                <td data-label="{{trans('app.Type')}}">
                                    {{$row->type}}
                                </td>
                                <td data-label="{{trans('app.Name')}}">
                                    {{$row->name}}
                                </td>
                                <td data-label="{{trans('app.Email')}}">
                                    {{$row->email}}
                                </td>
                                <td data-label="{{trans('app.Mobile')}}">
                                    {{$row->mobile}}
                                </td>
                                <td data-label="{{trans('app.Created at')}}">
                                    {{str_limit($row->created_at,10,false)}}
                                </td>
                                <td data-label="">
                                    @if(can('view-'.$module))
                                        <a class="btn btn-xs" href="admin/users/view/{{$row->id}}" title="{{trans('app.View')}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        @endif
        @if(can('view-messages'))
            <h4>
                {{trans('app.Latest')}} {{trans('app.Messages')}}
                <span class="fs-6">
                        <a href="admin/messages">
                            {{trans('app.View all')}}
                        </a>
                    </span>
            </h4>
            <div class="grid-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="ml-1">{{trans('app.ID')}} </th>
                        <th class="ml-2">{{trans('app.Name')}} </th>
                        <th class="ml-2">{{trans('app.Email')}} </th>
                        <th class="ml-2">{{trans('app.Mobile')}} </th>
                        <th class="ml-2">{{trans('app.Created at')}}</th>
                        <th class="ml-3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!@$messages->isEmpty())
                        @foreach($messages as $row)
                            <tr>
                                <td data-label="#">{{$row->id}}</td>
                                <td data-label="{{trans('app.Name')}}">
                                    {{$row->name}}
                                </td>
                                <td data-label="{{trans('app.Email')}}">
                                    {{$row->email}}
                                </td>
                                <td data-label="{{trans('app.Mobile')}}">
                                    {{$row->mobile}}
                                </td>
                                <td data-label="{{trans('app.Created at')}}">
                                    {{str_limit($row->created_at,10,false)}}
                                </td>
                                <td data-label="">
                                    @if(can('view-'.$module))
                                        <a class="btn btn-xs" href="admin/messages/view/{{$row->id}}" title="{{trans('app.View')}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        @endif
        @if(can('view-companies'))
            <h4>
                {{trans('app.Latest')}} {{trans('app.Companies')}}
                <span class="fs-6">
                        <a href="admin/companies">
                            {{trans('app.View all')}}
                        </a>
                    </span>
            </h4>
            <div class="grid-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="ml-1">{{trans('app.ID')}} </th>
                        <th class="ml-2">{{trans('app.Title')}} </th>
                        <th class="ml-2">{{trans('app.Industry')}} </th>
                        <th class="ml-2">{{trans('app.Country')}} </th>
                        <th class="ml-2">{{trans('app.Created at')}}</th>
                        <th class="ml-3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!@$companies->isEmpty())
                        @foreach($companies as $row)
                            <tr>
                                <td data-label="#">{{$row->id}}</td>
                                <td data-label="{{trans('app.Title')}}">
                                    {{$row->title}}
                                </td>
                                <td data-label="{{trans('app.Industry')}}">
                                    {{$row->industry->title}}
                                </td>
                                <td data-label="{{trans('app.Country')}}">
                                    {{$row->country->title}}
                                </td>
                                <td data-label="{{trans('app.Created at')}}">
                                    {{str_limit($row->created_at,10,false)}}
                                </td>
                                <td data-label="">
                                    @if(can('view-'.$module))
                                        <a class="btn btn-xs" href="admin/companies/view/{{$row->id}}" title="{{trans('app.View')}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

