<div class="settings-container">
    <header class="all-settings">
        <img src="<?php echo e(ILAB_PUB_IMG_URL); ?>/icon-cloud-w-type.svg">
        <div class="settings-select-container">
            <nav class="dropdown">
                <div>Settings:</div>
                <div class="dropdown">
                    <div class="current">
                        <?php if($tool->enabled()): ?>
                            <span class="tool-indicator tool-active"></span>
                        <?php elseif($tool->envEnabled()): ?>
                            <span class="tool-indicator tool-env-active"></span>
                        <?php else: ?>
                            <span class="tool-indicator tool-inactive"></span>
                        <?php endif; ?>
                        <?php echo e($tool->toolInfo['name']); ?>

                    </div>
                    <div class="items">
                        <ul>
                            <?php $__currentLoopData = $tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $atool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($atool->toolInfo['settings'])): ?>
                                    <li class="<?php echo e(($tab == $key) ? 'active' : ''); ?>">
                                        <a class="tool" href="<?php echo e(ilab_admin_url('admin.php?page=media-cloud-settings&tab='.$key)); ?>">
                                            <?php if($atool->enabled()): ?>
                                                <span class="tool-indicator tool-active"></span>
                                            <?php elseif($atool->envEnabled()): ?>
                                                <span class="tool-indicator tool-env-active"></span>
                                            <?php else: ?>
                                                <span class="tool-indicator tool-inactive"></span>
                                            <?php endif; ?>
                                            <?php echo e($atool->toolInfo['name']); ?>

                                        </a>
                                        <a title="Pin these settings to the admin menu." data-tool-name="<?php echo e($atool->toolName); ?>" data-tool-title="<?php echo e($atool->toolInfo['name']); ?>" class="tool-pin <?php echo e(($atool->pinned()) ? 'pinned' : ''); ?>" href="#"></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="settings-body <?php if (\ILAB\MediaCloud\Utilities\LicensingManager::ActivePlan('free')): ?> show-upgrade <?php endif; ?>">
        <div class="settings-interior">
            <div class="ilab-notification-container"></div>
            <?php if (is_multisite() && \ILAB\MediaCloud\Utilities\Environment::NetworkMode()): ?>
            <form action='edit.php?action=update_media_cloud_network_options' method='post' autocomplete="off">
            <?php else: ?>
            <form action='options.php' method='post' autocomplete="off">
            <?php endif; ?>
                <?php
                settings_fields( $group );
                ?>
                <?php if(empty($tool->toolInfo['exclude'])): ?>
                <div class="ilab-settings-section ilab-settings-toggle">
                    <table class="form-table">
                        <tr>
                            <th scope="row">Enable <?php echo e($tool->toolInfo['name']); ?></th>
                            <td>
                                <?php echo $__env->make('base/fields/enable-toggle', ['name' => $tab, 'manager' => $manager, 'tool' => $tool], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </td>
                        </tr>
                        <?php if(!empty($tool->toolInfo['related'])): ?>
                        <?php $__currentLoopData = $tool->toolInfo['related']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(empty($manager->tools[$relatedKey])): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <?php if($loop->first): ?>
                            <tr>
                                <td colspan="2" style="width:100%; padding: 0;"><hr></td>
                            </tr>
                            <?php endif; ?>
                            <?php $relatedTool = $manager->tools[$relatedKey]; ?>
                            <tr>
                                <th scope="row">Enable <?php echo e($relatedTool->toolInfo['name']); ?></th>
                                <td>
                                    <?php echo $__env->make('base/fields/enable-toggle', ['name' => $relatedTool->toolInfo['id'], 'manager' => $manager, 'tool' => $relatedTool], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                </div>
                <?php endif; ?>
                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a name="<?php echo e(sanitize_title($section['title'])); ?>"></a>
                <div class="ilab-settings-section">
                    <?php if(!empty($section['title'])): ?>
                    <h2>
                        <?php echo e($section['title']); ?>

                        <?php if(!empty($section['doc_beacon'])): ?>
                            <a href="#" class="help-beacon" data-beacon-article-inline="<?php echo e($section['doc_beacon']); ?>">
                                Help
                            </a>
                        <?php endif; ?>
                        <?php if(!empty($section['help']) && !empty($section['help']['data']) && (\ILAB\MediaCloud\Utilities\arrayPath($section['help'], 'target', 'footer') == 'header')): ?>
                            <div class="ilab-section-title-doc-links">
                                <?php echo $__env->make('base.fields.help', $section['help'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endif; ?>
                    </h2>
                    <?php endif; ?>
                    <?php if(!empty($section['description'])): ?>
                    <div class="section-description"><?php echo $section['description']; ?></div>
                    <?php endif; ?>
                    <table class="form-table">
                        <?php do_settings_fields( $page, $section['id'] ) ?>
                    </table>
                    <?php if(!empty($section['help']) && !empty($section['help']['data']) && (\ILAB\MediaCloud\Utilities\arrayPath($section['help'], 'target', 'footer') == 'footer')): ?>
                        <div class="ilab-section-doc-links">
                            <?php echo $__env->make('base.fields.help', $section['help'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="ilab-settings-button">
                    <?php if(!empty($tool->actions())): ?>
                        <div class="ilab-settings-batch-tools">
                            <?php $__currentLoopData = $tool->actions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="button ilab-ajax-button" data-ajax-action="<?php echo e(str_replace('-','_',$key)); ?>" data-ajax-nonce="<?php echo e(wp_create_nonce(str_replace('-','_',$key))); ?>" href="#"><?php echo e($action['name']); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <?php submit_button(); ?>
                </div>
            </form>
        </div>
        <?php if (\ILAB\MediaCloud\Utilities\LicensingManager::ActivePlan('free')): ?>
        <?php echo $__env->make('base/upgrade', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>


    <?php echo $__env->make('support.beacon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<script>
    (function($){
        $('[data-conditions]').each(function(){
            var parent = this.parentElement;
            while (parent.tagName.toLowerCase() != 'tr') {
                parent = parent.parentElement;
                if (!parent) {
                    return;
                }
            }
            var name = this.getAttribute('id').replace('setting-','');
            var conditions = JSON.parse($('#'+name+'-conditions').html());

            var conditionTest = function() {
                var match = false;
                Object.getOwnPropertyNames(conditions).forEach(function(prop){
                    var val = $('#'+prop).val();

                    var trueCount = 0;
                    conditions[prop].forEach(function(conditionVal){
                        if (conditionVal[0] == '!') {
                            conditionVal = conditionVal.substring(1);
                            if (val != conditionVal) {
                                trueCount++;
                            }
                        } else {
                            if (val == conditionVal) {
                                trueCount++;
                            }
                        }
                    });

                    if (trueCount>0) {
                        match = true;
                    } else {
                        match = false;
                    }
                });

                return match;
            };

            if (!conditionTest()) {
                parent.style.display = 'none';
            }

            Object.getOwnPropertyNames(conditions).forEach(function(prop){
                $('#'+prop).on('change', function(e){
                    if (!conditionTest()) {
                        parent.style.display = 'none';
                    } else {
                        parent.style.display = '';
                    }
                });
            });
        });

        $('#ilab-media-settings-nav').on('change', function(e){
           document.location = $(this).val();
        });

        $('a.ilab-ajax-button').on('click', function(e){
            e.preventDefault();

            const data={
                action: $(this).data('ajax-action'),
                nonce: $(this).data('ajax-nonce')
            };

            $.post(ajaxurl, data, function(response){
                if (response.hasOwnProperty('message')) {
                    alert(response.message);
                } else {
                    document.location.reload();
                }
            });

            return false;
        });

        $('nav.dropdown').each(function(){
            var dropdown = $(this);
            var current = dropdown.find('div.current');
            var items = dropdown.find('div.items');
            current.on('click', function(e) {
               e.preventDefault();
               dropdown.addClass('active');
               items.addClass('visible');
               items.on('mouseleave', function(){
                   items.removeClass('visible');
                   dropdown.removeClass('active');
               });
               return false;
           });
        });

        var currentLabels = [];
        var lastPinnedItems = [];
        var menu = $('#toplevel_page_media-cloud');
        var menuUL = menu.find('ul');
        var firstItem = menuUL.find('li.wp-first-item').next();
        var pinnedSeparator = null;

        firstItem.next().next().find('span.ilab-admin-separator-settings').each(function(){
            if (pinnedSeparator == null) {
                pinnedSeparator = firstItem.next().next();
            }
        });

        $('a.tool-pin').each(function(){
            var pin = $(this);
            var pinToolName = pin.data('tool-name');
            var pinToolTitle = pin.data('tool-title');
            var pinItem = null;

            menuUL.find('li').each(function(){
               var item = $(this);
               item.find('a').each(function(){
                   currentLabels.push($(this).text());

                   const regex = /\page\=media\-cloud\-settings\-(.*)\&pinned=true$/gm;
                   var m = regex.exec($(this).attr('href'));
                   if ((m != null) && (m.length > 1)) {
                       var tool = m[m.length - 1];
                       if (tool == pinToolName) {
                           pinItem = item;
                           lastPinnedItems.push(pinItem);
                       }
                   }
               });
            });

            pin.on('click', function(e) {
                e.preventDefault();

                const data={
                    action: 'ilab_pin_tool',
                    tool: pinToolName
                };

                $.post(ajaxurl, data, function(response){
                    if (response.status == 'error') {
                        console.log(response);
                        return;
                    }

                    var pinned = (response.status == 'pinned');
                    if (!pinned) {
                        if (lastPinnedItems.indexOf(pinItem) >= 0) {
                            lastPinnedItems.splice(lastPinnedItems.indexOf(pinItem), 1);
                        }

                        if (pinItem) {
                            pinItem.remove();
                            pinItem = null;
                        }

                        pin.removeClass('pinned');
                    } else {
                        pin.addClass('pinned');

                        if (currentLabels.indexOf(pinToolTitle) != -1) {
                            return;
                        }

                        pinItem = $('<li id="pinned-tool-'+pinToolName+'"><a href="admin.php?page=media-cloud-settings-'+pinToolName+'" aria-current="page">'+pinToolTitle+'</a></li>');

                        if (lastPinnedItems.length > 0) {
                            pinItem.insertAfter(lastPinnedItems[lastPinnedItems.length - 1]);
                        } else {
                            pinItem.insertAfter(pinnedSeparator);
                        }

                        lastPinnedItems.push(pinItem);
                    }
                });


                return false;
            });
        });
    })(jQuery);
</script><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/plugins/ilab-media-tools/views/base/settings.blade.php ENDPATH**/ ?>