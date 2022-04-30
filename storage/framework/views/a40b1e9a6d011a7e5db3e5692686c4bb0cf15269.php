<?php if(auth()->user()->type=='admin'): ?>
    <ul class="nav nav-pills">
        <?php if(auth()->user()->role_id==1): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/roles*'))?"active":""); ?>" aria-current="page" href="admin/roles"><?php echo e(trans('app.Roles')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(can('create-countries') || can('view-countries')): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/countries*'))?"active":""); ?>" aria-current="page"
                   href="admin/countries"><?php echo e(trans('app.Countries')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(can('create-industries') || can('view-industries')): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/industries*'))?"active":""); ?>" aria-current="page"
                   href="admin/industries"><?php echo e(trans('app.Industries')); ?></a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/partials/inner-navigation.blade.php ENDPATH**/ ?>