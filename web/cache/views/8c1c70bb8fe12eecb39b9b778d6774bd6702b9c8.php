<?php
/** @var \Stem\Content\Models\ContentBlock[] $preContent */
/** @var \Stem\Content\Models\ContentBlock[] $mainContent */
/** @var \Stem\Content\Models\ContentBlock[] $postContent */
?>



<?php $__env->startSection('before-main'); ?>
    <?php $__currentLoopData = $preContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentBlock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $contentBlock->render(false, ['first' => $loop->first, 'last' => $loop->last]); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <?php $__currentLoopData = $mainContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentBlock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $contentBlock->render(false, ['first' => $loop->first, 'last' => $loop->last]); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->yieldContent('page-content'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-main'); ?>
    <?php $__currentLoopData = $postContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentBlock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $contentBlock->render(false, ['first' => $loop->first, 'last' => $loop->last]); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/www/clippy.test/current/web/app/themes/clippy/views/templates/content-page.blade.php ENDPATH**/ ?>