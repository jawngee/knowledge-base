<div class="troubleshooter-step">
    <div class="troubleshooter-step-icon">
        <?php if(!empty($errors)): ?>
            <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-error.svg" width="32" height="32">
        <?php elseif(!empty($warnings)): ?>
            <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-warning.svg" width="32" height="32">
        <?php else: ?>
            <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-success.svg" width="32" height="32">
        <?php endif; ?>
    </div>
    <div>
        <div class="troubleshooter-title"><?php echo e($title); ?></div>
        <div class="troubleshooter-message">
            <?php echo $description; ?>

        </div>
        <ul class="troubleshooter-info">
            <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="info-<?php echo e($item['type']); ?>"><?php echo $item['message']; ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php if(!empty($hints)): ?>
            <p>Some hints that might help you troubleshoot this issue:</p>
            <ul class="troubleshooter-errors">
                <?php $__currentLoopData = $hints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo $hint; ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </div>
</div><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/plugins/ilab-media-tools/views/debug/system-info.blade.php ENDPATH**/ ?>