<?php echo $__env->make('form.input',['name'=>'title','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Title'),'placeholder'=>trans('app.Title'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if(config('modules')): ?>
    <?php $__currentLoopData = config('modules'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-4">
            <h5>
                <label class="ckbox">
                    <?php echo Form::checkbox('parents',NULL,null,['id'=>toRoleID($key),'class'=>'parents']); ?>

                    <span><b><u><?php echo e(ucfirst($key)); ?></u></b></span>
                </label>
            </h5>
            <div class="row">
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <?php echo Form::checkbox('permissions[]',$permission,null,['id'=>$permission,'class'=>'childs childs_'.toRoleID($key),'for'=>toRoleID($key)]); ?>

                            <span><?php echo e($label); ?></span>
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(@$errors): ?>
    <?php $__currentLoopData = $errors->get('permissions'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class='help-inline text-danger'><?php echo e(trans('app.Choose at least 1 permission')); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->startPush('js'); ?>
    <script>
        $('.parents').on('change', function () {
            if ($(this).is(':checked')) {
                $('.childs_' + $(this).attr('id')).prop('checked', true);
            } else {
                $('.childs_' + $(this).attr('id')).prop('checked', false);
            }
        });
        $('.childs').on('change', function () {
            var parent = $(this).attr("for");
            if ($(this).is(':checked')) {
                $('#' + parent).prop('checked', true);
            } else {
                if ($('.childs_' + parent + ":checked").size() == 0) {
                    $('#' + parent).prop('checked', false);
                }
            }
        });
        $('.childs').trigger('change');

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/roles/form.blade.php ENDPATH**/ ?>