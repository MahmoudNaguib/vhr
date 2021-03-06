<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="single-row mt-3">
        <table class="table table-striped float-start">
            <tr>
                <td><?php echo e(trans('app.Name')); ?></td>
                <td><?php echo e($row->name); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Email')); ?></td>
                <td><?php echo e($row->email); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Mobile')); ?></td>
                <td><?php echo e($row->mobile); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Message')); ?></td>
                <td><?php echo e($row->message); ?></td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Created at')); ?></td>
                <td><?php echo e(@$row->created_at); ?></td>
            </tr>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/messages/view.blade.php ENDPATH**/ ?>