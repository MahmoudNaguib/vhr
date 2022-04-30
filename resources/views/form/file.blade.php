<div class="row form-group mt-3">
    <label class="col-sm-3 form-control-label">
        {{ @$attributes['label'] }}
        <span class="text-danger">
            {{ (@$attributes['required'])?'*':'' }}
        </span>
    </label>
    <div class="col-sm-9">
        <div class="custom-file">
            {!! Form::file($name,$attributes)!!}
            @if(!$errors->isEmpty())
                @foreach($errors->get($name) as $message)
                <span class='help-inline text-danger'>{{ $message }}</span>
                @endforeach
                <br>
            @endif
            @php
                $value=(@$attributes['value'])?:$row->$name;
            @endphp
            <span class="preview">
                 @if(@$attributes['file_type'] == 'attachment')
                    {!! fileRender($value) !!}
                 @else
                 {!! image($value,'small',['width'=>50]) !!}
                 @endif
            </span>
        </div>
    </div>
</div>
