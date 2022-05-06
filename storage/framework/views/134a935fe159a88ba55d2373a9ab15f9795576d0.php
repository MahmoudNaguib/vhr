<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(!$rows->isEmpty()): ?>
        <div>
            <div class="float-end">
                <b><?php echo e(trans('app.Total')); ?></b>: <?php echo e($rows->total()); ?> <?php echo e(trans('app.records')); ?>

            </div>
            <div class="float-start">
                <button class="btn btn-danger delete_all btn-sm mb-2"
                        href="<?php echo e($module); ?>/delete-all"
                        data-confirm="<?php echo e(trans('app.Are you sure you want to delete the selected')); ?>?">
                    <?php echo e(trans('app.Delete selected')); ?>

                </button>
            </div>
        </div>
        <div class="grid-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="ml-1"><input type="checkbox" id="master"></th>
                    <th class="ml-1"><?php echo e(trans('app.ID')); ?> </th>
                    <th class="ml-2"><?php echo e(trans('app.Title')); ?> </th>
                    <th class="ml-2"><?php echo e(trans('app.Seen at')); ?> </th>
                    <th class="ml-2"><?php echo e(trans('app.Created at')); ?></th>
                    <th class="ml-3">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="sub_chk" data-id="<?php echo e($row->id); ?>">
                        </td>
                        <td data-label="#"><?php echo e($row->id); ?></td>
                        <td data-label="<?php echo e(trans('app.Title')); ?>">
                            <?php echo e($row->title); ?>

                        </td>
                        <td data-label="<?php echo e(trans('app.Seen at')); ?>">
                            <?php echo e(($row->seen_at)?str_limit($row->seen_at,10,false):'----'); ?>

                        </td>
                        <td data-label="<?php echo e(trans('app.Created at')); ?>">
                            <?php echo e(str_limit($row->created_at,10,false)); ?>

                        </td>
                        <td data-label="">
                            <a class="btn btn-xs" href="<?php echo e($module); ?>/view/<?php echo e($row->id); ?>" title="<?php echo e(trans('app.View')); ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-xs" href="<?php echo e($module); ?>/delete/<?php echo e($row->id); ?>" title="<?php echo e(trans('app.Delete')); ?>" data-confirm="<?php echo e(trans('app.Are you sure you want to delete')); ?>?">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <?php echo $rows->render(); ?>

        </div>
    <?php else: ?>
        <?php echo e(trans("app.There is no results")); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/notifications/index.blade.php ENDPATH**/ ?>