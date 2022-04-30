<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body style="font-family: sans-serif; padding: 15px;">
<div class="wrapper">
    <div class="header" style="width: 100%">
        <a href="<?php echo e(App::make("url")->to('/')); ?>" style="margin-left: auto;
  margin-right: auto;
  display: block;">
            <img src="<?php echo e(app()->make("url")->to('/')); ?>/uploads/small/<?php echo e((conf('logo'))?:'logo.png'); ?>" alt="<?php echo e(appName()); ?>" style="margin-left: auto;
  margin-right: auto;
  height: 60px;
  display: block;">
        </a>
    </div>
    <div class="body" style="color: #000000;
            font-size: 14px; margin-top: 25px; margin-bottom: 50px;">
        <h3 style="text-align: center;"><?php echo $__env->yieldContent('title'); ?></h3>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div class="footer" style="text-align: center;
            width: 100%;
            color: #999999;
            font-size: 12px; margin-top: 50px;">
        <?php echo e(trans('email.Copyright')); ?> <?php echo e(date("Y")); ?> ©
        <a href="<?php echo e(App::make("url")->to('/')); ?>" style="color:#999999;">
            <?php echo e(appName()); ?>

        </a>
    </div>
</div>


</body>
</html>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/emails/master.blade.php ENDPATH**/ ?>