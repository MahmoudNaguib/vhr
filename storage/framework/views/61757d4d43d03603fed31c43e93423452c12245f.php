<div class="mt-2 mb-3">
    <?php echo Form::open(['method' => 'get'] ); ?>

    <label class="section-title"><?php echo e(trans('app.Filter by')); ?></label>
    <div class="row">
        <div class="col-lg-4 col-md-6 mt-2">
            <?php echo Form::select('country_id', $row->getCountries(),@request('country_id'), ['class'=>'form-control','placeholder'=>trans('app.Country')]); ?>

        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            <?php echo Form::select('industry_id', $row->getIndustries(),@request('industry_id'), ['class'=>'form-control','placeholder'=>trans('app.Industry')]); ?>

        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            <?php echo Form::select('plan_id', $row->getPlans(),@request('plan_id'), ['class'=>'form-control','placeholder'=>trans('app.Plan')]); ?>

        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            <?php echo Form::text('title',@request('title'),['class'=>'form-control','placeholder'=>trans('app.Title')]); ?>

        </div>
        <div class="col-lg-4 col-md-6 mt-2">
            <button class="btn btn-primary col-lg-5 col-md-5 mg-b-10"><?php echo e(trans('app.Filter')); ?></button>
            <a href="admin/<?php echo e($module); ?>" class="btn btn-primary col-lg-5 col-md-5 mg-b-10"><?php echo e(trans('app.Reset')); ?></a>
        </div>
    </div>
    <?php echo Form::close(); ?>

</div>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/companies/partials/filters.blade.php ENDPATH**/ ?>