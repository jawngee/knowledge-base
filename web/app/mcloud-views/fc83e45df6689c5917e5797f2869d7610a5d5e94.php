<?php $classes = ($target == 'footer') ? 'button button-primary' : ''; ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $helpLinks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div id="doc-links-<?php echo e($id); ?>" class="doc-links-setting" <?php if(!$loop->first): ?> style="display:none" <?php endif; ?>>
        <?php $__currentLoopData = $helpLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $helpLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($helpLink['url']); ?>" target="_blank" class="<?php echo e($classes); ?> <?php echo e(\ILAB\MediaCloud\Utilities\arrayPath($helpLink, 'class', '')); ?>" <?php if(!empty($helpLink['beacon_id'])): ?> data-beacon-article-sidebar="<?php echo e($helpLink['beacon_id']); ?>" <?php endif; ?>><?php echo e($helpLink['title']); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php if(!empty($watch)): ?>
    <script>
        (function($){
            $(document).on('ready', function() {
                $('#<?php echo e($watch); ?>').on('change', function() {
                    $('.doc-links-setting').css({display: 'none'});
                    $('#doc-links-'+$(this).val()).css({display: ''});
                });
            });
        })(jQuery);
    </script>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/plugins/ilab-media-tools/views/base/fields/help.blade.php ENDPATH**/ ?>