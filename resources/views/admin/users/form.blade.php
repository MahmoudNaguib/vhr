@include('form.select',['name'=>'type','options'=>$row->getTypes(),'attributes'=>['class'=>'form-control','label'=>trans('app.Type'),'placeholder'=>trans('app.Type'),'id'=>'type','required'=>1]])


<div class="role_input" style="display: none;">
    @include('form.select',['name'=>'role_id','options'=>$row->getRoles(),'attributes'=>['class'=>'form-control','label'=>trans('app.Role'),'placeholder'=>trans('app.Role'),'id'=>'role_id','required'=>1]])
</div>

@include('form.input',['name'=>'name','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Name'),'placeholder'=>trans('app.Name'),'autocomplete'=>"off",'required'=>1]])


@include('form.input',['name'=>'email','type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Email'),'placeholder'=>trans('app.Email'),'autocomplete'=>"off",'required'=>1]])

@include('form.input',['name'=>'mobile','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Mobile'),'placeholder'=>trans('app.Mobile'),'autocomplete'=>"off",'required'=>1]])

@include('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'required'=>(@$row->id)?false:true]])

@include('form.password',['name'=>'password_confirmation','attributes'=>['class'=>'form-control','label'=>trans('app.Password confirmation'),'placeholder'=>trans('app.Password confirmation'),'required'=>(@$row->id)?false:true]])

@push('js')
    <script>
        $(function(){
            $('#type').on('change',function (){
                if($(this).val()=='admin'){
                    $('.role_input').show();
                }
                else{
                    $('#role_id').attr('required',false);
                    $('#role_id').val('');
                    $('.role_input').hide();
                }
            });
            $('.type').trigger('change');
        });
    </script>
@endpush

