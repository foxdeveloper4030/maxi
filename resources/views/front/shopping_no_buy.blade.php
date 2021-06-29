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
    @yield('meta')

    <title> پرداخت ناموفق</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')}}"/>
    <!-- CSS Files -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/now-ui-kit.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.carousel.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.theme.default.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/main.css')}}" rel="stylesheet"/>

</head>

<body>

<div class="wrapper default shopping-page">
    <!-- header-shopping -->
    <header class="header-shopping default">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pt-2">
                    <div class="header-shopping-logo default">
                        <a href="{{route('urlMain')}}" class="logo">
                            <img width="100" src="{{asset('public/assets/img/logo.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                
                <div class="col-12 text-center">
                   
                </div>
            </div>
        </div>
    </header>
    <!-- header-shopping -->
<br>
<br>
    <!-- main-shopping -->
    <main class="cart-page default">
        <div class="container">
            <div class="row">
                <div class="cart-page-content col-12 order-1">
                    <section class="page-content default">
                        <div class="success-checkout text-center default">
                            <div class="icon-warning">
                                <i class="fa fa-close"></i>
                            </div>
                            <h1>سفارش <a ></a>پرداخت نشد</h1>
                            <p>چنانچه طی این فرایند مبلغی از حساب شما کسر شده است،طی 72 ساعت آینده به حساب شما باز خواهد گشت.</p>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </main>
    <!-- main-shopping -->

    <!-- footer -->
     @include('sub.myfooter')
    <!-- footer -->
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
<!--  sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!--  Jquery easing -->
<script src="{{asset('public/assets/js/plugins/jquery.easing.1.3.min.js')}}" type="text/javascript"></script>
<!--  LocalSearch -->
<script src="{{asset('public/assets/js/plugins/JsLocalSearch.js')}}" type="text/javascript"></script>
<!-- Main Js -->
<script src="{{asset('public/assets/js/main.js')}}" type="text/javascript"></script>
</html>
