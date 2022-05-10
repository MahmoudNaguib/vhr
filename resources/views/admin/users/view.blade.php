@extends('layouts.master')
@section('title')
    <h2>{{$page_title}}</h2>
@endsection
@section('content')
    <div class="single-row mt-3">
        <table class="table table-striped float-start">
            <tr>
                <td>{{trans('app.Type')}}</td>
                <td>{{$row->type}}</td>
            </tr>
            @if($row->type=='admin' && @$row->role_id)
                <tr>
                    <td>{{trans('app.Role')}}</td>
                    <td>{{$row->role->title}}</td>
                </tr>
            @endif
            @if($row->type=='recruiter' && @$row->company_id)
                <tr>
                    <td>{{trans('app.Company')}}</td>
                    <td>{{$row->company->title}}</td>
                </tr>
                <tr>
                    <td>{{trans('app.Is company admin')}}</td>
                    <td>{{($row->is_company_admin)?trans('app.Yes'):trans('app.No')}}</td>
                </tr>
                <tr>
                    <td>{{trans('app.Is verified')}}</td>
                    <td>{{(@$row->is_verified)?trans('app.Yes'):app('app.No')}}</td>
                </tr>
            @endif
            <tr>
                <td>{{trans('app.Name')}}</td>
                <td>{{$row->name}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Email')}}</td>
                <td>{{$row->email}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Mobile')}}</td>
                <td>{{$row->mobile}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Created at')}}</td>
                <td>{{@$row->created_at}}</td>
            </tr>
        </table>
    </div>
@endsection

