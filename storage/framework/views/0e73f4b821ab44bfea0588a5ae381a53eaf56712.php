<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mb-4">
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-award"></i> <?php echo e(@$totalRoles); ?> </h2>
            <div class="text-center">
                <?php echo e(trans('app.Roles')); ?>

            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-users"></i> <?php echo e(@$totalUsers); ?> </h2>
            <div class="text-center">
                <?php echo e(trans('app.Users')); ?>

            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-bars"></i> <?php echo e(@$totalPlans); ?> </h2>
            <div class="text-center">
                <?php echo e(trans('app.Plans')); ?>

            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-envelope"></i> <?php echo e(@$totalMessages); ?> </h2>
            <div class="text-center">
                <?php echo e(trans('app.Contact messages')); ?>

            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mt-2">
            <h2 class="text-center">
                <i class="fa fa-database"></i> <?php echo e(@$totalCompanies); ?> </h2>
            <div class="text-center">
                <?php echo e(trans('app.Companies')); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <?php if(can('view-users')): ?>
            <h4>
                <?php echo e(trans('app.Latest')); ?> <?php echo e(trans('app.Users')); ?>

                <span class="fs-6">
                        <a href="admin/users">
                            <?php echo e(trans('app.View all')); ?>

                        </a>
                    </span>
            </h4>
            <div class="grid-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="ml-1"><?php echo e(trans('app.ID')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Type')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Name')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Email')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Mobile')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Created at')); ?></th>
                        <th class="ml-3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!@$users->isEmpty()): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="#"><?php echo e($row->id); ?></td>
                                <td data-label="<?php echo e(trans('app.Type')); ?>">
                                    <?php echo e($row->type); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Name')); ?>">
                                    <?php echo e($row->name); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Email')); ?>">
                                    <?php echo e($row->email); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Mobile')); ?>">
                                    <?php echo e($row->mobile); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Created at')); ?>">
                                    <?php echo e(str_limit($row->created_at,10,false)); ?>

                                </td>
                                <td data-label="">
                                    <?php if(can('view-'.$module)): ?>
                                        <a class="btn btn-xs" href="admin/users/view/<?php echo e($row->id); ?>" title="<?php echo e(trans('app.View')); ?>">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        <?php if(can('view-messages')): ?>
            <h4>
                <?php echo e(trans('app.Latest')); ?> <?php echo e(trans('app.Messages')); ?>

                <span class="fs-6">
                        <a href="admin/messages">
                            <?php echo e(trans('app.View all')); ?>

                        </a>
                    </span>
            </h4>
            <div class="grid-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="ml-1"><?php echo e(trans('app.ID')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Name')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Email')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Mobile')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Created at')); ?></th>
                        <th class="ml-3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!@$messages->isEmpty()): ?>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="#"><?php echo e($row->id); ?></td>
                                <td data-label="<?php echo e(trans('app.Name')); ?>">
                                    <?php echo e($row->name); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Email')); ?>">
                                    <?php echo e($row->email); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Mobile')); ?>">
                                    <?php echo e($row->mobile); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Created at')); ?>">
                                    <?php echo e(str_limit($row->created_at,10,false)); ?>

                                </td>
                                <td data-label="">
                                    <?php if(can('view-'.$module)): ?>
                                        <a class="btn btn-xs" href="admin/messages/view/<?php echo e($row->id); ?>" title="<?php echo e(trans('app.View')); ?>">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        <?php if(can('view-companies')): ?>
            <h4>
                <?php echo e(trans('app.Latest')); ?> <?php echo e(trans('app.Companies')); ?>

                <span class="fs-6">
                        <a href="admin/companies">
                            <?php echo e(trans('app.View all')); ?>

                        </a>
                    </span>
            </h4>
            <div class="grid-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="ml-1"><?php echo e(trans('app.ID')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Title')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Industry')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Country')); ?> </th>
                        <th class="ml-2"><?php echo e(trans('app.Created at')); ?></th>
                        <th class="ml-3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!@$companies->isEmpty()): ?>
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="#"><?php echo e($row->id); ?></td>
                                <td data-label="<?php echo e(trans('app.Title')); ?>">
                                    <?php echo e($row->title); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Industry')); ?>">
                                    <?php echo e($row->industry->title); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Country')); ?>">
                                    <?php echo e($row->country->title); ?>

                                </td>
                                <td data-label="<?php echo e(trans('app.Created at')); ?>">
                                    <?php echo e(str_limit($row->created_at,10,false)); ?>

                                </td>
                                <td data-label="">
                                    <?php if(can('view-'.$module)): ?>
                                        <a class="btn btn-xs" href="admin/companies/view/<?php echo e($row->id); ?>" title="<?php echo e(trans('app.View')); ?>">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>