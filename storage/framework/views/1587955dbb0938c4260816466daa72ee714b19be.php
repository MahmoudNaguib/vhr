<?php $__env->startSection('title'); ?>
    <?php echo e(appName().' - '.trans('email.Contact us message')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($row->name): ?>
        <p>
            <strong><?php echo e(trans("email.Name")); ?> : </strong> <?php echo e($row->name); ?>

        </p>
    <?php endif; ?>

    <?php if($row->email): ?>
        <p>
            <strong><?php echo e(trans("email.Email")); ?> : </strong> <?php echo e($row->email); ?>

        </p>
    <?php endif; ?>

    <?php if($row->mobile): ?>
        <p>
            <strong><?php echo e(trans("email.Mobile")); ?> : </strong> <?php echo e($row->mobile); ?>

        </p>
    <?php endif; ?>

    <?php if($row->message): ?>
        <p>
            <strong><?php echo e(trans("email.Message")); ?> : </strong> <?php echo e($row->message); ?>

        </p>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/emails/messages/create.blade.php ENDPATH**/ ?>