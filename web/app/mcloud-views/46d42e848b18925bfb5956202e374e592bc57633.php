<div id="setting-<?php echo e($name); ?>" <?php echo e(((!empty($conditions)) ? 'data-conditions="true"' : '')); ?>>
<?php echo $__env->make('base/ui/checkbox', ['name' => $name, 'value' => $value, 'description' => '', 'enabled' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($description): ?>
<p class='description'><?php echo $description; ?></p>
<?php endif; ?>
<?php if($conditions): ?>
<script id="<?php echo e($name); ?>-conditions" type="text/plain">
    <?php echo json_encode($conditions, JSON_PRETTY_PRINT); ?>

</script>
<?php endif; ?>
</div>
<?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/plugins/ilab-media-tools/views/base/fields/checkbox.blade.php ENDPATH**/ ?>