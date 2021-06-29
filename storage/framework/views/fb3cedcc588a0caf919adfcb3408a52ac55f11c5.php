<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('public/assets/img/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('public/assets/img/favicon.png')); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>تایید کد کاربری || خانه موبایل</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')); ?>"/>
    <!-- CSS Files -->
    <link href="<?php echo e(asset('public/assets/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/now-ui-kit.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/plugins/owl.carousel.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/plugins/owl.theme.default.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/main.css')); ?>" rel="stylesheet"/>
    <style>
        .form-account-row > input[type='text'] {
            width: 90%;
            height: 50px;
            text-align: center !important;
            font-size: 22px;
        }

        .account-box-title {
            padding: 10px;
            font-size: 12px;
            text-align: center;
        }
    </style>
    <?php echo htmlScriptTagJsApiV3(['action' => '/register']); ?>

</head>

<body>
<div class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                <div class="account-box">
                    <a href="<?php echo e(route('urlMain')); ?>" class="logo">
                        <img src="<?php echo e(asset('public/assets/img/logo.jpg')); ?>" alt="logo">
                    </a>
                    <div class="account-box-title">کد فعالسازی را وارد نمایید(فراموشی رمز عبور)</div>
                    <div class="account-box-content">
                        <form class="form-account" method="POST" action="<?php echo e(route('pass2.smsVerifiedForgetPass')); ?>"
                              id="smsvrifsunmit">
                            <?php echo csrf_field(); ?>
                            <div class="form-account-title"><?php echo e(__('messages.activation_code')); ?></div>
                            <div class="form-account-row">
                                <input type="text" id="smsvrif" name="activation_code"
                                       class="input-field form-control"
                                       onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                                <?php if ($errors->has('activation_code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('activation_code'); ?>
                                <span class="" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                <input type="hidden" name="typeregister" value="<?php echo e($field); ?>">
                                <input type="hidden" name="secure_key"
                                       value="<?php echo e(App\CustomClasses\SA_Encryption::encrypt_to_url_param($user->secure_key)); ?>">
                            </div>

                        </form>
                        
                        
                        
                        
                        
                        <?php if(isset($status)): ?>
                            <span class="" role="alert">
                                <strong class="text-danger" style="color: #ef5661"><?php echo e($status); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="account-box-footer" style="padding: 1%">
                        <?php if ($errors->has('typeregister')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('typeregister'); ?>
                        <span class="" role="alert">
                            <strong class="text-danger"><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        <div class="form-account-submit" style="margin: 0 -10px 1%">
                            ارسال مجدد کد تایید
                            <button id="generateFormAndSubmitting" class="col-md-3 btn mce-btn-small btn-info">
                                <i class="fa fa-repeat"></i>
                            </button>
                        </div>
                        <div id="statusAlert" role="alert">
                        </div>
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
<script src="<?php echo e(asset('public/assets/js/core/jquery.3.2.1.min.js')); ?>" type="text/javascript"></script>
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
<!--  Jquery easing -->
<script src="<?php echo e(asset('public/assets/js/plugins/jquery.easing.1.3.min.js')); ?>" type="text/javascript"></script>
<!-- Main Js -->
<script src="<?php echo e(asset('public/assets/js/main.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#smsvrif').on('input', function () {
            if (this.value.length === 6) {
                // console.log(this.value);
                $('#smsvrifsunmit').submit();
            }
        })

        // ================================================    resend verify code
        function generateFormAndSubmitting() {
            $formResend = document.getElementById('resendVerifyCode');
            if (document.contains($formResend)) {
                $formResend.remove();
            }
            var f = document.createElement("form");
            f.setAttribute('id', 'resendVerifyCode');
            f.setAttribute('method', "post");
            f.setAttribute('action', "<?php echo e(route('resendVerifyCode')); ?>");

            let field = "<?php echo e($field); ?>"
            var i = document.createElement("input");       //name is field; (username = email or mobile)
            i.setAttribute('type', "hidden");
            i.setAttribute('name', "field");
            i.setAttribute('value', "<?php echo e($field); ?>");
            var ii = document.createElement("input");     //value is email or mobile
            ii.setAttribute('type', "hidden");
            ii.setAttribute('name', "value");
            if (field == "email") {
                ii.setAttribute('value', "<?php echo e($user->email); ?>");
            } else if (field == "mobile") {
                ii.setAttribute('value', "<?php echo e($user->mobile); ?>");
            }
            var iii = document.createElement("input");     //این فیلد یکتا برا این هست ک بتوانم باهاش، کاربر رو قبل از عملیات لاگین، پیدا کنم
            iii.setAttribute('type', "hidden");
            iii.setAttribute('name', "secure_key");
            iii.setAttribute('value', "<?php echo e(App\CustomClasses\SA_Encryption::encrypt_to_url_param($user->secure_key)); ?>");
            var csrf = document.createElement("input"); //csrf
            csrf.setAttribute('type', "hidden");
            csrf.setAttribute('name', "_token");
            csrf.setAttribute('value', "<?php echo e(csrf_token()); ?>");

            f.appendChild(i);
            f.appendChild(ii);
            f.appendChild(iii);
            f.appendChild(csrf);
            document.getElementsByTagName('body')[0].appendChild(f);
        }

        $('#generateFormAndSubmitting').on('click', function (e) {
            generateFormAndSubmitting();
            // console.log('salam');

            // console.log('khobi?');
            e.preventDefault();
            var resendForm = $('#resendVerifyCode');
            let url = resendForm.attr('action');
            var formData = new FormData(document.getElementById('resendVerifyCode'));
            // console.log('hi');
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.table(data);

                    let backgroundColor = data.backgroundColor;
                    let borderColor = data.borderColor;
                    let textColor = data.textColor;
                    $('#statusAlert').fadeOut(300, function () {
                        $(this).removeAttr("style");
                    });
                    $('#statusAlert').fadeIn(400, function () {
                        $(this).css({
                            "background-color": backgroundColor, "border": "1px solid " + borderColor,
                            "border-radius": "5px", "box-sizing": "border-box",
                            "padding": "3%", "font-size": "85%", "color": textColor,
                        });
                        $(this).text(data.status);
                    });
                },
                error: function (error) {
                    // swal("خطا", "ثبت دیدگاه با خطا مواجه شد!", "error");
                }
            });             //  end of ajax submit

        });         //      end of generateFormAndSubmitting id


    }); //  end of jquery


</script>

</html>

<?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/auth/passwords/step1Reset.blade.php ENDPATH**/ ?>