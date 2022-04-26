<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['method' => 'post','files' => true] ); ?>

    <?php echo e(csrf_field()); ?>

    <?php echo $__env->make('form.input',['name'=>'email','type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Email'),'placeholder'=>trans('app.Email'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.password',['name'=>'password','attributes'=>['class'=>'form-control','label'=>trans('app.Password'),'placeholder'=>trans('app.Password'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="form-group">
        <label class="ckbox">
            <input type="checkbox" name="remember_me"><span> <?php echo e(trans('app.Remember me')); ?></span>
        </label>
    </div>
    <div class="form-group mt-3">
        <button class="btn btn-primary"><?php echo e(trans('app.Submit')); ?></button>
        <p>
            <a href="auth/forgot-password"><?php echo e(trans('app.Forgot password')); ?></a>
        </p>
    </div>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/auth/login.blade.php ENDPATH**/ ?>