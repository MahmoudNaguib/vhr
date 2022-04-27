<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo Form::model($row,['method' => 'post','files' => true] ); ?>

    <?php echo e(csrf_field()); ?>

    <?php echo $__env->make('form.select',['name'=>'gender','options'=>$row->getGenders(),'attributes'=>['class'=>'form-control','label'=>trans('app.Gender'),'placeholder'=>trans('app.Gender'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'name','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Name'),'placeholder'=>trans('app.Name'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'mobile','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Mobile'),'placeholder'=>trans('app.Mobile'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($row->type=='employee'): ?>
        <?php echo $__env->make('form.select',['name'=>'country_id','options'=>$row->getCountries(),'attributes'=>['class'=>'form-control select2','label'=>trans('app.Country'),'placeholder'=>trans('app.Country'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'city','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.City'),'placeholder'=>trans('app.City'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'national_id','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.National ID'),'placeholder'=>trans('app.National ID'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'birth_date','type'=>'text','attributes'=>['class'=>'form-control datepicker','label'=>trans('app.Birth date'),'placeholder'=>trans('app.Birth date'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.select',['name'=>'degree','options'=>$row->getDegrees(),'attributes'=>['class'=>'form-control','label'=>trans('app.Degree'),'placeholder'=>trans('app.Degree'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'bio','type'=>'textarea','attributes'=>['class'=>'form-control ','label'=>trans('app.Bio'),'placeholder'=>trans('app.Bio'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('form.input',['name'=>'youtube_video','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Youtube video link'),'placeholder'=>trans('app.Youtube video link'),'autocomplete'=>"off"]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('form.file',['name'=>'image','attributes'=>['class'=>'form-control custom-file-input','label'=>trans('app.Image'),'placeholder'=>trans('app.Image')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="form-group mt-3">
        <?php echo $__env->make('form.submit',['label'=>trans('Submit')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/profile/edit.blade.php ENDPATH**/ ?>