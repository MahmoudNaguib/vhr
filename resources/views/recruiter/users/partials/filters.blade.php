<div class="mt-2 mb-3">
    {!! Form::open(['method' => 'get'] ) !!}
    <label class="section-title">{{ trans('app.Filter by')}}</label>
    <div class="row">
        <div class="col-lg-4 col-md-6 mt-2">
            {!! Form::text('name',@request('name'),['class'=>'form-control','placeholder'=>trans('app.Name')]) !!}
        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            {!! Form::text('email',@request('email'),['class'=>'form-control','placeholder'=>trans('app.Email')]) !!}
        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            {!! Form::text('mobile',@request('mobile'),['class'=>'form-control','placeholder'=>trans('app.Mobile')]) !!}
        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            <button class="btn btn-primary col-lg-5 col-md-5 mg-b-10">{{ trans('app.Filter') }}</button>
            <a href="recruiter/{{$module}}" class="btn btn-primary col-lg-5 col-md-5 mg-b-10">{{ trans('app.Reset') }}</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
