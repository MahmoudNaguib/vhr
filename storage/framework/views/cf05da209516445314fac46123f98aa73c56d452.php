<div class="row form-group mt-3">
    <label class="col-sm-3 form-control-label">
        <?php echo e(@$attributes['label']); ?>

        <span class="text-danger">
            <?php echo e((@$attributes['required'])?'*':''); ?>

        </span>
    </label>
    <div class="col-sm-9">
        <div class="custom-file">
            <?php echo Form::file($name,$attributes); ?>

            <?php if(!$errors->isEmpty()): ?>
                <?php $__currentLoopData = $errors->get($name); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class='help-inline text-danger'><?php echo e($message); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <br>
            <?php endif; ?>

            <?php
            $value=(@$attributes['value'])?:$row->$name;
            ?>
            <span class="imagePreview">
                <?php echo image($value,'small',['width'=>75]); ?>

            </span>
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/vhr/resources/views/form/file.blade.php ENDPATH**/ ?>