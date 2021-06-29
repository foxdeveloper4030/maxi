<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8"/>
    <base href="<?php echo e(url('public')); ?>/">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>تغییر رمز عبور || خانه موبایل</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css"/>
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/now-ui-kit.css" rel="stylesheet"/>
    <link href="assets/css/plugins/owl.carousel.css" rel="stylesheet"/>
    <link href="assets/css/plugins/owl.theme.default.min.css" rel="stylesheet"/>
    <link href="assets/css/main.css" rel="stylesheet"/>

    <style>
        .account-box1 {
            background: #fff;
            margin: 30px auto;
            border: 1px solid #dedede;
            box-shadow: 0 12px 12px 0 hsla(0, 0%, 71%, .11);
            position: relative;
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
    </style>

    <?php echo htmlScriptTagJsApiV3(['action' => '/']); ?>

</head>

<body>
<div class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-11 col-lg-9 mx-auto">
                <a href="<?php echo e(route('urlMain')); ?>" class="logo">
                    <img src="<?php echo e(url('')); ?>/public/assets/img/logo.jpg" alt="logo"
                         style="margin: 2% auto 0 auto;width: 200px; display: block;">
                </a>
                <div class="account-box1 col-12 col-md-10 col-lg-8 mx-auto">
                    <div class="account-box-title" style="text-align: center">تغییر رمز عبور</div>
                    <div class="account-box-content">
                        <form class="form-account" method="post" action="<?php echo e(route('main.user.changepass.save')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-account-title">رمز عبور قبلی</div>
                            <div class="form-account-row">
                                <label class="input-label" for="oldpass"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input name="oldpass" class="input-field <?php if ($errors->has('oldpass')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('oldpass'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       type="password"
                                       style="text-align: center" id="oldpass"
                                       placeholder="رمز عبور قبلی خود را وارد نمایید">
                                <?php if($errors->has('oldpass')): ?>
                                    <span class="" role="alert">
                                        <strong class="text-danger"><?php echo e($errors->first('oldpass')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <?php if(session()->has('status')): ?>
                                    <div class="alert" role="alert" style="color: #721c24;background-color: #f8d7da;margin-top: 1%">
                                        <a style="cursor: none" class="alert-link"><?php echo e(@session()->pull('status')); ?></a>،
                                        صحیح نمی باشد!
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-account-title">رمز عبور جدید</div>
                            <div class="form-account-row">
                                <label class="input-label" for="password"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input name="password" class="input-field <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       type="password"
                                       style="text-align: center" id="password"
                                       placeholder="رمز عبور جدید خود را وارد نمایید">
                                <?php if($errors->has('password')): ?>
                                    <span class="" role="alert">
                                        <strong class="text-danger"><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-account-title">تکرار رمز عبور جدید</div>
                            <div class="form-account-row">
                                <label class="input-label" for="password_confirmation"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input name="password_confirmation"
                                       class="input-field <?php if ($errors->has('password_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password_confirmation'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       type="password" style="text-align: center"
                                       id="password_confirmation"
                                       placeholder="رمز عبور جدید خود را مجددا وارد نمایید">
                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="" role="alert">
                                    <strong class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button type="submit" class="dk-btn dk-btn-info">
                                        تغییر رمز عبور
                                        <i class="now-ui-icons arrows-1_refresh-69"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mini-footer">
        <nav>
            <div class="container">
                <ul class="menu">
                    <li>
                        <a href="#">درباره خانه موبایل</a>
                    </li>
                    <li>
                        <a href="#">فرصت‌های شغلی</a>
                    </li>
                    <li>
                        <a href="#">تماس با ما</a>
                    </li>
                    <li>
                        <a href="#">همکاری با سازمان‌ها</a>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="copyright-bar">
            <div class="container">
                <p>
                    استفاده از مطالب فروشگاه اینترنتی خانه موبایل فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.
                    کلیه حقوق این سایت متعلق
                    به شرکت نوآوران فن آوازه (فروشگاه آنلاین خانه موبایل) می‌باشد.
                </p>
            </div>
        </div>
    </footer>
</div>
</body>
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
<!-- Main Js -->
<script src="assets/js/main.js" type="text/javascript"></script>

</html><?php /**PATH D:\project\xampp\htdocs\khanehkala\resources\views/auth/change_pass.blade.php ENDPATH**/ ?>