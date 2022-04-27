<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo Form::model($row,['method' => 'post','files' => true] ); ?>

    <?php echo e(csrf_field()); ?>


    <?php echo $__env->make('form.select',['name'=>'type','options'=>$row->getTypes(),'attributes'=>['class'=>'form-control','label'=>trans('app.Type'),'placeholder'=>trans('app.Type'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'name','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Name'),'placeholder'=>trans('app.Name'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'email','type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Email'),'placeholder'=>trans('app.Email'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'mobile','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Mobile'),'placeholder'=>trans('app.Mobile'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.password',['name'=>'password_confirmation','attributes'=>['class'=>'form-control','label'=>trans('app.Password confirmation'),'placeholder'=>trans('app.Password confirmation'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="form-group mt-3">
        <?php echo $__env->make('form.submit',['label'=>trans('Submit')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="auth/forgot-password"><?php echo e(trans('app.Forgot password')); ?></a> |
        <a href="auth/register"><?php echo e(trans('app.Register')); ?></a>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/auth/register.blade.php ENDPATH**/ ?>