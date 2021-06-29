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
    <title>maximorse.com||password</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')}}"/>
    <!-- CSS Files -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/now-ui-kit.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.carousel.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.theme.default.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/main.css')}}" rel="stylesheet"/>
    {!!
        htmlScriptTagJsApiV3(['action' => '/login'])
    !!}
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
</head>

<body>
<div class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-11 col-lg-9 mx-auto">
                <a href="{{route('urlMain')}}" class="logo"
                   style="margin: 2% auto 0 auto;width: 200px; display: block;">
                    <img src="{{asset('public/assets/img/logo.jpg')}}" alt="logo">
                </a>
                <div class="account-box1 col-12 col-md-10 col-lg-8 mx-auto">
                    <div class="account-box-title" style="text-align: center">یاداوری رمز عبور</div>
                    <div class="account-box-content">
                        <form class="form-account" method="POST" action="{{ route('pass1.smsVerifyingForgetPass') }}">
                            @csrf
                            <div class="form-account-title">
                              {{__('messages.Phone Number')}}</div>
                            <div class="form-account-row">
                                <label id="username" class="input-label"><i style="line-height: 15px"
                                                                            class="now-ui-icons users_single-02"></i></label>
                                <input name="mobile" type="text" value="{{ old('mobile') }}"
                                       style="text-align: center"
                                       class="input-field form-control @error('mobile') is-invalid @enderror"
                                       placeholder="  شماره موبایل خود را وارد نمایید">
                                @error('mobile')
                                <span class="" role="alert">
                                    <strong class="text-danger" style="color: #ef5661;">{{ $message }}</strong>
                                </span>
                                @enderror
                                @if(isset($message))
                                    <span class="" role="alert">
                                    <strong class="text-danger" style="color: #ef5661;">{{ $message }}</strong>
                                </span>
                                 @endif   
                                @if ($errors->has('email'))
                                    <span class="" role="alert">
                                        <strong class="text-danger"
                                                style="color: #ef5661;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @error('mobile')
                                <span class="" role="alert">
                                    <strong class="text-danger" style="color: #ef5661;">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button class="dk-btn dk-btn-info" type="submit">
                                        بازنشانی رمز عبور<i class="fa fa-sign-in"></i>
                                    </button>

                                </div>
                            </div>
                        </form>
                        @if (session('status'))
                            <span class="" role="alert">
                                <strong class="text-danger" style="color: #ef5661;">{{ session('status') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="account-box-footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{route('register')}}" class="btn-link-border">ثبت‌نام در

                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</body>
<!--   Core JS Files   -->
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

</html>

