{{--@dd(session()->all())--}}
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

    <title>تایید نهایی</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')}}"/>
    <!-- CSS Files -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/now-ui-kit.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.carousel.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/plugins/owl.theme.default.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/css/main.css')}}" rel="stylesheet"/>

    <style>
        .posts {
            position: relative;
            margin: 50px auto 0;
            font-size: 15px;
        }

        .radiobtn {
            position: relative;
            display: block;
        }

        .radiobtn label {
            display: block;
            background: #9be9f1;
            color: #444;
            border-radius: 5px;
            padding: 10px 20px;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .radiobtn label:after, .radiobtn label:before {
            content: "";
            position: absolute;
            left: 11px;
            top: 11px;
            width: 20px;
            height: 20px;
            border-radius: 3px;
            background: #9be9f1;
        }

        .radiobtn label:before {
            background: transparent;
            -webkit-transition: 0.1s width cubic-bezier(0.075, 0.82, 0.165, 1) 0s, 0.3s height cubic-bezier(0.075, 0.82, 0.165, 2) 0.1s;
            transition: 0.1s width cubic-bezier(0.075, 0.82, 0.165, 1) 0s, 0.3s height cubic-bezier(0.075, 0.82, 0.165, 2) 0.1s;
            z-index: 2;
            overflow: hidden;
            background-repeat: no-repeat;
            background-size: 13px;
            background-position: center;
            width: 0;
            height: 0;
        }

        .radiobtn input[type="radio"] {
            display: none;
            position: absolute;
            width: 100%;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .radiobtn input[type="radio"]:checked + label {
            background: #08b5ab;
            /*-webkit-animation-name: blink;*/
            /*animation-name: blink;*/
            /*-webkit-animation-duration: 1s;*/
            /*animation-duration: 1s;*/
            border-color: #39afdf;
        }

        .radiobtn input[type="radio"]:checked + label:after {
            background: #42c6fc;
        }

        .radiobtn input[type="radio"]:checked + label:before {
            width: 20px;
            height: 20px;
        }

        @-webkit-keyframes blink {
            0% {
                background-color: #05a4a6;
            }
            10% {
                background-color: #05a4a6;
            }
            11% {
                background-color: #04C3F8;
            }
            29% {
                background-color: #04C3F8;
            }
            30% {
                background-color: #05a4a6;
            }
            50% {
                background-color: #04C3F8;
            }
            45% {
                background-color: #05a4a6;
            }
            50% {
                background-color: #04C3F8;
            }
            100% {
                background-color: #05a4a6;
            }
        }

        @keyframes blink {
            0% {
                background-color: #05a4a6;
            }
            10% {
                background-color: #05a4a6;
            }
            11% {
                background-color: #04C3F8;
            }
            29% {
                background-color: #04C3F8;
            }
            30% {
                background-color: #05a4a6;
            }
            50% {
                background-color: #04C3F8;
            }
            45% {
                background-color: #05a4a6;
            }
            50% {
                background-color: #04C3F8;
            }
            100% {
                background-color: #05a4a6;
            }
        }

    </style>
    @yield('css')
</head>
<body>
<div class="wrapper default shopping-page">
    <!-- header-shopping -->
    <header class="header-shopping default">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pt-2">
                    <div class="header-shopping-logo default">
                        <a href="{{route('urlMain')}}">
                            <img
                                src="https://khanehmobile.com/img/%D8%AE%D8%A7%D9%86%D9%87-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84-logo-1548169420.jpg"
                                alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <ul class="checkout-steps">
                        <li>
                            <a>
                                <span>اطلاعات ارسال</span>
                            </a>
                        </li>
                        <li>
                            <a class="active">
                                <span>پرداخت</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span>اتمام خرید و ارسال</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- header-shopping -->

    <!-- main-shopping -->
    <main class="cart-page default">
        <div class="container">
            <form class="row" method="post" id="shipping-data-form" action="{{route('main.order.payment')}}">
                @csrf
                <div class="cart-page-content col-xl-9 col-lg-8 col-md-12 order-1">
                    <div class="cart-page-title">
                        <h1>آدرس تحویل سفارش</h1>
                    </div>
                    <section class="page-content default">
                        <div class="address-section">
                            <div class="checkout-contact">
                                <div class="checkout-contact-content">
                                    <ul class="checkout-contact-items">
                                        <li class="checkout-contact-item">
                                            گیرنده:
                                            <span class="full-name">{{\App\Order::query()->find(session('order'))->name}}
                                                &ensp; {{\App\Order::query()->find(session('order'))->lastname}}
                                            </span>
                                        </li>
                                        <li class="checkout-contact-item">
                                            <div class="checkout-contact-item checkout-contact-item-mobile">
                                                شماره تماس:
                                                <span
                                                    class="mobile-phone">{{\App\Order::query()->find(session('order'))->tel}}</span>
                                            </div>
                                            <div class="checkout-contact-item-message">
                                                کد پستی:
                                                <span
                                                    class="post-code">{{\App\Order::query()->find(session('order'))->postal_code}}</span>
                                            </div>
                                            <br>
                                            استان
                                            <span class="state">{{\App\City::query()->find(\App\Order::query()->find(session('order'))->city_id)->province->name}}،</span>
                                            ‌شهر
                                            <span
                                                class="city">{{\App\City::query()->find(\App\Order::query()->find(session('order'))->city_id)->name}}</span>
                                            <br>
                                            آدرس:
                                            <span
                                                class="city">{{\App\Order::query()->find(session('order'))->addres}}</span>
                                        </li>
                                    </ul>
                                    <div class="checkout-contact-badge">
                                        <i class="now-ui-icons ui-1_check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="headline">
                            <span>انتخاب نحوه ارسال</span>
                        </div>
                        <div class="checkout-shipment posts">
                            @foreach(\App\Cariar::query()->where('active','=',1)->get() as $cariar)
                                <div class="radiobtn">
                                    <input type="radio" id="radio{{$cariar->id}}"
                                           name="carrierId" onclick="load('{{$cariar->id}}')"
                                           value="{{$cariar->id}}"/>
                                    <label for="radio{{$cariar->id}}">{{ $cariar->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="orderId" value="{{session('order')}}">
                        <div class="headline">
                            <span>مرسولات ارسالی</span>
                        </div>
                        <div class="checkout-pack">
                            <section class="products-compact">
                                <div class="box">
                                    <div class="row">
                                        @foreach(\App\Order::query()->find(session('order'))->carts as $cart)
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="product-box-container">
                                                    <div class="product-box product-box-compact">
                                                        <a class="product-box-img">
                                                            <img
                                                                src="{{(new App\PublicModel())->image_cover(App\Product::query()->find($cart["product_id"]))}}">
                                                        </a>
                                                        <div class="product-box-title">
                                                            {{App\Product::query()->find($cart->product_id)->name}}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                            <div class="row">
                                <div class="checkout-time-table checkout-time-table-time">
                                    <span class="checkout-additional-options-checkbox-image"></span>
                                    <div id="textp">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="headline">
                            <span>صدور فاکتور</span>
                        </div>
                        <div class="checkout-invoice">
                            <div class="checkout-invoice-headline">
                                <div class="form-account-agree">
                                    <label class="checkbox-form checkbox-primary">
                                        <input type="checkbox" checked="checked" id="agree" name="purchaseFactor">
                                        <span class="checkbox-check"></span>
                                    </label>
                                    <label for="agree">درخواست ارسال فاکتور خرید</label>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <aside class="cart-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-2">
                    <div class="checkout-aside">
                        <div class="checkout-summary">
                            <div class="checkout-summary-main">
                                <ul class="checkout-summary-summary">
                                    <li><span>مبلغ کل ({{count(\App\Order::query()->find(session('order'))->carts)}} کالا)</span><span>{{number_format(\App\Order::query()->find(session('order'))->price)}} تومان</span>
                                    </li>
                                    <li>
                                        <span>هزینه ارسال</span>
                                        <span>وابسته به آدرس<span class="wiki wiki-holder"><span
                                                    class="wiki-sign"></span>
                                                    <div class="wiki-container js-dk-wiki is-right">
                                                        <div class="wiki-arrow"></div>
                                                        <p class="wiki-text">
                                                            هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده
                                                            متفاوت باشد. در
                                                            صورتی که هر
                                                            یک از مرسولات حداقل ارزشی برابر با ۱۰۰هزار تومان داشته باشد،
                                                            آن مرسوله
                                                            بصورت رایگان
                                                            ارسال می‌شود.<br>
                                                            "حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر
                                                            باشد."
                                                        </p>
                                                    </div>
                                                </span></span>
                                    </li>
                                </ul>
                                <div class="checkout-summary-devider">
                                    <div></div>
                                </div>
                                <div class="checkout-summary-content">
                                    <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                    <div class="checkout-summary-price-value">
                                        <span class="checkout-summary-price-value-amount"
                                              id="pricep">{{number_format(\App\Order::query()->find(session('order'))->price)}}</span>تومان
                                    </div>

                                    <a href="" class="selenium-next-step-shipping">
                                        <div class="parent-btn">
                                            <button id="buttonp" type="submit" style="display: none" class="dk-btn dk-btn-info">
                                                ادامه ثبت سفارش
                                                <i class="now-ui-icons shopping_basket"></i>
                                            </button>

                                            <!-- Use a button to open the snackbar -->


                                        </div>

                                    </a>
                                    <div>
                                        <span>
                                            کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی
                                            را تکمیل کنید.
                                        </span>
                                        <span class="wiki wiki-holder"><span class="wiki-sign"></span>
                                                <div class="wiki-container is-right">
                                                    <div class="wiki-arrow"></div>
                                                    <p class="wiki-text">
                                                        محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش
                                                        برای شما رزرو
                                                        می‌شوند. در
                                                        صورت عدم ثبت سفارش،  {{\App\PublicModel::EnappName()}} هیچگونه مسئولیتی در قبال تغییر
                                                        قیمت یا موجودی
                                                        این کالاها
                                                        ندارد.
                                                    </p>
                                                </div>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="checkout-feature-aside">
                            <ul>
                                <li class="checkout-feature-aside-item checkout-feature-aside-item-guarantee">
                                    هفت روز
                                    ضمانت تعویض
                                </li>
                                <li class="checkout-feature-aside-item checkout-feature-aside-item-cash">
                                    پرداخت در محل با
                                    کارت بانکی
                                </li>
                                <li class="checkout-feature-aside-item checkout-feature-aside-item-express">
                                    تحویل اکسپرس
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </form>
        </div>
    </main>
    <!-- main-shopping -->
    @include('sub.myfooter')
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
<script>
    function load(id) {
        $(document).ready(function () {

            $.get("{{route('order.add')}}/" + id, function (data, status) {
                document.getElementById('pricep').innerHTML = data['price'];
                document.getElementById('buttonp').style.display = 'block';
                document.getElementById('textp').innerHTML = data['text'] + '<br><lable>هزینه ارسال:</lable>' + data['cariar_price'] + '  ' + 'تومان';
            });


        });
    }
</script>
</html>
