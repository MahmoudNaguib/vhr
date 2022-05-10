<?php $__env->startSection('title'); ?>
    <h2><?php echo e($page_title); ?></h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(auth()->user()->type!='admin'): ?>
        <?php echo $__env->make('dashboard.'.auth()->user()->type, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/vhr/resources/views/dashboard/index.blade.php ENDPATH**/ ?>