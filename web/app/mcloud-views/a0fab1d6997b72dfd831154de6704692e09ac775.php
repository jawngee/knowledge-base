<?php if($imgixEnabled && !isset($topLevel)): ?>
<div class="info-line info-notice">
    You are using Imgix which handles generating all of the additional sizes of images.
</div>
<div class="links-row">
    <a href="<?php echo e($publicUrl); ?>" target="_blank"><span class="dashicons dashicons-external"></span>Public URL</a>
</div>
<?php elseif(!$uploaded): ?>
<div class="info-line">
Not uploaded.
</div>
<?php else: ?>
<div class="info-line">
	<h3>Dimensions</h3>
	<?php echo e($width); ?> x <?php echo e($height); ?>

</div>
<div class="info-line">
    <h3>Storage Service</h3>
    <?php echo e($driverName); ?>

</div>
<div class="info-line">
	<h3>Bucket</h3>
    <?php if($bucketLink): ?>
	<a href="<?php echo e($bucketLink); ?>" target="_blank"><?php echo e($bucket); ?></a>
    <?php else: ?>
    <?php echo e($bucket); ?>

    <?php endif; ?>
</div>
<div class="info-line">
	<h3>Path</h3>
    <?php if($pathLink): ?>
    <a href="<?php echo e($pathLink); ?>" target="_blank"><?php echo e($key); ?></a>
    <?php else: ?>
    <?php echo e($key); ?>

    <?php endif; ?>
</div>
<?php if(!$isSize): ?>
<div class="info-line">
    <label for="s3-access-acl">Access</label>
    <?php echo e($privacy); ?>

</div>
<div class="info-line">
    <label for="s3-cache-control">Cache-Control</label>
    <?php echo e((empty($cacheControl)) ? 'None' : $cacheControl); ?>

</div>
<div class="info-line">
    <label for="s3-expires">Expires</label>
    <?php echo e((empty($expires)) ? 'None' : $expires); ?>

</div>
<?php if($readOnly): ?>
<?php else: ?>
<div class="info-line">
	<label for="s3-access-acl">Access</label>
	<select id="s3-access-acl" name="s3-access-acl">
		<option value="public-read" <?php echo e(($privacy == 'public-read') ? 'selected' : ''); ?>>
		Public
		</option>
		<option value="authenticated-read" <?php echo e(($privacy == 'authenticated-read') ? 'selected' : ''); ?>>
		Authenticated Users
		</option>
	</select>
</div>
<div class="info-line">
	<label for="s3-cache-control">Cache-Control</label>
	<input type="text" class="widefat" name="s3-cache-control" id="s3-cache-control" value="<?php echo e($cacheControl); ?>">
</div>
<div class="info-line">
	<label for="s3-expires">Expires</label>
	<input type="text" class="widefat" name="s3-expires" id="s3-expires" value="<?php echo e($expires); ?>">
</div>
<?php endif; ?>
<?php endif; ?>
<div class="links-row">
	<a href="<?php echo e($url); ?>" target="_blank"><span class="dashicons dashicons-external"></span>Storage URL</a>
	<?php if(!empty($publicUrl) && ($publicUrl != $url)): ?>
	<a href="<?php echo e($publicUrl); ?>" target="_blank"><span class="dashicons dashicons-external"></span>Public URL</a>
	<?php endif; ?>
</div>
<?php endif; ?><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/plugins/ilab-media-tools/views/storage/info-file-info.blade.php ENDPATH**/ ?>