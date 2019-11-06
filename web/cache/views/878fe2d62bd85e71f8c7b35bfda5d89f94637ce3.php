<?php /** @var \ClippyKB\Content\HelpTopics $content */ ?>
<?php /** @var bool $first */ ?>
<?php /** @var bool $last */ ?>
<div class="content-block help-topics <?php if($first): ?>first <?php endif; ?> <?php if($last): ?>last <?php endif; ?>">
    <div class="content">
        <?php $__currentLoopData = $content->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="topic">
            <h2><?php echo e($term->term->name); ?></h2>
            <ul>
                <?php $__currentLoopData = $term->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childTerm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(get_term_link($childTerm->term->term_id)); ?>">
                            <picture>
                                <?php if(!empty($childTerm->icon)): ?>
                                    <?php if($childTerm->icon->mime == 'image/svg+xml'): ?>
                                    <?php echo $childTerm->icon->img(); ?>

                                    <?php else: ?>
                                    <?php echo $childTerm->icon->img('help-topic-list'); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    Missing Image
                                <?php endif; ?>
                            </picture>
                            <div>
                                <h3><?php echo e($childTerm->term->name); ?></h3>
                                <p><?php echo e($childTerm->term->description); ?></p>
                            </div>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /srv/www/clippy.test/current/web/app/themes/clippy/views/content/help-topics.blade.php ENDPATH**/ ?>