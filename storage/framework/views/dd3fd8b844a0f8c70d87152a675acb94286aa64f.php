<!-- NAVBAR-->
<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="uploads/small/<?php echo e(conf('logo')); ?>" height="40" alt="Logo" class="d-inline-block align-middle mr-2">
        </a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="<?php echo e(app()->make("url")->to('/')); ?>" class="nav-link">
                        <?php echo e(trans('app.Home')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="about" class="nav-link">
                        <?php echo e(trans('app.About')); ?>

                    </a>
                </li>
                <?php if(!auth()->guest()): ?>
                    <?php if(auth()->user()->role_id): ?>
                        <li class="nav-item">
                            <a href="admin/roles" class="nav-link">
                                <?php echo e(trans('app.Roles')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(auth()->guest()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <?php echo e(trans('app.Welcome')); ?> <?php echo e(auth()->user()->name); ?>

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="dashboard"><?php echo e(trans('app.Dashboard')); ?></a></li>
                            <li><a class="dropdown-item" href="profile/change-password"><?php echo e(trans('app.Change password')); ?></a></li>
                            <li><a class="dropdown-item" href="profile/edit"><?php echo e(trans('app.Edit account')); ?></a></li>
                            <li><a class="dropdown-item" href="profile/logout"><?php echo e(trans('app.Logout')); ?></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?php
                        $notificationsCount=\App\Models\Notification::where('user_id',auth()->user()->id)->unreaded()->count();
                        ?>
                        <a href="notifications" class="nav-link" aria-current="page">
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