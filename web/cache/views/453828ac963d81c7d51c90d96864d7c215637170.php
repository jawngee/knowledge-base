<?php
/** @var \Stem\Content\Models\ContentBlock[] $preContent */
/** @var \Stem\Content\Models\ContentBlock[] $mainContent */
/** @var \Stem\Content\Models\ContentBlock[] $postContent */
/** @var \Stem\Models\Query\PostCollection $posts */
?>



<?php $__env->startSection('page-content'); ?>
    <?php echo $__env->make('partials.breadcrumbs', ['linkLast' => 'Search Results for <strong>'.sanitize_text_field($_REQUEST['s']).'</strong>'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page search-results">
        <header>
            <?php echo e($posts->total()); ?> results for <strong><?php echo e(sanitize_text_field($_REQUEST['s'])); ?></strong>
        </header>
        <div class="articles-list">
            <div class="section-header">
            </div>
            <ul class="articles">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a class="article" href="<?php echo e($post->permalink); ?>">
                            <h3><?php echo e($post->title); ?></h3>
                            <p><?php echo $post->excerpt(50, false, null); ?></p>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="pagination">
                <?php echo paginate_links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.content-page', ['preContent' => $preContent, 'mainContent' => $mainContent, 'postContent' => $postContent ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/themes/clippy/views/templates/search-results.blade.php ENDPATH**/ ?>