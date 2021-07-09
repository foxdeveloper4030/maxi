<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>تغییر رمز عبور || maximorse</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')}}"/>
    <!-- CSS Files -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/now-ui-kit.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.carousel.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.theme.default.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/main.css')}}" rel="stylesheet"/>
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
    {!!
        htmlScriptTagJsApiV3(['action' => '/register'])
    !!}
</head>

<body>
<div class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                <div class="account-box">
                    <a href="{{route('urlMain')}}" class="logo">
                        <img src="{{asset('public/assets/img/logo.jpg')}}" alt="logo">
                    </a>
                    <div class="account-box-title">تغییر رمز عبور</div>
                    <div class="account-box-content">
                        <form class="form-account" method="post" action="{{route('pass3.changePassedForgetPass')}}">
                            @csrf
                            <input type="hidden" name="secure_key" value="{{$secure_key}}">
                            <div class="form-account-title">رمز عبور جدید</div>
                            <div class="form-account-row">
                                <label class="input-label" for="password"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field" type="password" style="text-align: center"
                                       id="password"
                                       name="password" placeholder="رمز عبور جدید خود را وارد نمایید">
                            </div>
                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: darkred;">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <div class="form-account-title">تکرار رمز عبور جدید</div>
                            <div class="form-account-row">
                                <label class="input-label" for="password_confirmation"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field" type="password" style="text-align: center"
                                       name="password_confirmation" id="password_confirmation"
                                       placeholder="رمز عبور جدید خود را مجددا وارد نمایید">
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: darkred;">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button class="dk-btn dk-btn-info">
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
<script src="{{asset('public/assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('public/assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('public/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{asset('public/assets/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="{{asset('public/assets/js/plugins/jquery.sharrre.js')}}" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('public/assets/js/now-ui-kit.js')}}" type="text/javascript"></script>
<!--  CountDown -->
<script src="{{asset('public/assets/js/plugins/countdown.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Sliders -->
<script src="{{asset('public/assets/js/plugins/owl.carousel.min.js')}}" type="text/javascript"></script>
<!--  Jquery easing -->
<script src="{{asset('public/assets/js/plugins/jquery.easing.1.3.min.js')}}" type="text/javascript"></script>
<!-- Main Js -->
<script src="{{asset('public/assets/js/main.js')}}" type="text/javascript"></script>

<script type="text/javascript">

    $(document).ready(function () {

    }); //  end of jquery


</script>

</html>

