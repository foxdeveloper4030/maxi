

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    404
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- main -->
    <main class="page-404">
        <div class="container text-center">
            <div class="page-404-title">
                <h1>صفحه‌ای که دنبال آن بودید پیدا نشد!</h1>
            </div>
            <div class="page-404-actions">
                <a href="<?php echo e(route('urlMain')); ?>" class="page-404-action page-404-action--primary">صفحه اصلی</a>
            </div>
            <div class="page-404-image">
                <img src="<?php echo e(asset('public/assets/img/404.png')); ?>">
            </div>
        </div>
    </main>
    <!-- main -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/errors/404.blade.php ENDPATH**/ ?>