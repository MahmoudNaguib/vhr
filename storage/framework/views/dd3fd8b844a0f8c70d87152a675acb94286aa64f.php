<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="<?php echo e(app()->make("url")->to('/')); ?>" class="navbar-brand">
            <img src="uploads/small/<?php echo e(conf('logo')); ?>" height="40" alt="<?php echo e(conf('app_name')); ?>" class="d-inline-block align-middle mr-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="<?php echo e(app()->make("url")->to('/')); ?>" class="nav-link <?php echo e((request()->is('/'))?'active':''); ?>">
                        <?php echo e(trans('app.Home')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="about" class="nav-link <?php echo e((request()->is('/about'))?'active':''); ?>">
                        <?php echo e(trans('app.About')); ?>

                    </a>
                </li>
                <?php if(auth()->guest()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e((request()->is('auth/*'))?'active':''); ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <?php echo e(trans('app.Login')); ?>

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="auth/login"><?php echo e(trans('app.Login')); ?></a></li>
                            <li><a class="dropdown-item" href="auth/register"><?php echo e(trans('app.Register')); ?></a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e((request()->is('profile/*') || request()->is('dashbard'))?'active':''); ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <?php echo e(trans('app.Welcome')); ?> <?php echo e(auth()->user()->name); ?>

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="dashboard">
                                    <?php echo e(trans('app.Dashboard')); ?>

                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="profile/edit">
                                    <?php echo e(trans('app.Edit account')); ?>

                                </a>
                            </li>
                            <?php if(auth()->user()->type=='recruiter'): ?>
                            <li>
                                <a class="dropdown-item" href="company/edit">
                                    <?php echo e(trans('app.Edit company profile')); ?>

                                </a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a class="dropdown-item" href="profile/change-password">
                                    <?php echo e(trans('app.Change password')); ?>

                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="profile/logout">
                                    <?php echo e(trans('app.Logout')); ?>

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?php
                            $notificationsCount=\App\Models\Notification::where('user_id',auth()->user()->id)->unreaded()->count();
                        ?>
                        <a href="notifications" class="nav-link <?php echo e((request()->is('notifications*'))?'active':''); ?>" aria-current="page">
                            <i class="fa fa-bell"></i>
                            <span class="indicator"><?php echo e($notificationsCount); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/partials/header.blade.php ENDPATH**/ ?>