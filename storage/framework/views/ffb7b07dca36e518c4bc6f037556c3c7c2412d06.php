<?php echo $__env->make('form.input',['name'=>'title','type'=>'text','attributes'=>['class'=>'form-control','label'=>trans('app.Title'),'placeholder'=>trans('app.Title'),'autocomplete'=>"off",'required'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('form.input',['name'=>'applicants_unlock_count','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Applicants unlock count'),'placeholder'=>trans('app.Applicants unlock count'),'autocomplete'=>"off",'step'=>'1','required'=>1,'min'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('form.input',['name'=>'posts_count','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Posts count'),'placeholder'=>trans('app.Posts count'),'autocomplete'=>"off",'step'=>'1','required'=>1,'min'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('form.input',['name'=>'duration_in_month','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Duration in month'),'placeholder'=>trans('app.Duration in month'),'autocomplete'=>"off",'step'=>'1','required'=>1,'min'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('form.input',['name'=>'price','type'=>'number','attributes'=>['class'=>'form-control','label'=>trans('app.Price'),'placeholder'=>trans('app.Price'),'autocomplete'=>"off",'step'=>'0.01','required'=>1,'min'=>1]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/plans/form.blade.php ENDPATH**/ ?>