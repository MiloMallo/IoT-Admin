<div <?php echo $attributes; ?>>
    <div class="inner">
        <h3><?php echo e($info); ?></h3>

        <p><?php echo e($name); ?></p>
    </div>
    <div class="icon">
        <i class="fa fa-<?php echo e($icon); ?>"></i>
    </div>
    <a href="<?php echo e($link); ?>" class="small-box-footer">
        <?php echo e(trans('admin.more')); ?>&nbsp;
        <i class="fa fa-arrow-circle-right"></i>
    </a>
</div>