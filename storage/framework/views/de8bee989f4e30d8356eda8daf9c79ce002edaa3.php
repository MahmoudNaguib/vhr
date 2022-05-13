<!-- Required meta tags -->
<?php if(app()->environment() != 'production'): ?>
    <meta name="robots" content="noindex">
<?php endif; ?>
<meta charset="utf-8">
<base href="<?php echo e(app()->make("url")->to('/')); ?>/" />
<title><?php echo e(appName()); ?> - <?php echo e(strip_tags(@$page_title)); ?></title>
<meta name="description" content="<?php echo e(@$meta_description); ?>">
<meta name="keywords" content="<?php echo e(@$meta_keywords); ?>">
<meta name="author" content="<?php echo e(appName()); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="language" content="English">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<meta property="og:locale" content="<?php echo e((lang() == 'en')?'en_EG':'ar_EG'); ?>">
<meta property="og:type" content="website">
<link rel="canonical" href="<?php echo e(App::make("url")->to('/')); ?>/<?php echo e(Request::path()); ?>" />
<meta property="og:title" content="<?php echo e(appName()); ?> - <?php echo e(strip_tags(@$page_title)); ?>"/>
<meta property="og:url" content="<?php echo e(App::make("url")->to('/')); ?>/<?php echo e(Request::path()); ?>"/>
<meta property="og:site_name" content="<?php echo e(appName()); ?>"/>
<meta property="og:locale" content="<?php echo e((lang() == 'en')?'en_EG':'ar_EG'); ?>">
<meta property="og:description" content="<?php echo e(@$meta_description); ?>" />
<meta property="og:image:width" content="500" />
<meta property="og:image:height" content="500" />
<?php if(@$image): ?>
    <meta property="og:image" content="<?php echo e(app()->make("url")->to('/')); ?>/uploads/large/<?php echo e(@$image); ?>" />
<?php else: ?>
    <meta property="og:image" content="<?php echo e(app()->make("url")->to('/')); ?>/uploads/large/<?php echo e(conf('logo')); ?>" />
<?php endif; ?>
<meta property="fb:app_id" content="2417803741600196" />
<link rel="icon" href="<?php echo e(app()->make("url")->to('/')); ?>/favicon.ico">


<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/partials/meta.blade.php ENDPATH**/ ?>