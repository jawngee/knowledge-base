<div class="ic-Super-toggle--on-off checkbox-w-description <?php echo e(($tool->envEnabled() && !$tool->enabled()) ? 'toggle-warning' : ''); ?>">
    <?php echo $__env->make('base/fields/enable-toggle-checkbox', ['name' => $name, 'tool' => $tool], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div>
        <?php echo $__env->make('base/fields/enable-toggle-description', ['name' => $name, 'tool' => $tool, 'manager' => $manager], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>

<?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/plugins/ilab-media-tools/views/base/fields/enable-toggle.blade.php ENDPATH**/ ?>