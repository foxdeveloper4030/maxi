<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8"/>
    <base href="<?php echo e(url('public')); ?>/" target="_self">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <title><?php echo e($product->name); ?></title>
<?php $product_id = $product->id; ?>
<!--     Fonts and icons     -->
    <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css"/>
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/now-ui-kit.css" rel="stylesheet"/>
    <link href="assets/css/plugins/owl.carousel.css" rel="stylesheet"/>
    <link href="assets/css/plugins/owl.theme.default.min.css" rel="stylesheet"/>
    <link href="assets/css/main.css" rel="stylesheet"/>
    <link href="assّets/css/product/mystyle.css" rel="stylesheet"/>

</head>
<body class="index-page sidebar-collapse">

<!-- responsive-header -->
<nav class="navbar direction-ltr fixed-top header-responsive">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="#pablo">
                <img src="assets/img/logo.png" height="24px" alt="">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            <div class="search-nav default">
                <form action="">
                    <input type="text" placeholder="جستجو ...">
                    <button type="submit"><img src="assets/img/search.png" alt=""></button>
                </form>
                <ul>
                    <li><a href="#"><i class="now-ui-icons users_single-02"></i></a></li>
                    <li><a href="#"><i class="now-ui-icons shopping_basket"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div class="logo-nav-res default text-center">
                <a href="#">
                    <img src="assets/img/logo.png" height="36px" alt="">
                </a>
            </div>
            <ul class="navbar-nav default">
                <li class="sub-menu">
                    <a href="#">کالای دیجیتال</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">لوازم جانبی گوشی</a>
                            <ul>
                                <li>
                                    <a href="#">کیف و کاور گوشی</a>
                                </li>
                                <li>
                                    <a href="#">پاور بانک</a>
                                </li>
                                <li>
                                    <a href="#">هندزفری،هدفون</a>
                                </li>
                                <li>
                                    <a href="#">پایه نگهدارنده گوشی</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">گوشی موبایل</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">آیفون اپل</a>
                                </li>
                                <li>
                                    <a href="#">هوآوی</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">ساعت هوشمند</a>
                        </li>
                        <li>
                            <a href="#">اسپیکر بلوتوث و با سیم</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">موبایل</a>
                            <ul>
                                <li>
                                    <a href="#">Apple</a>
                                </li>
                                <li>
                                    <a href="#">Asus</a>
                                </li>
                                <li>
                                    <a href="#">HTC</a>
                                </li>
                                <li>
                                    <a href="#">LG</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">آرایشی،بهداشت</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">لوازم جانبی گوشی</a>
                            <ul>
                                <li>
                                    <a href="#">کیف و کاور گوشی</a>
                                </li>
                                <li>
                                    <a href="#">پاور بانک</a>
                                </li>
                                <li>
                                    <a href="#">هندزفری،هدفون</a>
                                </li>
                                <li>
                                    <a href="#">پایه نگهدارنده گوشی</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">گوشی موبایل</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">آیفون اپل</a>
                                </li>
                                <li>
                                    <a href="#">هوآوی</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">ساعت هوشمند</a>
                        </li>
                        <li>
                            <a href="#">اسپیکر بلوتوث و با سیم</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">موبایل</a>
                            <ul>
                                <li>
                                    <a href="#">Apple</a>
                                </li>
                                <li>
                                    <a href="#">Asus</a>
                                </li>
                                <li>
                                    <a href="#">HTC</a>
                                </li>
                                <li>
                                    <a href="#">LG</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">خودرو،ابزار و اداری</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">لوازم جانبی گوشی</a>
                            <ul>
                                <li>
                                    <a href="#">کیف و کاور گوشی</a>
                                </li>
                                <li>
                                    <a href="#">پاور بانک</a>
                                </li>
                                <li>
                                    <a href="#">هندزفری،هدفون</a>
                                </li>
                                <li>
                                    <a href="#">پایه نگهدارنده گوشی</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">گوشی موبایل</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">آیفون اپل</a>
                                </li>
                                <li>
                                    <a href="#">هوآوی</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">ساعت هوشمند</a>
                        </li>
                        <li>
                            <a href="#">اسپیکر بلوتوث و با سیم</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">موبایل</a>
                            <ul>
                                <li>
                                    <a href="#">Apple</a>
                                </li>
                                <li>
                                    <a href="#">Asus</a>
                                </li>
                                <li>
                                    <a href="#">HTC</a>
                                </li>
                                <li>
                                    <a href="#">LG</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">مد و پوشاک</a>
                </li>
                <li>
                    <a href="#">خانه و آشپزخانه</a>
                </li>
                <li>
                    <a href="#">کتاب،لوازم تحریر</a>
                </li>
                <li>
                    <a href="#">ورزش و سفر</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- responsive-header -->

