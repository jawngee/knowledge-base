<div class="troubleshooter-step">
    <div class="troubleshooter-step-icon">
        <?php if($success === true): ?>
        <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-success.svg" width="32" height="32">
        <?php elseif($success === false): ?>
        <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-error.svg" width="32" height="32">
        <?php else: ?>
        <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-warning.svg" width="32" height="32">
        <?php endif; ?>
    </div>
    <div>
        <div class="troubleshooter-title"><?php echo e($title); ?></div>
        <div class="troubleshooter-message">
            <?php if($success): ?>
            <?php echo $success_message; ?>

            <?php else: ?>
            <?php echo $error_message; ?>

            <?php endif; ?>
        </div>
        <?php if(!$success && !empty($errors)): ?>
        <ul class="troubleshooter-errors">
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo $error; ?></li>
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
        <?php endif; ?>
    </div>
</div><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/plugins/ilab-media-tools/views/debug/trouble-shooter-step.blade.php ENDPATH**/ ?>