<div class="mt-2 mb-3">
    <?php echo Form::open(['method' => 'get'] ); ?>

    <label class="section-title"><?php echo e(trans('app.Filter by')); ?></label>
    <div class="row">
        <div class="col-lg-4 col-md-6 mt-2">
            <?php echo Form::text('name',@request('name'),['class'=>'form-control','placeholder'=>trans('app.Name')]); ?>

        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            <?php echo Form::text('email',@request('email'),['class'=>'form-control','placeholder'=>trans('app.Email')]); ?>

        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            <?php echo Form::text('mobile',@request('mobile'),['class'=>'form-control','placeholder'=>trans('app.Mobile')]); ?>

        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            <button class="btn btn-primary col-lg-5 col-md-5 mg-b-10"><?php echo e(trans('app.Filter')); ?></button>
            <a href="admin/<?php echo e($module); ?>" class="btn btn-primary col-lg-5 col-md-5 mg-b-10"><?php echo e(trans('app.Reset')); ?></a>
        </div>
    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/messages/partials/filters.blade.php ENDPATH**/ ?>