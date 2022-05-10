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
                <td><?php echo e(trans('app.Users count')); ?></td>
                <td><?php echo e($row->users_count); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Unlock count')); ?></td>
                <td><?php echo e($row->unlock_count); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Posts count')); ?></td>
                <td><?php echo e($row->posts_count); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Duration in month')); ?></td>
                <td><?php echo e($row->duration_in_month); ?> <?php echo e(trans('app.Months')); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Price')); ?></td>
                <td><?php echo e($row->price); ?> <?php echo e(trans('app.EGP')); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Created at')); ?></td>
                <td><?php echo e(@$row->created_at); ?></td>
            </tr>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/plans/view.blade.php ENDPATH**/ ?>