function mcloudHeartbeat() {
    jQuery.post(ajaxurl, { 'action': 'mcloud_task_heartbeat'});
    setTimeout(mcloudHeartbeat, <?php echo e($heartbeatFrequency); ?>);
}

document.addEventListener('DOMContentLoaded', function(){
    mcloudHeartbeat();
});<?php /**PATH /srv/www/clippy.test/current/web/app/plugins/ilab-media-tools/views/base/heartbeat.blade.php ENDPATH**/ ?>