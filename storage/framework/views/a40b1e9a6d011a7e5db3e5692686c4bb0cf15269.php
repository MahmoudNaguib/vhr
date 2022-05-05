<?php if(auth()->user() && auth()->user()->type=='admin'): ?>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link <?php echo e((request()->is('admin/dashboard*'))?"active":""); ?>" aria-current="page"
               href="admin/dashboard"><?php echo e(trans('app.Dashboard')); ?></a>
        </li>
        <?php if(auth()->user()->role_id==1): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/configs*'))?"active":""); ?>" aria-current="page" href="admin/configs"><?php echo e(trans('app.Configs')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/roles*'))?"active":""); ?>" aria-current="page" href="admin/roles"><?php echo e(trans('app.Roles')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(can('create-users') || can('view-users')): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/users*'))?"active":""); ?>" aria-current="page"
                   href="admin/users"><?php echo e(trans('app.Users')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(can('create-plans') || can('view-plans')): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/plans*'))?"active":""); ?>" aria-current="page"
                   href="admin/plans"><?php echo e(trans('app.Plans')); ?></a>
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
        <?php if(can('view-companies')): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/messages*'))?"active":""); ?>" aria-current="page"
                   href="admin/messages"><?php echo e(trans('app.Contact messages')); ?></a>
            </li>
        <?php endif; ?>
        <?php if(can('create-companies') || can('view-companies')): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e((request()->is('admin/companies*'))?"active":""); ?>" aria-current="page"
                   href="admin/companies"><?php echo e(trans('app.Companies')); ?></a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/partials/inner-navigation.blade.php ENDPATH**/ ?>