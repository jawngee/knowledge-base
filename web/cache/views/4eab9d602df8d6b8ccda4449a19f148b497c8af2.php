<?php
/** @var \ClippyKB\Content\HelpTopicTerm[]|null $termList */
/** @var bool|string $linkLast */
?>

<div class="breadcrumbs">
    <div class="contents">
        <ul>
            <li><a href="<?php echo e(home_url()); ?>">Home</a></li>
            <?php if(isset($termList)): ?>
            <?php $__currentLoopData = $termList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <?php if(!$loop->last || $linkLast): ?>
                        <a href="<?php echo e(get_term_link($term->term->term_id)); ?>"><?php echo e($term->term->name); ?></a>
                    <?php else: ?>
                        <span class="current"><?php echo e($term->term->name); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php if(!empty($linkLast)): ?>
                <li>
                    <span class="current"><?php echo $linkLast; ?></span>
                </li>
            <?php endif; ?>
        </ul>
        <div class="little-search">
            <form id="little-search-form">
                <label class="screen-reader-text" for="s">Search For</label>
                <input data-swplive="true" type="text" id="s" name="s" placeholder="Search ..." data-swpparentel="#little-search-form .auto-search-results">
                <button type="submit">Search</button>
                <div class="auto-search-results"></div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /srv/www/clippy.test/current/web/app/themes/clippy/views/partials/breadcrumbs.blade.php ENDPATH**/ ?>