<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="single-row mt-3">
        <table class="table table-striped float-start">
            <tr>
                <td><?php echo e(trans('app.Type')); ?></td>
                <td><?php echo e($row->type); ?></td>
            </tr>
            <?php if($row->type=='admin' && @$row->role_id): ?>
                <tr>
                    <td><?php echo e(trans('app.Role')); ?></td>
                    <td><?php echo e($row->role->title); ?></td>
                </tr>
            <?php endif; ?>
            <?php if($row->type=='recruiter' && @$row->company_id): ?>
                <tr>
                    <td><?php echo e(trans('app.Company')); ?></td>
                    <td><?php echo e($row->company->title); ?></td>
                </tr>
                <tr>
                    <td><?php echo e(trans('app.Is company admin')); ?></td>
                    <td><?php echo e(($row->is_company_admin)?trans('app.Yes'):trans('app.No')); ?></td>
                </tr>
                <tr>
                    <td><?php echo e(trans('app.Is verified')); ?></td>
                    <td><?php echo e((@$row->is_verified)?trans('app.Yes'):app('app.No')); ?></td>
                </tr>
            <?php endif; ?>
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
                <td><?php echo e(trans('app.Created at')); ?></td>
                <td><?php echo e(@$row->created_at); ?></td>
            </tr>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/users/view.blade.php ENDPATH**/ ?>