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
    <style>
        ul.categoryHover li.list-item-has-children:hover {
            transition: all 300ms ease;
            border: 1px solid #dadada !important;
        }

        ul.categoryHover li.list-item-has-children:hover a {
            transition: all 300ms ease;
            color: #ef5661 !important;
        }

        div.dropdown-item > a:hover > i {
            transition: all 200ms ease;
            color: #00bfd6;
        }

        ::placeholder {
            text-align: center !important;
            opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            text-align: center !important;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            text-align: center !important;
        }

        /*Check box newsletter* ==================================/
        /* The container */
        .containerCheckbox > input {
            opacity: 0;
            position: absolute;
            z-index: -1;
        }

        .containerCheckbox > input:checked + label {
            color: #00bfd6;
        }

        .containerCheckbox > input:checked + label::before {
            background: rgba(136, 237, 249, 0.25);
            border-color: #00bfd6;
        }

        .containerCheckbox > input:checked + label::after {
            transform: scale(1) rotate(-45deg);
        }

        div > input:checked + label a {
            text-decoration: underline;
        }

        .containerCheckbox > label {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: all 0.1s;
            right: 65%;
            top: -10px;
        }

        .containerCheckbox > label::before {
            background-color: white;
            border: 1px solid #d7dee0;
            /*border-radius: calc(3px + 0.05em);*/
            content: "";
            display: inline-block;
            font-size: 1.1em;
            height: calc(3px + 0.8em);
            margin-right: calc(4px + 0.4em);
            transition: all 0.1s;
            vertical-align: middle;
            width: calc(3px + 0.8em);
        }

        .containerCheckbox > label::after {
            border-bottom: calc(2px + 0.07em) solid #00bfd6;
            border-left: calc(2px + 0.07em) solid #00bfd6;
            content: "";
            font-size: 1.1em;
            height: calc(3px + 0.22em);
            left: calc(0.25em - 1px);
            position: absolute;
            top: calc(50% - 0.1em - 3px);
            transform: scale(0) rotate(-45deg);
            transition: all 0.1s;
            width: calc(5px + 0.32em);
        }

        /*End of Check box newsletter*/


        /*for tooltip*/

        [data-tooltip-text]:hover {
            transition: all 500ms ease;
            position: relative;
        }

        [data-tooltip-text]:hover:after {
            /*background-color: rgba(0, 0, 0, 0.8);*/
            background-color: rgba(192, 230, 236, 0.6);
            width: auto;
            min-width: 150px;
            max-width: 300px;
            word-wrap: break-word;
            -webkit-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            -moz-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);


            color: #515151;
            font-size: 12px;
            content: attr(data-tooltip-text);

            margin-bottom: 5px;
            top: 130%;
            left: 0;
            padding: 5px 12px;
            position: absolute;

            z-index: 9999;
        }

        /*end of tooltip*/

        .breadcrumb li:hover a{
            color: #00bfd6!important;
        }
    </style>
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
                    <input type="text" placeholder="?????????? ...">
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
                    <a href="#">?????????? ??????????????</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">?????????? ?????????? ????????</a>
                            <ul>
                                <li>
                                    <a href="#">?????? ?? ???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">??????????????????????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ?????????????????? ????????</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">???????? ????????????</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">?????????? ??????</a>
                                </li>
                                <li>
                                    <a href="#">??????????</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">???????? ????????????</a>
                        </li>
                        <li>
                            <a href="#">???????????? ???????????? ?? ???? ??????</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">????????????</a>
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
                    <a href="#">??????????????????????????</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">?????????? ?????????? ????????</a>
                            <ul>
                                <li>
                                    <a href="#">?????? ?? ???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">??????????????????????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ?????????????????? ????????</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">???????? ????????????</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">?????????? ??????</a>
                                </li>
                                <li>
                                    <a href="#">??????????</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">???????? ????????????</a>
                        </li>
                        <li>
                            <a href="#">???????????? ???????????? ?? ???? ??????</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">????????????</a>
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
                    <a href="#">?????????????????????? ?? ??????????</a>
                    <ul>
                        <li class="sub-menu">
                            <a href="#">?????????? ?????????? ????????</a>
                            <ul>
                                <li>
                                    <a href="#">?????? ?? ???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ????????</a>
                                </li>
                                <li>
                                    <a href="#">??????????????????????????</a>
                                </li>
                                <li>
                                    <a href="#">???????? ?????????????????? ????????</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">???????? ????????????</a>
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#">?????????? ??????</a>
                                </li>
                                <li>
                                    <a href="#">??????????</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">???????? ????????????</a>
                        </li>
                        <li>
                            <a href="#">???????????? ???????????? ?? ???? ??????</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#">????????????</a>
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
                    <a href="#">???? ?? ??????????</a>
                </li>
                <li>
                    <a href="#">???????? ?? ????????????????</a>
                </li>
                <li>
                    <a href="#">???????????????????? ??????????</a>
                </li>
                <li>
                    <a href="#">???????? ?? ??????</a>
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
                                <a href="<?php echo e(route('urlMain')); ?>"><span>????????</span></a>
                            </li>
                            <?php if(count($categories) > 0): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($catName)])); ?>">
                                            <span><?php echo e($catName); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <li>
                                <span><?php echo e($product->name); ?></span>
                            </li>
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
                                                       data-image="<?php echo e((new App\PublicModel())->image_show($image->id_image)); ?>"
                                                       data-zoom-image="<?php echo e((new App\PublicModel())->image_show($image->id_image)); ?>">
                                                        <img src="<?php echo e((new App\PublicModel())->image_show($image->id_image)); ?>"
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
                                        <span class="tooltip-option">???????????? ???? ????????????????</span>
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
                                                <h4 class="modal-title" id="myModalLabel">???????????? ??????????</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-share">
                                                    <div class="form-share-title">???????????? ?????????? ???? ???????? ?????? ??????????????
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
                                                    <div class="form-share-title">?????????? ???? ??????????</div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="ui-input ui-input-send-to-email">
                                                                <input class="ui-input-field" type="email"
                                                                       placeholder="???????? ?????????? ???? ???????? ????????????.">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn-primary">??????????</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-share-url default">
                                                    <div class="form-share-url-title">???????? ????????</div>
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
                                            <span>???????????????????</span> :
                                            <a class="btn-link-border">
                                                <?php echo e($product->category->name); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-delivery-seller default">
                                    <p>
                                        <i class="now-ui-icons shopping_shop"></i>
                                        <span>??????????????:???</span>
                                        <a href="<?php echo e(url('')); ?>" class="btn-link-border">???????? ????????????</a>
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
                                            <span class="price-currency">??????????</span>
                                        </div>
                                        <div class="price-discount" data-title="??????????">
                                            <span>
                                                <?php echo e(number_format($off*100/$product->price_main)); ?>

                                            </span>
                                            <span>%</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="product-add default">
                                        <div class="parent-btn">
                                            <?php if($count!=0): ?>
                                                <button onclick="simplecart()" class="dk-btn dk-btn-info">
                                                    ???????????? ???? ?????? ????????
                                                    <i class="now-ui-icons shopping_cart-simple"></i>
                                                </button>
                                            <?php else: ?>
                                                <a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
                                                    ?????????? ????????????!
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
                                                        alert(data['state']['status']);
                                                        if (data['state']['status'] == true)
                                                            Swal.fire(
                                                                ' ',
                                                                '?????????? ???? ???????????? ???? ?????? ???????? ???????? ????',
                                                                'success'
                                                            );
                                                        else
                                                            Swal.fire({
                                                                type: 'error',
                                                                title: ' ',
                                                                text: '?????????? ?????????? ?????????? ???? ???????????? ???? ????????',
                                                            })
                                                    });
                                            });
                                        }
                                    </script>
                                <?php else: ?>
                                    <?php $colorselect = 0;  ?>
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($group->id==17): ?>
                                            <div class="product-variants default">
                                                <span>???????????? ??????: </span>

                                                <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atrr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php if($atrr->group==$group): ?>
                                                        <?php $colorselect++;  ?>
                                                        <div class="radio">
                                                            <input <?php if((new \App\Model\ProductModel($product->id))->getdefaultcolor()==$atrr): ?>
                                                                   checked="checked "
                                                                   <?php endif; ?> onchange="proajax()" type="radio"
                                                                   name="radio1" id="radio1<?php echo e($atrr->id); ?>"
                                                                   value="<?php echo e($atrr->id); ?>">
                                                            <label for="radio1<?php echo e($atrr->id); ?>"
                                                                   style="border: 2px solid <?php echo e($atrr->color); ?>;">
                                                                <?php echo e($atrr->value->name); ?>

                                                            </label>
                                                        </div>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($group->id!=17): ?>
                                            <div class="product-variants default">
                                                <span><?php echo e($group->public_name); ?>: </span>
                                                <select onchange="proajax()" id="group<?php echo e($group->id); ?>"
                                                        name="group<?php echo e($group->id); ?>" class="selectpicker"
                                                        data-style="btn-primary">

                                                    <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atrr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($atrr->group==$group): ?>

                                                            <option value="<?php echo e($atrr->id); ?>"><?php echo e($atrr->value->name); ?>

                                                                <hr>
                                                            </option>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    <div class="price-product defualt">
                                        <div class="price-value">
                                            <span id="price_main"> 0 </span>
                                            <span class="price-currency">??????????</span>
                                        </div>
                                        <div class="price-discount" data-title="">
                                            <span id="off">
                                                ??
                                            </span>
                                            <span>% </span>
                                        </div>
                                    </div>
                                    <div class="product-add default">

                                        <div class="parent-btn" id="product_btn">
                                            <a class="dk-btn dk-btn-info">
                                                ???? ?????? ???????????? ???? ????????
                                                <i class="now-ui-icons shopping_cart-simple"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 center-breakpoint">

                                <div class="product-params default">
                                    <ul data-title="??????????????????? ??????????">
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
                                            <i class="now-ui-icons objects_umbrella-13"></i> ?????? ?? ??????????
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#params" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons shopping_cart-simple"></i> ????????????
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#comments" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons shopping_shop"></i> ?????????? ??????????????
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#questions" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons ui-2_settings-90"></i> ???????? ?? ????????
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
                                                    ?????? ?? ?????????? ??????????
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
                                                    ???????????? ??????
                                                    <span><?php echo e($product->name); ?></span>
                                                </h2>
                                                <section>

                                                    <ul class="params-list">
                                                        <?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <li>
                                                                <div class="params-list-key">
                                                                    <span class="block"><?php echo e(\App\Feature_Lang::query()->find($feature->id_feature)->name); ?></span>
                                                                </div>
                                                                <div class="params-list-value">
                                                                    <span class="block">
                                                                   <?php echo e(\App\Feature_value::query()->find($feature->id_feature_value)->value); ?>

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
                                                    ?????????? ??????????????
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
                                                                        <span class="says">??????:</span></div>

                                                                    <div class="commentmetadata"><a>
                                                                            <?php echo e($comment->created_at); ?></a></div>

                                                                    <p><?php echo e($comment->message); ?></p>


                                                                </div>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <div class="alert alert-info">
                                                                ???????? ???????? ???? ???????? ?????? ?????????? ???????? ?????????? ?????????? ???????? ??????????
                                                                ???? ???? ???????? ?????????? ?????? ????????????.
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
                                                        ???????????? ??????
                                                        <span>?????? ?????? ???? ???? ???????? ?????????? ???????? ????????????</span>
                                                    </h2>
                                                    <form method="post"
                                                          action="<?php echo e(route('main.product.comment')); ?>/<?php echo e($product->id); ?>"
                                                          class="comment">
                                                        <?php echo csrf_field(); ?>
                                                        <textarea name="message" class="form-control" placeholder="??????"
                                                                  rows="5"></textarea>
                                                        <button class="btn btn-default">?????????? ??????</button>
                                                    </form>
                                                </article>
                                            <?php else: ?>
                                                ???????? ?????????? ?????? ?????????? ???????? <a class="btn-link-border form-account-link"
                                                                             href="<?php echo e(route('login')); ?>">?????? ????????????</a>
                                                ?????? ????????.
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
                            <span>?????????????? ??????????</span>
                        </h3>
                        <a href="<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])); ?>"
                           class="view-all">???????????? ??????</a>

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
                                            <del><span><?php echo e(number_format($product->price_main)); ?><span>??????????</span></span>
                                            </del>
                                        </div>
                                        <div class="text-center">
                                            <ins><span><?php echo e(number_format((new \App\Model\ProductModel($product->id))->specialcost())); ?><span>??????????</span></span>
                                            </ins>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-center">
                                            <ins><span><?php echo e(number_format($product->price_main)); ?><span>??????????</span></span>
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
    <div id="loader">
        <div style="width: 100%;position: fixed;height: 100%;background-color: black;z-index: 10000;opacity: .5">

        </div>

        <div id="myModal" style="display: block;z-index: 10000;margin-top: 200px" class="modal" role="dialog">
            <div class="modal-dialog modal-content">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body">
                        <img src="<?php echo e(url('')); ?>/public/loader.gif">
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

