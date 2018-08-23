<div class="input-group">
    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!$inline): ?><div class="radio"><?php endif; ?>
            <label <?php if($inline): ?>class="radio-inline"<?php endif; ?>>
                <input type="checkbox" class="<?php echo e($id); ?>" name="<?php echo e($name); ?>[]" value="<?php echo e($option); ?>" class="minimal" <?php echo e(in_array((string)$option, request($name, is_null($value) ? [] : $value)) ? 'checked' : ''); ?> />&nbsp;<?php echo e($label); ?>&nbsp;&nbsp;
            </label>
            <?php if(!$inline): ?></div><?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>