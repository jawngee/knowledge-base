<?php if($readOnly): ?>
<h2>Storage Info</h2>
<?php endif; ?>
<div class="info-panel-tabs">
    <ul>
        <li data-tab-target="info-panel-tab-original" class="active">Original File</li>
        <li data-tab-target="info-panel-tab-sizes" class="<?php echo e((count($missingSizes)>0) ? 'info-panel-missing-sizes' : ''); ?>">Other Sizes (<?php echo e(count($sizes)); ?>)</li>
    </ul>
</div>
<div class="info-panel-contents">
    <div id="info-panel-tab-original">
        <div class="info-file-info">
	        <?php echo $__env->make('storage/info-file-info', [
		        'uploaded' => 1,
		        'bucket' => $bucket,
		        'postId' => $postId,
		        'key' => $key,
		        'privacy' => $privacy,
		        'cacheControl' => $cacheControl,
		        'expires' => $expires,
		        'url' => $url,
		        'publicUrl' => $publicUrl,
                'width' => $width,
                'height' => $height,
		        'driverName' => $driverName,
		        'bucketLink' => $bucketLink,
		        'pathLink' => $pathLink,
                'readOnly' => $readOnly,
                'isSize' => false,
                'topLevel' => true,
                'imgixEnabled' => $imgixEnabled
	        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>
    <div id="info-panel-tab-sizes" style="display: none;">
        <div class="info-line info-size-selector">
            <label for="ilab-other-sizes">WordPress Size</label>
            <select id="ilab-other-sizes" name="ilab-other-sizes">
                <?php if(count($missingSizes) == 0): ?>
                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>"><?php echo e($size['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <optgroup label="Existing Sizes">
                    <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($size['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
                <optgroup label="Missing Sizes">
                    <?php $__currentLoopData = $missingSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" disabled><?php echo e($name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
                <?php endif; ?>
            </select>
        </div>
        <?php $firstSize = true; ?>
        <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="info-size-<?php echo e($key); ?>" class="info-file-info info-file-info-size" style="<?php echo e((!$firstSize) ? 'display:none': ''); ?>">
            <?php echo $__env->make('storage/info-file-info', $size, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php $firstSize = false; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php if(!$imgixEnabled && $enabled): ?>
    <div class="button-row">
        <a data-post-id="<?php echo e($postId); ?>" data-imgix-enabled="<?php echo e(($imgixEnabled) ? 'true': 'false'); ?>" href="#" class="ilab-info-regenerate-thumbnails button button-warning button-small">Regenerate Image</a>
        <div id="ilab-info-regenerate-status" style="display:none;"><div class="spinner is-active"></div>Regenerating ...</div>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/plugins/ilab-media-tools/views/storage/info-panel.blade.php ENDPATH**/ ?>