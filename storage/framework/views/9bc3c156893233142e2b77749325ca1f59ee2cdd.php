<div class="footer">
    <div class="container">
        <div class="text-center">
            <?php echo e(trans('app.Copyright')); ?> <?php echo e(date('Y')); ?> &copy; <?php echo e(trans('app.All Rights Reserved')); ?>

            <?php echo e(conf('app_name')); ?>

            <ul class="social-links">
                <li>
                    <a href="<?php echo e((conf('facebook'))?:'#'); ?>" target="_blank" class="nav-link">
                        <i class="fab fa-1x fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e((conf('twitter'))?:'#'); ?>" target="_blank" class="nav-link">
                        <i class="fab fa-1x fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e((conf('linkedin'))?:'#'); ?>" target="_blank" class="nav-link">
                        <i class="fab fa-1x fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e((conf('youtube'))?:'#'); ?>" target="_blank" class="nav-link">
                        <i class="fab fa-1x fa-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/partials/footer.blade.php ENDPATH**/ ?>