</body>
<?php if($type==1): ?>
    <script>

        var color = 0;
        cart(0);

        function cart(value) {
            color = document.getElementById('group17').value;
            loader_show();
            if (value != 0)
                color = value;
            <?php $index1 = 1;?>
            $(document).ready(function () {
                var posts = '';
                <?php if(session()->has('product')): ?>
                        <?php $__currentLoopData = session('product')["groups"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($group->id!=17): ?>
                    posts += document.getElementById("group<?php echo e($group->id); ?>").value;
                <?php else: ?>
                    posts += color;
                <?php endif; ?>
                        <?php if($index1!=count(session('product')["groups"])): ?>

                    posts += ',';
                <?php endif; ?>
                <?php  $index1++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
                $.get("<?php echo e(url('getproperteis')); ?>/" + posts + '/<?php echo e($product->id); ?>',
                    function (data, status) {
                        refresh_view(data['attr_id'], data['price'], data['count']);
                        alert(data['attr_id'] + "*" + data['price'] + "*" + data['count'] + "*" + data['send']);
                        loader_dismis();


                        if (data['url'] != null)
                            document.getElementById('img-product-zoom').src = data['url'];

                    });
                document.getElementById('properteis').innerHTML = data['text'];

            });
        }

        function refresh_view(attr_id, price, count) {

            $(document).ready(function () {

                $.get("<?php echo e(route('view_properteis')); ?>/" + attr_id + "/" + price + "/" + count, function (data, status) {

                    document.getElementById('properteis').innerHTML = data;

                });
            });
        }
    </script>
<?php endif; ?>
<script>
    function getpoperteis() {

    }

</script>
<?php if($type==1): ?>
    <script>

        function color() {
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($group->id==17): ?>


                    <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atrr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($atrr->group==$group): ?>
            if (document.getElementById('radio1<?php echo e($atrr->id); ?>').checked)
                return '<?php echo e($atrr->id); ?>';
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }

        //   color();
    </script>
    <script>
        var attribute_id = 0;

        function pro() {
            posts = [];
            <?php if($colorselect>0): ?>
            posts.push(color());
            <?php endif; ?>
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($group->id!=17): ?>
            posts.push(document.getElementById('group<?php echo e($group->id); ?>').value);
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            //   alert(posts.toString());
            return posts;


        }

        function proajax() {
            $(document).ready(function () {

                loader_show();
                $.get("<?php echo e(url('productparameters')); ?>/<?php echo e($product_id); ?>/" + pro().toString(),
                    function (data, status) {
                        attribute_id = data['attr_id'];


                        if (data['url'] != null)
                            document.getElementById('img-product-zoom').src = data['url'];
                        document.getElementById('product_btn').innerHTML = data['btn'];
                        document.getElementById('price_main').innerHTML = data['price'];
                        document.getElementById('off').innerHTML = data['off'];
                        //refresh_view(data['attr_id'],data['price'],data['count']);
                        //alert(data['attr_id']+"*"+data['price']+"*"+data['count']+"*"+data['send']);
                        loader_dismis();
                    });
                //
            });
        }

    </script>
    <script>
        function multicart(count = 1) {
            $(document).ready(function () {
                loader_show();
                $.post("<?php echo e(route('multicart')); ?>",
                    {
                        _token: "<?php echo e(csrf_token()); ?>",
                        id: "<?php echo e($product->id); ?>",
                        attr_id: attribute_id
                    },
                    function (data, status) {
                        loader_dismis();

                        show_cart();

                        if (data['state']['status'] == true)
                            Swal.fire(
                                ' ',
                                '?????????? ???? ???????????? ???? ?????? ???????? ???????? ????',
                                'success'
                            );
                        else
                            Swal.fire({
                                type: 'error',
                                title: ' ',
                                text: '?????????? ?????????? ?????????? ???? ???????????? ???? ????????',
                            })
                    });
            });
        }
    </script>
    <script>
        loader_show();
    </script>
<?php else: ?>
<?php endif; ?>
<script>
    //  proajax();
    loader_dismis();

    function loader_show() {
        document.getElementById('loader').style.display = 'block';
    }

    function loader_dismis() {
        document.getElementById('loader').style.display = 'none';
    }

    function delete_cart(id) {
        $(document).ready(function () {
            loader_show();
            $.post("<?php echo e(route('simpelcart')); ?>",
                {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id: id,
                    count: -1
                },
                function (data, status) {
                    loader_dismis();

                    show_cart();
                    Swal.fire(
                        ' ',
                        '?????????? ???? ?????? ???????? ?????? ?????? ????!',
                        'success'
                    );

                });
        });
    }

    function delete_cart_multy(id, attr) {
        $(document).ready(function () {
            loader_show();
            $.post("<?php echo e(route('multicart')); ?>",
                {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id: id,
                    attr_id: attr,
                    count: -1
                },
                function (data, status) {
                    loader_dismis();

                    show_cart();
                    Swal.fire(
                        ' ',
                        '?????????? ???? ?????? ???????? ?????? ?????? ????!',
                        'success'
                    );

                });
        });
    }

    <?php if(count($errors)>0): ?>
    <?php $comment_text = '';  ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $comment_text .= $error . '\n';  ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    Swal.fire(
        ' ',
        '<?php echo e($comment_text); ?>',
        'error'
    );
    <?php endif; ?>
    <?php if(session()->has('comment_add')): ?>
    <?php if(session('comment_add')['state']): ?>
    Swal.fire(
        ' ',
        '<?php echo e(session('comment_add')['value']); ?>',
        'success'
    );
    <?php else: ?>
    Swal.fire(
        ' ',
        '<?php echo e(session('comment_add')['value']); ?>',
        'error'
    );
    <?php endif; ?>
    <?php endif; ?>
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
                            createStatusNewsletterOfElement('notLoginUser', '#721c24', '#f8d7da', '?????????? ?????? ?????? ?????????? ???? ???????? ???????? ????????.')
                        }
                    } else if (data.statusNewsletterYes) {
                        let elementduplicate = document.getElementById('newsLetterYes');
                        if (elementduplicate == null) {
                            createStatusNewsletterOfElement('newsLetterYes', '#155724', '#d4edda', '?????????? ?????? ???? ???????????????? ?????? ??????????.')
                        }
                    } else if (data.statusNewsletterHasOK) {
                        let elementduplicate = document.getElementById('newsLetterHasOK');
                        if (elementduplicate == null) {
                            createStatusNewsletterOfElement('newsLetterHasOK', '#0c5460', '#d1ecf1', '?????????? ???? ?????????????? ?????? ?????? ??????!')
                        }
                    }
                    $('#guideCheckboxNewsletter').css('top', '12%');
                }, error: function (error) {
                    // swal("", "?????????????? ?????????? ??????.", "error");
                }
            })
        });  // end of delete image
    });//  end of jquery
</script>
</html><?php /**PATH C:\xampp\htdocs\khanehkalaWithMelat\resources\views/front/show_product2.blade.php ENDPATH**/ ?>