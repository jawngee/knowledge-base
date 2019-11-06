<?php /** @var \ClippyKB\Content\BigSearch $content */ ?>
<?php /** @var bool $first */ ?>
<?php /** @var bool $last */ ?>
<div class="pre-content-block big-search <?php if($first): ?>first <?php endif; ?> <?php if($last): ?>last <?php endif; ?>">
    <div class="content">
        <h1><?php echo e($content->title); ?></h1>
        <form id="big-search-form">
            <label class="screen-reader-text" for="s">Search For</label>
            <input type="text" id="s" name="s" data-swplive="true" placeholder="<?php echo e($content->placeholder); ?>" data-swpparentel="#big-search-form .auto-search-results">
            <button type="submit">Search</button>
            <div class="auto-search-results"></div>
        </form>
    </div>
</div><?php /**PATH /srv/www/clippy.test/current/web/app/themes/clippy/views/content/big-search.blade.php ENDPATH**/ ?>