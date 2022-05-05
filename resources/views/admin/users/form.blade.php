@include('form.select',['name'=>'type','options'=>$row->getTypes(),'attributes'=>['class'=>'form-control','label'=>trans('app.Type'),'placeholder'=>trans('app.Type'),'id'=>'type','required'=>1]])


<div class="admin_inputs" style="display: none;">
    @include('form.select',['name'=>'role_id','options'=>$row->getRoles(),'attributes'=>['class'=>'form-control','label'=>trans('app.Role'),'placeholder'=>trans('app.Role'),'id'=>'role_id','required'=>1]])
</div>

<div class="recruiter_inputs" style="display: none;">
    @include('form.select',['name'=>'company_id','options'=>$row->getCompanies(),'attributes'=>['class'=>'form-control','label'=>trans('app.Company'),'placeholder'=>trans('app.Company'),'id'=>'company_id','required'=>1]])
    @include('form.select',['name'=>'is_company_admin','options'=>['1'=>trans('app.Yes'),'0'=>trans('app.No')],'attributes'=>['class'=>'form-control','label'=>trans('app.Is company admin'),'placeholder'=>trans('app.Is company admin'),'id'=>'is_company_admin']])
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
                    $('.admin_inputs').show();
                }
                else{
                    $('#role_id').attr('required',false);
                    $('#role_id').val('');
                    $('.admin_inputs').hide();
                }
                if($(this).val()=='recruiter'){
                    $('.recruiter_inputs').show();
                }
                else{
                    $('#company_id').attr('required',false);
                    $('#company_id').val('');
                    $('#is_company_admin').val(0);
                    $('.recruiter_inputs').hide();
                }
            });
            $('#type').trigger('change');
        });
    </script>
@endpush

