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
                <td>{{trans('app.Industry')}}</td>
                <td>{{$row->industry->title}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Country')}}</td>
                <td>{{$row->country->title}}</td>
            </tr>
            <tr>
                <td>{{trans('app.City')}}</td>
                <td>{{$row->city}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Address')}}</td>
                <td>{{$row->address}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Commercial registry')}}</td>
                <td>{!! fileRender($row->commercial_registry) !!}</td>
            </tr>
            <tr>
                <td>{{trans('app.Tax ID card')}}</td>
                <td>{!! fileRender($row->tax_id_card) !!}</td>
            </tr>
            <tr>
                <td>{{trans('app.Website')}}</td>
                <td>{{$row->website}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Linkedin')}}</td>
                <td>{{$row->linkedin}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Facebook')}}</td>
                <td>{{$row->facebook}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Instagram')}}</td>
                <td>{{$row->instagram}}</td>
            </tr>
            <tr>
                <td>{{trans('app.Image')}}</td>
                <td>{!! image($row->image,'small',['width'=>50]) !!}</td>
            </tr>
            <tr>
                <td>{{trans('app.Created at')}}</td>
                <td>{{@$row->created_at}}</td>
            </tr>
        </table>
    </div>
@endsection

