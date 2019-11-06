<?php
$wpath = str_replace('/wp/','/',ABSPATH);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="<?php echo e(ILAB_STEM_PUB_CSS_URL); ?>/error.css" rel="stylesheet" />
    <link href="<?php echo e(ILAB_STEM_PUB_CSS_URL); ?>/prism.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <h1><?php echo e($ex->getMessage()); ?></h1>
    <h2>Line <strong><?php echo e($ex->getLine()); ?></strong>, in file <strong><?php echo e($ex->getFile()); ?></strong>:</h2>
</div>
<pre data-line="<?php echo e($ex->getLine()); ?>" class="language-php" data-src="plugins/line-highlight/prism-line-highlight.js"><code class="language-php"><?php echo e(file_get_contents($ex->getFile())); ?></code></pre>
<div class="container">
    <h3>View Variables</h3>
    <table>
        <tr>
            <th>Variable</th>
            <th>Value</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(($key!='context') && ($key!='view')): ?>
        <tr>
            <td><strong><?php echo e($key); ?></strong></td>
            <td>
                <?php vd($value) ?>
            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>
<div class="container">
    <h3>Stack Trace</h3>
    <table>
        <tr>
            <th>Trace</th>
            <th>Args</th>
        </tr>
        <?php $__currentLoopData = $ex->getTrace(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trace): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="white-space: nowrap;">
                <span style="font-size: 13px; font-family: Monaco, Consolas, monospace;">
                    <?php if(isset($trace["class"])): ?>
                        <?php echo e($trace['class']); ?><?php echo e($trace['type']); ?><?php echo e($trace['function']); ?>()
                    <?php else: ?>
                        <?php echo e($trace['function']); ?>()
                    <?php endif; ?>
                </span>
                <?php if(isset($trace['file'])): ?>
                in: <br>
                <span style="font-size: 13px; font-family: Monaco, Consolas, monospace;"><?php echo e(str_replace($wpath,'',$trace['file'])); ?></span>
                <?php endif; ?>
                <?php if(isset($trace['line'])): ?>
                @ <strong><?php echo e($trace['line']); ?></strong>
                <?php endif; ?>
            </td>
            <td>
               <?php vd($trace['args']) ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>
<script src="<?php echo e(ILAB_STEM_PUB_JS_URL); ?>/prism.js"></script>
</body>
</html><?php /**PATH /srv/www/clippy.test/current/web/app/mu-plugins/stem/views/error.blade.php ENDPATH**/ ?>