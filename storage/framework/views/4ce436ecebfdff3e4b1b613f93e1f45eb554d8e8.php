<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo Form::model($row,['method' => 'post','files' => true] ); ?>

    <?php echo e(csrf_field()); ?>


    <?php echo $__env->make('form.input',['name'=>'title','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Title'),'placeholder'=>trans('app.Title'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.select',['name'=>'industry_id','options'=>$row->getIndustries(),'attributes'=>['class'=>'form-control','label'=>trans('app.Industry'),'placeholder'=>trans('app.Industry'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.select',['name'=>'country_id','options'=>$row->getCountries(),'attributes'=>['class'=>'form-control','label'=>trans('app.Country'),'placeholder'=>trans('app.Country'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'city','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.City'),'placeholder'=>trans('app.City'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'address','type'=>'textarea','attributes'=>['class'=>'form-control ','label'=>trans('app.Address'),'placeholder'=>trans('app.Address'),'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.file',['name'=>'commercial_registry','attributes'=>['class'=>'form-control','file_type'=>'attachment','label'=>trans('app.Commercial registry'),'placeholder'=>trans('app.Commercial registry'),'required'=>($row->commercial_registry)?false:true]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.file',['name'=>'tax_id_card','attributes'=>['class'=>'form-control','file_type'=>'attachment','label'=>trans('app.Tax ID card'),'placeholder'=>trans('app.Tax ID card'),'required'=>($row->tax_id_card)?false:true]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'website','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Website'),'placeholder'=>trans('app.Website'),'autocomplete'=>"off"]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'linkedin','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Linkedin'),'placeholder'=>trans('app.Linkedin'),'autocomplete'=>"off"]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'facebook','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.facebook'),'placeholder'=>trans('app.facebook'),'autocomplete'=>"off"]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.input',['name'=>'instagram','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Instagram'),'placeholder'=>trans('app.Instagram'),'autocomplete'=>"off"]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('form.file',['name'=>'image','attributes'=>['class'=>'form-control custom-file-input','label'=>trans('app.Image'),'placeholder'=>trans('app.Image')]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="form-group mt-3">
        <?php echo $__env->make('form.submit',['label'=>trans('app.Submit')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/company/edit.blade.php ENDPATH**/ ?>