<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(App::make("url")->to('/')); ?>/"><?php echo e(trans('app.Home')); ?></a>
            </li>
            <?php if(@$breadcrumb): ?>
                <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="breadcrumb-item"><a href="<?php echo e($value); ?>"><?php echo e($key); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <li class="breadcrumb-item active" aria-current="page"><?php echo @$page_title; ?></li>
        </ol>
    </nav>
</div>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/partials/breadcrumb.blade.php ENDPATH**/ ?>