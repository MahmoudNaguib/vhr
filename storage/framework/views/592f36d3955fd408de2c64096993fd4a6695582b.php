<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo Form::model($row,['method' => 'post','files' => true] ); ?>

    <?php echo e(csrf_field()); ?>

    <?php echo $__env->make('admin.'.$module.'.form',$row, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="form-group mt-3">
        <?php echo $__env->make('form.input',['name'=>'app_name','value'=>conf('app_name'),'type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Application name'),'placeholder'=>trans('app.Application name'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/configs/edit.blade.php ENDPATH**/ ?>