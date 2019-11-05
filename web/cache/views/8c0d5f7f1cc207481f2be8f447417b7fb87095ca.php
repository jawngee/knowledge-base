<?php
/** @var \Stem\Content\Models\ContentBlock[] $preContent */
/** @var \Stem\Content\Models\ContentBlock[] $mainContent */
/** @var \Stem\Content\Models\ContentBlock[] $postContent */
/** @var \ClippyKB\Content\HelpTopicTerm[] $termList */
/** @var \ClippyKB\Content\HelpTopicTerm[] $childTerms */
/** @var \ClippyKB\Content\HelpTopicTerm $currentTerm */
/** @var \Stem\Models\Query\PostCollection $posts */
?>



<?php $__env->startSection('page-content'); ?>
    <?php echo $__env->make('partials.breadcrumbs', ['termList' => $termList, 'linkLast' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page article-category-landing">
        <div class="toc">
            <h4>Categories</h4>
            <ul class="categories">
                <?php $__currentLoopData = $childTerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childTerm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li class="<?php if($currentTerm->term->term_id === $childTerm->term->term_id): ?>current <?php endif; ?>">
                    <a href="<?php echo e(get_term_link($childTerm->term->term_id)); ?>"><?php echo e($childTerm->term->name); ?></a>
               </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div class="articles-list">
            <div class="section-header">
                <picture>
                    <?php if($currentTerm->icon->mime == 'image/svg+xml'): ?>
                        <?php echo $currentTerm->icon->img(); ?>

                    <?php else: ?>
                        <?php echo $currentTerm->icon->img('help-topic-list'); ?>

                    <?php endif; ?>
                </picture>
                <div>
                    <h2><?php echo e($currentTerm->term->name); ?></h2>
                    <p><?php echo e($currentTerm->term->description); ?></p>
                </div>
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

<?php echo $__env->make('templates.content-page', ['preContent' => $preContent, 'mainContent' => $mainContent, 'postContent' => $postContent ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/themes/clippy/views/templates/article-category.blade.php ENDPATH**/ ?>