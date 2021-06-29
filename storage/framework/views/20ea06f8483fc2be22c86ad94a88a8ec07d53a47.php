<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="author" content="">
    <meta name="robots" content="all">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('meta'); ?>

    <title><?php echo $__env->yieldContent('title'); ?> ||  <?php echo e(\App\PublicModel::EnappName()); ?></title>

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('public/assets/img/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('public/assets/img/favicon.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')); ?>"/>
    <!-- CSS Files -->
    <link href="<?php echo e(asset('public/assets/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/now-ui-kit.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/plugins/owl.carousel.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/plugins/owl.theme.default.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/main.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/new.css')); ?>" rel="stylesheet"/>

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
            background-color: rgba(192, 230, 236,0.6);
            width: auto;
            min-width: 150px;
            max-width: 300px;
            word-wrap: break-word;
            -webkit-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236,0.3);
            -moz-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236,0.3);
            box-shadow: 0px 0px 3px 1px rgba(192, 230, 236,0.3);


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

    </style>
    <?php echo $__env->yieldContent('css'); ?>


    
    
    
</head>

<body class="index-page sidebar-collapse"
      onload="<?php if(session('status')): ?>
              statusLoadFunc();
      <?php endif; ?>
              ">

<!-- responsive-header -->
<?php if ($__env->exists('sub.responsiveHeader')) echo $__env->make('sub.responsiveHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- responsive-header -->
<div class="wrapper default">
    <div class="row">
        <!-- Modal -->
        <div style="overflow: scroll;" id="loadmodal" style="display: none;width: 100%" class="modal  col-md-12"
             role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body" id="modal-product-load">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="document.getElementById('loadmodal').style.display='none'">بستن
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="wrapper default">

        <!-- header -->
    <?php if ($__env->exists('sub.myheader')) echo $__env->make('sub.myheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- header -->

        <main class="main default">
            <div class="container">
                <!-- banner -->
                <div class="row banner-ads ">
                    <div class="col-12">
                        <section class="banner ">
                            <a class="widget-suggestion widget card" href="<?php echo e(\App\Banner::query()->find(1)->link); ?>">
                                <img src="<?php echo e(url('')); ?>/<?php echo e(\App\Banner::query()->find(1)->url); ?>"
                                     alt="<?php echo e(\App\Banner::query()->find(1)->title); ?>">
                            </a>
                        </section>
                    </div>
                </div>
                <!-- banner -->
                <?php echo $__env->yieldContent('content'); ?>
                <?php if ($__env->exists('sub.brands')) echo $__env->make('sub.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </main>


        <?php if ($__env->exists('sub.myfooter')) echo $__env->make('sub.myfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div id="loader">
        <div style="width: 100%;position: fixed;height: 100%;background-color: black;z-index: 10000;opacity: .5">

        </div>

        <div id="myModal" style="display: block;z-index: 10000;margin-top: 200px" class="modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div style="background-color: transparent">


                    <div class="modal-body" style="text-align: center">
                        <img src="<?php echo e(url('')); ?>/public/gifs/mainloader.gif">
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo e(asset('public/assets/js/core/jquery.3.2.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/assets/js/core/popper.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/assets/js/core/bootstrap.min.js')); ?>" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo e(asset('public/assets/js/plugins/bootstrap-switch.js')); ?>"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?php echo e(asset('public/assets/js/plugins/nouislider.min.js')); ?>" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="<?php echo e(asset('public/assets/js/plugins/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="<?php echo e(asset('public/assets/js/plugins/jquery.sharrre.js')); ?>" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="<?php echo e(asset('public/assets/js/now-ui-kit.js')); ?>" type="text/javascript"></script>
<!--  CountDown -->
<script src="<?php echo e(asset('public/assets/js/plugins/countdown.min.js')); ?>" type="text/javascript"></script>
<!--  Plugin for Sliders -->
<script src="<?php echo e(asset('public/assets/js/plugins/owl.carousel.min.js')); ?>" type="text/javascript"></script>
<!--  sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!--  Jquery easing -->
<script src="<?php echo e(asset('public/assets/js/plugins/jquery.easing.1.3.min.js')); ?>" type="text/javascript"></script>
<!--  LocalSearch -->
<script src="<?php echo e(asset('public/assets/js/plugins/JsLocalSearch.js')); ?>" type="text/javascript"></script>
<!-- Main Js -->
<script src="<?php echo e(asset('public/assets/js/main.js')); ?>" type="text/javascript"></script>
<script>
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
                        'محصول از سبد خرید شما حذف شد!',
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
                        'محصول از سبد خرید شما حذف شد!',
                        'success'
                    );

                });
        });
    }

    function maincart(id, attr_id) {
        $(document).ready(function () {
            loader_show();
            $.post("<?php echo e(route('maincart')); ?>",
                {
                    _token: "<?php echo e(csrf_token()); ?>",
                    attr_id: attr_id,
                    id: id
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
                        })
                });
        });
    }

    function loadproduct(slug) {
        loader_show();
        $(document).ready(function () {
            $.get("<?php echo e(route('main.product.show.load')); ?>/" + slug, function (data, status) {
                loader_dismis();
                document.getElementById('modal-product-load').innerHTML = data;
                document.getElementById('loadmodal').style.display = 'block';
            });

        });
    }

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

                    if (data.statusNewsletterOtherUser) {
                        let elementduplicate = document.getElementById('OtherUser');
                        if (elementduplicate == null) {
                            createStatusNewsletterOfElement('OtherUser', '#0c5460', '#d1ecf1', 'از این ایمیل، نمی توانید استفاده نمایید!')
                        }
                    }else if (data.statusNewsletterNo) {
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

<?php echo $__env->yieldContent('js'); ?>
</html>
<?php /**PATH C:\xampp\htdocs\max\resources\views/layouts/app.blade.php ENDPATH**/ ?>