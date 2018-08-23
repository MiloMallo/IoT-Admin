<div class="<?php echo e($viewClass['form-group']); ?> <?php echo ($errors->has($errorKey['start'].'start') || $errors->has($errorKey['end'].'end')) ? 'has-error' : ''; ?>">

    <label for="<?php echo e($id['start']); ?>" class="<?php echo e($viewClass['label']); ?> control-label"><?php echo e($label); ?></label>

    <div class="<?php echo e($viewClass['field']); ?>">

        <?php echo $__env->make('admin::form.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row" style="width: 390px">
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="<?php echo e($name['start']); ?>" value="<?php echo e(old($column['start'], $value['start'])); ?>" class="form-control <?php echo e($class['start']); ?>" style="width: 160px" <?php echo $attributes; ?> />
                </div>
            </div>

            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="<?php echo e($name['end']); ?>" value="<?php echo e(old($column['end'], $value['end'])); ?>" class="form-control <?php echo e($class['end']); ?>" style="width: 160px" <?php echo $attributes; ?> />
                </div>
            </div>
        </div>

        <?php echo $__env->make('admin::form.help-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
</div>
