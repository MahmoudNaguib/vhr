<?php echo $__env->make('form.select',['name'=>'type','options'=>$row->getTypes(),'attributes'=>['class'=>'form-control','label'=>trans('app.Type'),'placeholder'=>trans('app.Type'),'id'=>'type','required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="admin_inputs" style="display: none;">
    <?php echo $__env->make('form.select',['name'=>'role_id','options'=>$row->getRoles(),'attributes'=>['class'=>'form-control','label'=>trans('app.Role'),'placeholder'=>trans('app.Role'),'id'=>'role_id','required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<div class="recruiter_inputs" style="display: none;">
    <?php echo $__env->make('form.select',['name'=>'company_id','options'=>$row->getCompanies(),'attributes'=>['class'=>'form-control','label'=>trans('app.Company'),'placeholder'=>trans('app.Company'),'id'=>'company_id','required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('form.select',['name'=>'is_company_admin','options'=>['1'=>trans('app.Yes'),'0'=>trans('app.No')],'attributes'=>['class'=>'form-control','label'=>trans('app.Is company admin'),'placeholder'=>trans('app.Is company admin'),'id'=>'is_company_admin']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo $__env->make('form.input',['name'=>'name','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Name'),'placeholder'=>trans('app.Name'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('form.input',['name'=>'email','type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Email'),'placeholder'=>trans('app.Email'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('form.input',['name'=>'mobile','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Mobile'),'placeholder'=>trans('app.Mobile'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'required'=>(@$row->id)?false:true]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('form.password',['name'=>'password_confirmation','attributes'=>['class'=>'form-control','label'=>trans('app.Password confirmation'),'placeholder'=>trans('app.Password confirmation'),'required'=>(@$row->id)?false:true]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('js'); ?>
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
<?php $__env->stopPush(); ?>

<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/users/form.blade.php ENDPATH**/ ?>