<?php
/** @var \Stem\Content\Models\ContentBlock[] $preContent */
/** @var \Stem\Content\Models\ContentBlock[] $mainContent */
/** @var \Stem\Content\Models\ContentBlock[] $postContent */
/** @var \ClippyKB\Content\HelpTopicTerm[] $termList */
/** @var \Stem\Models\Post $post */

$content = $post->content;
$headerRegex = '/<h([0-9]{1})>([^<]+)/m';

$toc = [];
$toc[] = [
	'title' => $post->title,
    'level' => 1,
    'id' => sanitize_title($post->title),
    'loc' => null
];


if (preg_match_all($headerRegex, $content, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE, 0)) {
	foreach($matches as $match) {

		$title = $match[2][0];
		if (strpos($title, 'Step ') === 0) {
			$title = substr($title, 5);
        }

		$toc[] = [
			'title' => $title,
			'level' => (int)$match[1][0],
			'id' => sanitize_title($match[2][0]),
            'loc' => (int)$match[0][1]
		];
    }
}

for($i = count($toc)  - 1; $i > 0; $i--) {
	$level = $toc[$i]['level'];
	$id = $toc[$i]['id'];
	$loc = $toc[$i]['loc'];

	$content = substr_replace($content, "<h{$level} class='track-pos' id='{$id}'>", $loc, 4);
}

?>



<?php $__env->startSection('page-content'); ?>
    <?php echo $__env->make('partials.breadcrumbs', ['termList' => $termList, 'linkLast' => $post->title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page article">
        <?php if(count($toc) > 1): ?>
        <div class="toc">
            <h4>Table of Contents</h4>
            <ul class="toc-entries" data-tracked>
                <?php $__currentLoopData = $toc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-tracks="<?php echo e($entry['id']); ?>" class="<?php if($loop->first): ?>current <?php endif; ?> level-<?php echo e($entry['level']); ?>"><a href="#<?php echo e($entry['id']); ?>"><?php echo $entry['title']; ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <article>
            <h1 id="<?php echo e(sanitize_title($post->title)); ?>"><?php echo e($post->title); ?></h1>
            <?php echo $content; ?>


            <?php if(!empty($post->related) && (count($post->related) > 0)): ?>
            <div class="related">
                <h4>Related Articles</h4>
                <ul>
                    <?php $__currentLoopData = $post->related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($related->permalink); ?>"><?php echo e($related->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
        </article>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.content-page', ['preContent' => $preContent, 'mainContent' => $mainContent, 'postContent' => $postContent ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/themes/clippy/views/templates/article.blade.php ENDPATH**/ ?>