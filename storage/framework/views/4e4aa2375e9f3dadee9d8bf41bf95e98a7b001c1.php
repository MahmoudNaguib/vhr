<?php $__env->startPush('js'); ?>
    <script>
        <?php $__currentLoopData = session('flash_notification', collect())-> toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        $.notify("<?php echo $message['message']; ?>", "<?php echo e(($message['level']!='danger')?$message['level']:'error'); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/partials/flash_messages.blade.php ENDPATH**/ ?>