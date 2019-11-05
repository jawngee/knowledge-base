<!DOCTYPE html>
<html <?php echo e(language_attributes()); ?> lang="en">
    <head>
        <?php echo $__env->make('partials.analytics-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <meta charset="<?php echo e(bloginfo( 'charset' )); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="distribution" content="global" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#FC5047s">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        
        <?php echo Stem\Core\Context::current()->ui->header(); ?>
        
        <?php echo $__env->yieldContent('head'); ?>
    </head>
    <body class="<?php echo e((getenv('WP_ENV')=='development') ? 'debug' : ''); ?> <?php echo e((!is_front_page()) ? 'other-page' : ''); ?> <?php echo $__env->yieldContent('body-classes'); ?>">
        <?php echo $__env->make('partials.analytics-body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="breakpoints"></div>
        
        <div id="breakpoint-debug"></div>
        <header>
            <div class="contents">
                <div class="logo"><a href="/"><?php echo Stem\External\Blade\Directives\InlineSVGDirective::InlineSVG('logo-mc.svg'); ?></a></div>
                <div class="nav">
                    <nav>
                        <?php echo Stem\External\Blade\Directives\FlatMenuDirective::OutputFlatMenu('primary'); ?>
                    </nav>
                    <a href="https://mediacloud.press/pricing" class="button">Purchase Now</a>
                </div>
                <a href="#" class="hamburger local">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </header>

        <?php echo $__env->yieldContent('before-main'); ?>

        <main>
            <?php echo $__env->yieldContent('main'); ?>
        </main>

        <?php echo $__env->yieldContent('after-main'); ?>

        <footer>
            <div class="contents">
                <div class="mark">
                    <div class="logo"><?php echo Stem\External\Blade\Directives\InlineSVGDirective::InlineSVG('logo-mc.svg'); ?></div>
                    <nav>
                        <?php echo Stem\External\Blade\Directives\FlatMenuDirective::OutputFlatMenu('social'); ?>
                    </nav>
                </div>
                <div class="primary">
                    <nav>
                        <?php echo Stem\Core\Context::current()->ui->menu('footer',false,false,'',false); ?>
                    </nav>
                </div>
            </div>
            <div class="copyright">
                &copy; <?php echo e(date('Y')); ?> interfacelab LLC, all rights reserved.
            </div>
        </footer>

        
        <?php echo Stem\Core\Context::current()->ui->footer(); ?>

        
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html><?php /**PATH /srv/www/kb.mediacloud.press/current/web/app/themes/clippy/views/layouts/page.blade.php ENDPATH**/ ?>