<div class="wrapper default">
    <!-- header -->
<?php if ($__env->exists('sub.myheader')) echo $__env->make('sub.myheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- header -->

    <!-- main -->

    <main class="single-product default">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="breadcrumb">
                            <li>
                                <a href="<?php echo e(route('urlMain')); ?>"><span><img alt="فروشگاه آنلاین موبایل maximorse" width="20" height="20" src="https://img.icons8.com/dusk/2x/home.png"></span></a>
                            </li>
                            <?php if(count($categories) > 0): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <a href="<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($catName)])); ?>">
                                            <img width="20" src="<?php echo e(url('public/img/left-arrow.png')); ?>">
                                            <?php echo e($catName); ?>

                                        </a>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                                <img width="20" src="<?php echo e(url('public/img/left-arrow.png')); ?>"><?php echo e($product->name); ?>


                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <article class="product">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-gallery default">
                                    <img class="zoom-img" id="img-product-zoom"
                                         src="<?php echo e((new App\PublicModel())->image_cover($product)); ?>"
                                         data-zoom-image="<?php echo e((new App\PublicModel())->image_cover($product)); ?>"
                                         width="411"/>

                                    <div id="gallery_01f" style="width:500px;float:left;">
                                        <ul class="gallery-items owl-carousel owl-theme" id="gallery-slider">

                                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="item">
                                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                                       data-image="<?php echo e((new App\PublicModel())->image_show($image)); ?>"
                                                       data-zoom-image="<?php echo e((new App\PublicModel())->image_show($image)); ?>">
                                                        <img src="<?php echo e((new App\PublicModel())->image_show($image)); ?>"
                                                             width="100"/></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>
                                <ul class="gallery-options">

                                    <li>
                                        <a class="add-favorites" href="<?php echo e(route('main.love.add',[$product->id])); ?>"><i
                                                    class="fa fa-heart"></i></a>
                                        <span class="tooltip-option">افزودن به علاقمندی</span>
                                    </li>

                                </ul>
                                <!-- Modal Core -->
                                <div class="modal-share modal fade" id="myModal" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">اشتراک گذاری</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-share">
                                                    <div class="form-share-title">اشتراک گذاری در شبکه های اجتماعی
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <ul class="btn-group-share">
                                                                <li><a href="#" class="btn-share btn-share-twitter"
                                                                       target="_blank"><i
                                                                                class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#" class="btn-share btn-share-facebook"
                                                                       target="_blank"><i
                                                                                class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"
                                                                       class="btn-share btn-share-google-plus"
                                                                       target="_blank"><i
                                                                                class="fa fa-google-plus"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="form-share-title">ارسال به ایمیل</div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="ui-input ui-input-send-to-email">
                                                                <input class="ui-input-field" type="email"
                                                                       placeholder="آدرس ایمیل را وارد نمایید.">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn-primary">ارسال</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-share-url default">
                                                    <div class="form-share-url-title">آدرس صفحه</div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="ui-url">
                                                                <input class="ui-url-field"
                                                                       value="https://www.digikala.com">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Core -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-title default">
                                    <h1>
                                        <?php echo e($product->name); ?>

                                    </h1>
                                </div>
                                <div class="product-directory default">
                                    <ul>

                                        <li>
                                            <span>دسته‌بندی</span> :
                                            <a class="btn-link-border">
                                                <?php echo e($product->category->name); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-delivery-seller default">
                                    <p>
                                        <i class="now-ui-icons shopping_shop"></i>
                                        <span>فروشنده:‌</span>
                                        <a href="<?php echo e(url('')); ?>" class="btn-link-border">ماکسی مورس</a>
                                    </p>
                                </div>
                                <?php if($type==0): ?>
                                    <?php
                                    $off = 0;
                                    if (isset($product->special))
                                        if ($product->special->expire > time()) {
                                            $price = $price - $product->special->price_off;
                                            $off = $product->special->price_off;
                                        }

                                    ?>
                                    <br>
                                    <div style="top: 100px;" class="price-product defualt">
                                        <div class="price-value">
                                            <span><?php echo e(number_format($price)); ?></span>
                                            <span class="price-currency">تومان</span>
                                        </div>

                                        <?php if(number_format($off*100/$product->price_main)>0): ?>
                                        <div class="price-discount" data-title="تخفیف">
                                            <span>
                                                <?php echo e(number_format($off*100/$product->price_main)); ?>

                                            </span>
                                            <span>%</span>
                                        </div>
                                            <?php endif; ?>
                                    </div>
                                    <br>
                                    <div class="product-add default">
                                        <div class="parent-btn">
                                            <?php if($count!=0): ?>
                                                <button onclick="simplecart()" class="dk-btn dk-btn-info">
                                                    افزودن به سبد خرید
                                                    <i class="now-ui-icons shopping_cart-simple"></i>
                                                </button>
                                            <?php else: ?>
                                                <a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
                                                    اتمام موجودی!
                                                    <i class="now-ui-icons show-less"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        <script>
                                            function simplecart(count = 1) {


                                                $(document).ready(function () {
                                                    loader_show();

                                                    $.post("<?php echo e(route('simpelcart')); ?>",
                                                        {
                                                            _token: "<?php echo e(csrf_token()); ?>",
                                                            id: "<?php echo e($product->id); ?>"
                                                        },
                                                        function (data, status) {

                                                            loader_dismis();

                                                            show_cart();

                                                            if (data['state']['status'] == true)
                                                                Swal.fire(
                                                                    ' ',
                                                                    'محصول با موفقیت به سبد خرید اضاف شد',
                                                                    'success'
                                                                );
                                                            else
                                                                Swal.fire({
                                                                    type: 'error',
                                                                    title: ' ',
                                                                    text: 'تعداد محصول بیشتر از موجودی می باشد',
                                                                });
                                                        });
                                                });
                                            }
                                        </script>
                                <?php else: ?>
                                   <?php echo $__env->make('front.product.selectAttribute', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 center-breakpoint">

                                <div class="product-params default">
                                    <ul data-title="ویژگی‌های محصول">
                                        <?php echo $product->details; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-12 default no-padding">
                        <div class="product-tabs default">
                            <div class="box-tabs default">
                                <ul class="nav" role="tablist">
                                    <li class="box-tabs-tab">
                                        <a class="active" data-toggle="tab" href="#desc" role="tab"
                                           aria-expanded="true">
                                            <i class="now-ui-icons objects_umbrella-13"></i> نقد و بررسی
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#params" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons shopping_cart-simple"></i> مشخصات
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#comments" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons shopping_shop"></i> نظرات کاربران
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#questions" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons ui-2_settings-90"></i> پرسش و پاسخ
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-body default">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="desc" role="tabpanel"
                                             aria-expanded="true">
                                            <article>
                                                <script type="text/javascript">
                                                    document.write("<base href='https://khanehmobile.com/img/p' />");
                                                </script>
                                                <h2 class="param-title">
                                                    نقد و بررسی تخصصی
                                                    <span><?php echo e($product->name); ?></span>
                                                </h2>
                                                <div class="parent-expert default">
                                                    <?php echo $product->description; ?>

                                                </div>

                                            </article>
                                        </div>
                                        <div class="tab-pane fade params" id="params" role="tabpanel"
                                             aria-expanded="false">
                                            <article>
                                                <h2 class="param-title">
                                                    مشخصات فنی
                                                    <span><?php echo e($product->name); ?></span>
                                                </h2>
                                                <section>

                                                    <ul class="params-list">
                                                        <?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <li>
                                                                <div class="params-list-key">
                                                                    <span class="block"><?php echo e($feature->feature); ?></span>
                                                                </div>
                                                                <div class="params-list-value">
                                                                    <span class="block">
                                                                   <?php echo e($feature->value); ?>

                                                                    </span>
                                                                </div>
                                                            </li>


                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </section>
                                            </article>
                                        </div>
                                        <div class="tab-pane fade" id="comments" role="tabpanel" aria-expanded="false">
                                            <article>
                                                <h2 class="param-title">
                                                    نظرات کاربران
                                                    <span><?php echo e(count($product->comments->where('deleted','=',0))); ?></span>
                                                </h2>
                                                <div class="comments-area default">
                                                    <ol class="comment-list">
                                                    <?php $__empty_1 = true; $__currentLoopData = $product->comments->where('deleted','=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <!-- #comment-## -->
                                                            <li>
                                                                <div class="comment-body">
                                                                    <div class="comment-author">
                                                                        <img alt="" src="assets/img/default-avatar.png"
                                                                             class="avatar"><cite
                                                                                class="fn"><?php echo e(\App\User::query()->find($comment->user_id)->firstname); ?></cite>
                                                                        <span class="says">گفت:</span></div>

                                                                    <div class="commentmetadata"><a>
                                                                            <?php echo e($comment->created_at); ?></a></div>

                                                                    <p><?php echo e($comment->message); ?></p>


                                                                </div>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <div class="alert alert-info">
                                                                هنوز نظری در مورد این محصول وجود ندارد اولین نفری باشید
                                                                که در مورد محصول نظر میدهید.
                                                            </div>
                                                            <!-- #comment-## -->
                                                        <?php endif; ?>

                                                    </ol>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="tab-pane fade form-comment" id="questions" role="tabpanel"
                                             aria-expanded="false">
                                            <?php if(auth()->guard()->check()): ?>
                                                <article>
                                                    <h2 class="param-title">
                                                        افزودن نظر
                                                        <span>نظر خود را در مورد محصول مطرح نمایید</span>
                                                    </h2>
                                                    <form method="post"
                                                          action="<?php echo e(route('main.product.comment')); ?>/<?php echo e($product->id); ?>"
                                                          class="comment">
                                                        <?php echo csrf_field(); ?>
                                                        <textarea name="message" class="form-control" placeholder="نظر"
                                                                  rows="5"></textarea>
                                                        <button class="btn btn-default">ارسال نظر</button>
                                                    </form>
                                                </article>
                                            <?php else: ?>
                                                برای ارسال نظر ابتدا وارد <a class="btn-link-border form-account-link"
                                                                             href="<?php echo e(route('login')); ?>">پنل کاربری</a>
                                                خود شوید.
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-10">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <h3 class="card-title">
                            <?php  $category = \App\Category::query()->find($product->category_id);?>
                            <span>محصولات مرتبط</span>
                        </h3>
                        <a href="<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])); ?>"
                           class="view-all">مشاهده همه</a>

                    </header>
                    <div class="product-carousel owl-carousel owl-theme">

                        <?php $__currentLoopData = \App\Product::query()->orWhere('price_main','>',1000)->where('category_id','=',$category->id)->orderByDesc('id')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item" style="max-width: 300px;">
                                <a href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>">
                                    <img style="max-height: 200px"
                                         src="<?php echo e((new \App\PublicModel())->image_cover($product,1)); ?>"
                                         class="img-fluid" alt="">
                                </a>
                                <h2 class="post-title">
                                    <a href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>"><?php echo e($product->name); ?></a>
                                </h2>
                                <div class="price">
                                    <?php if((new \App\Model\ProductModel($product->id))->specialcost()!=0): ?>
                                        <div class="text-center">
                                            <del><span><?php echo e(number_format($product->price_main)); ?><span>تومان</span></span>
                                            </del>
                                        </div>
                                        <div class="text-center">
                                            <ins><span><?php echo e(number_format((new \App\Model\ProductModel($product->id))->specialcost())); ?><span>تومان</span></span>
                                            </ins>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-center">
                                            <ins><span><?php echo e(number_format($product->price_main)); ?><span>تومان</span></span>
                                            </ins>
                                        </div>


                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </main>
    <!-- main -->

    <!-- footer -->
<?php if ($__env->exists('sub.myfooter')) echo $__env->make('sub.myfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- footer -->
    <div id="loader" style="display: none">
        <div style="width: 100%;position: fixed;height: 100%;background-color: black;z-index: 10000;opacity: .5;">

        </div>

        <div id="myModal" style="display: block;z-index: 10000;margin-top: 200px" class="modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div style="background-color: transparent">


                    <div class="modal-body" style="text-align: center">
                        <img width="100" src="<?php echo e(url('')); ?>/public/gifs/shopping-cart.svg">
                        <br>
                        <img src="<?php echo e(\App\PublicModel::Mainloader()); ?>">
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

</body>

<script>


    function loader_show() {
       document.getElementById('loader').style.display = 'block';
    }

    function loader_dismis() {
        document.getElementById('loader').style.display = 'none';
    }


</script>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/now-ui-kit.js" type="text/javascript"></script>
<!--  CountDown -->
<script src="assets/js/plugins/countdown.min.js" type="text/javascript"></script>
<!--  Plugin for Sliders -->
<script src="assets/js/plugins/owl.carousel.min.js" type="text/javascript"></script>
<!--  Jquery easing -->
<script src="assets/js/plugins/jquery.easing.1.3.min.js" type="text/javascript"></script>
<!--  Plugin ez-plus -->
<script src="assets/js/plugins/jquery.ez-plus.js" type="text/javascript"></script>
<!--  LocalSearch -->
<script src="assets/js/plugins/JsLocalSearch.js" type="text/javascript"></script>
<!-- Main Js -->
<script src="assets/js/main.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function delete_cart(id,item=-1) {
        $(document).ready(function () {
            loader_show();
            $.post("<?php echo e(route('simpelcart')); ?>",
                {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id: id,
                    index: item,
                    count: -1
                },
                function (data, status) {
                    loader_dismis();

                    show_cart();
                    Swal.fire(
                        ' ',
                        'محصول از سبد خرید شما حذف شد!',
                        'success'
                    );

                });
        });
    }
    proajax();

    $(document).ready(function () {

        function createStatusNewsletterOfElement(idDiv, textColor, backGroundColor, msgText) {
            let div = document.createElement("div");
            div.style.cssText = 'color: ' + textColor + ';background-color: ' + backGroundColor + ';margin-top: 1%';
            div.className = 'alert';
            div.setAttribute('id', idDiv)

            let aTag = document.createElement("a");
            aTag.style.cssText = 'cursor: none';
            aTag.className = 'alert-link';
            let node = document.createTextNode(msgText);
            aTag.appendChild(node);

            div.appendChild(aTag);

            document.getElementById('newsletter').appendChild(div);
        }

        $('#newsletter').on('submit', function (e) {
            e.preventDefault();
            let url_ = $(this).attr('data-url');
            $.ajax({
                type: "POST",
                url: url_,
                data: $(this).serialize(),
                success: function (data) {
                    // console.table(data);
                    // debugger;

                    if (data.statusNewsletterNo) {
                        let elementduplicate = document.getElementById('notLoginUser');
                        if (elementduplicate == null) {
                            createStatusNewsletterOfElement('notLoginUser', '#721c24', '#f8d7da', 'ابتدا ثبت نام کنید، یا وارد سایت شوید.')
                        }
                    } else if (data.statusNewsletterYes) {
                        let elementduplicate = document.getElementById('newsLetterYes');
                        if (elementduplicate == null) {
                            createStatusNewsletterOfElement('newsLetterYes', '#155724', '#d4edda', 'ایمیل شما در خبرنامه، ثبت گردید.')
                        }
                    } else if (data.statusNewsletterHasOK) {
                        let elementduplicate = document.getElementById('newsLetterHasOK');
                        if (elementduplicate == null) {
                            createStatusNewsletterOfElement('newsLetterHasOK', '#0c5460', '#d1ecf1', 'قبلا، در خبرنامه عضو شده اید!')
                        }
                    }
                    $('#guideCheckboxNewsletter').css('top', '12%');
                }, error: function (error) {
                    // swal("", "تغییرات انجام نشد.", "error");
                }
            })
        });  // end of delete image
    });//  end of jquery

</script>
</html>
<?php /**PATH C:\xampp\htdocs\arsi\resources\views/front/show_product_main.blade.php ENDPATH**/ ?>