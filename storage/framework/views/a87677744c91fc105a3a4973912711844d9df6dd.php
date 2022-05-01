<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="single-row mt-3">
        <table class="table table-striped float-start">
            <tr>
                <td><?php echo e(trans('app.Title')); ?></td>
                <td><?php echo e($row->title); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Industry')); ?></td>
                <td><?php echo e($row->industry->title); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Country')); ?></td>
                <td><?php echo e($row->country->title); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.City')); ?></td>
                <td><?php echo e($row->city); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Address')); ?></td>
                <td><?php echo e($row->address); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Commercial registry')); ?></td>
                <td><?php echo fileRender($row->commercial_registry); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Tax ID card')); ?></td>
                <td><?php echo fileRender($row->tax_id_card); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Website')); ?></td>
                <td><?php echo e($row->website); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Linkedin')); ?></td>
                <td><?php echo e($row->linkedin); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Facebook')); ?></td>
                <td><?php echo e($row->facebook); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Instagram')); ?></td>
                <td><?php echo e($row->instagram); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Image')); ?></td>
                <td><?php echo image($row->image,'small',['width'=>50]); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Created at')); ?></td>
                <td><?php echo e(@$row->created_at); ?></td>
            </tr>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/companies/view.blade.php ENDPATH**/ ?>