<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['method' => 'post','files' => true] ); ?> <?php echo e(csrf_field()); ?>

    <?php echo e(csrf_field()); ?>

    <div class="form-group mt-3">
        <?php echo $__env->make('form.input',['name'=>'app_name','value'=>conf('app_name'),'type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Application name'),'placeholder'=>trans('app.Application name'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'contact_email','value'=>conf('contact_email'),'type'=>'email','attributes'=>['class'=>'form-control','label'=>trans('app.Contact email'),'placeholder'=>trans('app.Contact email'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'facebook','value'=>conf('facebook'),'type'=>'url','attributes'=>['class'=>'form-control','label'=>trans('app.Facebook'),'placeholder'=>trans('app.Facebook'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'twitter','value'=>conf('twitter'),'type'=>'url','attributes'=>['class'=>'form-control','label'=>trans('app.Twitter'),'placeholder'=>trans('app.Twitter'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'linkedin','value'=>conf('linkedin'),'type'=>'url','attributes'=>['class'=>'form-control','label'=>trans('app.Linkedin'),'placeholder'=>trans('app.Linkedin'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'youtube','value'=>conf('youtube'),'type'=>'url','attributes'=>['class'=>'form-control','label'=>trans('app.Youtube'),'placeholder'=>trans('app.Youtube'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'about','value'=>conf('about'),'type'=>'textarea','attributes'=>['class'=>'form-control','label'=>trans('app.About'),'placeholder'=>trans('app.About'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.file',['name'=>'logo','attributes'=>['class'=>'form-control custom-file-input','label'=>trans('app.Logo'),'placeholder'=>trans('app.Logo'),'value'=>conf('logo')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="form-group mt-3">
            <?php echo $__env->make('form.submit',['label'=>trans('Submit')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/configs/index.blade.php ENDPATH**/ ?>