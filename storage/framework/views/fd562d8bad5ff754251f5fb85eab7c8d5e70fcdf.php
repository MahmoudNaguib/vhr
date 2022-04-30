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
                <td><?php echo e(trans('app.Permissions')); ?></td>
                <td>
                    <?php if(is_array($row->permissions)): ?>
                        <?php echo e(implode(', ',($row->permissions)?:[])); ?>

                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><?php echo e(trans('app.Created at')); ?></td>
                <td><?php echo e(@$row->created_at); ?></td>
            </tr>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/roles/view.blade.php ENDPATH**/ ?>