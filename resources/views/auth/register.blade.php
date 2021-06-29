<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ثبت نام || {{\App\PublicModel::EnappName()}} </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')}}"/>
    <!-- CSS Files as assets    -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/now-ui-kit.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.carousel.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.theme.default.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/main.css')}}" rel="stylesheet"/>
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
    {!!
        htmlScriptTagJsApiV3(['action' => '/register'])
    !!}
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


                    <div class="account-box-title" style="text-align: center">ثبت‌نام در {{\App\PublicModel::EnappName()}} </div>
                    @if (session()->has('status'))
                        <div class="alert" role="alert" style="color: #721c24;background-color: #f8d7da;margin-top: 1%">
                            <a style="cursor: none" class="alert-link">{{@session()->pull('status')}}</a>،
                            لطفا، وارد سایت شوید!
                        </div>
                    @endif

                    <div class="account-box-content">
                        <form class="form-account" action="{{ route('register') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-account-row">
                                <div style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                    <div class="form-account-title">نام</div>
                                    <label id="username" class="input-label"></label>
                                    <input class="input-field @error('firstname') is-invalid @enderror" type="text"
                                           name="firstname" value="{{ old('firstname') }}"
                                           style="text-align: center">
                                    @if ($errors->has('firstname'))
                                        <span class="" role="alert">
                                        <strong class="text-danger">{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;">
                                    <div class="form-account-title"> نام خانوادگی</div>
                                    <label id="username" class="input-label"><i
                                            class="now-ui-icons"></i></label>
                                    <input class="input-field @error('lastname') is-invalid @enderror" type="text"
                                           name="lastname" value="{{ old('lastname') }}"
                                           style="text-align: center">
                                    @if ($errors->has('lastname'))
                                        <span class="" role="alert">
                                        <strong class="text-danger">{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <span style="clear: both"></span>
                            <div class="form-account-title">{{__('messages.Phone Number')}}
                            </div>
                            <div class="form-account-row">
                                <label id="username" class="input-label" title="نام کاربری"><i
                                        class="now-ui-icons users_single-02"></i></label>
                                <input class="input-field @error('mobile') is-invalid @enderror" type="text"
                                       name="mobile" value="{{ old('mobile') }}" autocomplete="off"
                                       placeholder="موبایل  خود را وارد نمایید" style="text-align: center">
                              

                                @error('mobile')
                                <span class="" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                                @error('undefined')
                                <span class="" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-account-title"> {{__('messages.E-Mail Address')}}</div>
                            <div class="form-account-row">
                                <label id="username" class="input-label" title="نام کاربری"><i
                                        class="now-ui-icons users_single-02"></i></label>
                                <input class="input-field @error('email') is-invalid @enderror" type="text"
                                       name="email" value="{{ old('email') }}" autocomplete="off"
                                       placeholder="ایمیل  خود را وارد نمایید (اختیاری)" style="text-align: center">
                                @if ($errors->has('email'))
                                    <span class="" role="alert">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="" role="alert">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                @error('undefined')
                                <span class="" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-account-row">
                                <div class="product-variants default">
                                    <span>نوع جنسیت:</span>
                                    <div class="radio">
                                        <input type="radio" name="sex_id" id="man" value="man" checked>
                                        <label for="man">آقا</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="sex_id" id="woman" value="woman">
                                        <label for="woman">خانم</label>
                                    </div>
                                </div>
                                @error('sex_id')
                                <span class="" role="alert">
                                    <strong class="text-danger">{{ $sex_id }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-account-row">

                                @if ($errors->has('website'))
                                    <span class="" role="alert">
                                        <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span style="display: block; clear: both"></span>
                            <div class="form-account-title">آدرس وبسایت (در صورتی ک صاحب وبسایت می باشید)</div>
                            <div class="form-account-row">
                                <label id="username" class="input-label"></label>
                                <input class="input-field @error('website') is-invalid @enderror" type="text"
                                       name="website" value="{{ old('website') }}"
                                       placeholder="www.example.com" style="text-align: center">
                                @if ($errors->has('website'))
                                    <span class="" role="alert">
                                        <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-account-agree">
                                <label class="checkbox-form checkbox-primary">
                                    <input type="checkbox" checked="checked">
                                    <span class="checkbox-check"></span>
                                </label>
                                <label for="agree">
                                    <a href="#" class="btn-link-border">حریم خصوصی</a> و <a href="#"
                                                                                           class="btn-link-border">شرایط
                                        و قوانین</a> استفاده از سرویس های سایت
                                    {{\App\PublicModel::EnappName()}}  را مطالعه نموده و با کلیه موارد آن موافقم.</label>
                            </div>
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button class="dk-btn dk-btn-info">
                                        ثبت نام در {{\App\PublicModel::EnappName()}}
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="account-box-footer">
                        <span>قبلا در {{\App\PublicModel::EnappName()}}  ثبت‌نام کرده‌اید؟</span>
                        <a href="{{route('login')}}" class="btn-link-border">وارد شوید</a>
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
<script type="text/javascript">

    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#setImageUpload').attr('src', e.target.result);
                    $('#avatarDefault').hide();
                    $('#avatarDefault').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#imageUpload').on('change', function (e) {
            readURL(this);
        }); //  end of #imageUpload
    });//  end of jquery

</script>
</html>
