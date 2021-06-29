<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="author" content="">
    <meta name="robots" content="all">
    <?php echo $__env->yieldContent('meta'); ?>

    <title>  ثبت سفارش</title>

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('public/assets/img/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('public/assets/img/favicon.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')); ?>"/>
    <!-- CSS Files -->
    <link href="<?php echo e(asset('public/assets/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/now-ui-kit.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/plugins/owl.carousel.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/plugins/owl.theme.default.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/main.css')); ?>" rel="stylesheet"/>

    <style>

    </style>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<div class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-8 mx-auto">
                <div class="account-box checkout-page">
                    <a href="<?php echo e(route('urlMain')); ?>" class="logo">
                        <img src="<?php echo e(asset('public/assets/img/logo.jpg')); ?>" alt="">
                    </a>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger"><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="row form-account-row justify-content-around">

                        <?php if ($errors->has('sex_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sex_id'); ?>
                        <span class="" role="alert"><strong class="text-danger"><?php echo e($sex_id); ?></strong></span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="account-box-content" id="containerAddress">
                        <div class="account-box-content" id="containerAddress">


                            <form name="meForm" class="form-account" method="post" action="<?php echo e(url('')); ?>/order/register">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkout-title text-right" id="myTitle">آدرس گیرنده </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-account-title">نام تحویل گیرنده</div>
                                        <div class="form-account-row">
                                            <input name="firstname"  id="firstname" class="input-field text-right" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-account-title"> نام خانوادگی تحویل گیرنده</div>
                                        <div class="form-account-row">
                                            <input name="lastname"  id="lastname" class="input-field text-right" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-account-row">
                                            <div class="form-account-title">استان</div>
                                            <div class="form-account-row">

                                                <select onchange="getcity()" name="provinceId"  id="province" class="input-field text-right" type="text">
                                                    <option>انتخاب استان</option>
                                                    <?php $__currentLoopData = \App\Province::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-account-row">
                                            <div class="form-account-title">شهرستان</div>
                                            <div class="form-account-row">
                                                <select  name="cityId"  id="mycity" class="input-field text-right" type="text">

                                                </select>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-account-title">شماره موبایل</div>
                                        <div class="form-account-row">
                                            <input name="phone_mobile"  class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-account-title">کد پستی</div>
                                        <div class="form-account-row">
                                            <input name="postcode" class="form-control" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-account-title">آدرس گیرنده</div>
                                        <div class="form-account-row">
                                            <textarea id="address1" name="address1"  class="input-field text-right" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-account-row text-left">
                                            <button class="btn btn-info">ثبت و ارسال</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mini-footer">
        <nav>
            <div class="container">
            </div>
        </nav>
        <div class="copyright-bar">

        </div>
    </footer>
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
<script type="text/javascript">
   function getcity() {
       id=document.getElementById('province').value;
       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById('mycity').innerHTML=this.responseText;
           }
       };
       xhttp.open("GET", "<?php echo e(route('getcity')); ?>/"+id, true);
       xhttp.send();
   }
</script>
</html>
<?php /**PATH /home2/maximors/public_html/resources/views/front/orderregister.blade.php ENDPATH**/ ?>