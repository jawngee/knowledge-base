<?php
/** @var \Stem\Models\Page $page */
?>



<?php $__env->startSection('main'); ?>
    <div class="page generic-page">
        <h1><?php echo e($page->title); ?></h1>
        <?php echo $page->content; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-main'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/themes/clippy/views/templates/page.blade.php ENDPATH**/ ?>