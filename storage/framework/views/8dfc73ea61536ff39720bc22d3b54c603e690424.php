<?php $__env->startSection('title'); ?>
    <?php echo e(trans("email.Confirm user account")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <p><?php echo e(trans("email.Welcome")); ?> <strong><?php echo e($row->name); ?></strong></p>
    <p><?php echo e(trans("email.Thanks for joining us at")); ?> <?php echo e(appName()); ?></p>
    <p>
        <?php echo e(trans("email.Here is your account details")); ?>

    </p>

    <?php if($row->name): ?>
        <p>
            <strong><?php echo e(trans("email.Type")); ?> : </strong> <?php echo e($row->type); ?>

        </p>
    <?php endif; ?>
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

    <?php if(!$row->confirmed): ?>
        <p><?php echo e(trans('email.To confirm your account please click the link below')); ?></p>
        <a href="<?php echo e(app()->make("url")->to('/')); ?>/auth/confirm?token=<?php echo e($row->confirm_token); ?>"><?php echo e(trans('email.Confirm')); ?></a>
        </p>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/emails/users/create.blade.php ENDPATH**/ ?>