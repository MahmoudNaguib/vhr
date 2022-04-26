<div class="row form-group mt-3">
    <label class="col-sm-3 form-control-label">
        <?php echo e(@$attributes['label']); ?>

        <span class="text-danger">
            <?php echo e((@$attributes['required'])?'*':''); ?>

        </span>
    </label>
    <div class="col-sm-9">
        <?php echo Form::$type($name,(@$row->$name)?:(@$value),$attributes); ?>

        <?php if(@$errors): ?>
            <?php $__currentLoopData = $errors->get($name); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class='help-inline text-danger'><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($attributes['text'])): ?>
        <span class='help-inline'><?php echo e($attributes['text']); ?></span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/form/input.blade.php ENDPATH**/ ?>