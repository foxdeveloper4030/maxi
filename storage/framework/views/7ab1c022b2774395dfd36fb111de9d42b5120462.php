<?php $__env->startSection('meta'); ?>
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo $page->title; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .account-box1 {
            background: #fff;
            margin: 10px auto 30px auto;
            border: 1px solid #dedede;
            box-shadow: 0 12px 12px 0 hsla(0, 0%, 71%, .11);
            position: relative;
        }

        .account-box-title1 {
            border-bottom: 1px solid #ececec;
            color: #656565;
            padding: 17px 50px 5px 30px;
            font-size: 18px;
            font-weight: bold;
        }

        .breadcrumb li:not(:last-child):after {
            content: "/";
            color: #cfcfcf;
            letter-spacing: 0.4px;
            font-size: 13px;
            vertical-align: middle;
            margin-left: 7px;
            padding-right: 5px;
            font-weight: 400 !important;
        }

        .breadcrumb li:hover a {
            color: #00bfd6 !important;
        }

        .page-title {
            font-size: 40px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Breadcrumbs -->
    <div class="row">
        <div class="col-12">
            <nav>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo e(route('urlMain')); ?>"><span>خانه</span></a>
                    </li>
                    <li>
                        <span><?php echo e($page->title); ?></span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="main-content col-12 col-md-12 col-lg-12 mx-auto">
            <a href="<?php echo e(route('urlMain')); ?>" class="logo"
               style="margin: 2% auto 0 auto;width: 200px; display: block;">
                <img src="<?php echo e(asset('public/assets/img/logo.jpg')); ?>" alt="logo">
            </a>
            <div class="page-title account-box-title1 text-center"><?php echo e($page->title); ?></div>
            <div class="account-box1 col-12 col-md-10 col-lg-10 mx-auto">
                <div class="account-box-content">
                    <div class="account-box-message">
                        <h3 style="font-size: 15px"><?php echo e($page->title2); ?></h3>
                        <img class="col-12" src="<?php echo e(asset('public/assets/img/about_bg.jpg')); ?>" alt="logo">
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-expanded="true">
                            <article>
                                <div class="parent-expert">
                                    <div class="content-expert" id="alterHeigthToMinHeigth">
                                        <p><?php echo e($page->body); ?></p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        function alterHeigthToMinHeigth() {
            let el = document.getElementById('alterHeigthToMinHeigth');
            el.style.height = 'auto';
            el.style.minHeight = '250px';
            console.log('hi');
        }

        alterHeigthToMinHeigth();
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/front/page.blade.php ENDPATH**/ ?>