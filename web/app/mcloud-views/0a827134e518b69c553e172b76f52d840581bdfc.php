<?php echo $__env->yieldContent('top'); ?>

<div class="settings-container">
    <header>
        <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-cloud.svg">
        <h1><?php echo e($title); ?><?php echo $__env->yieldContent('header-title'); ?></h1>
        <?php echo $__env->yieldContent('header'); ?>
    </header>
    <div class="settings-body <?php if (\ILAB\MediaCloud\Utilities\LicensingManager::ActivePlan('free')): ?> show-upgrade <?php endif; ?>">
        <div class="settings-interior">
            <div class="ilab-notification-container"></div>
            <?php echo $__env->yieldContent('main'); ?>
        </div>
        <?php if (\ILAB\MediaCloud\Utilities\LicensingManager::ActivePlan('free')): ?>
        <?php echo $__env->make('base/upgrade', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <?php echo $__env->make('support.beacon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php /**PATH /srv/www/clippy.test/current/web/app/plugins/ilab-media-tools/views////templates/sub-page.blade.php ENDPATH**/ ?>