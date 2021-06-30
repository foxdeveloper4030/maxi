<footer class="main-footer default">
    <div class="back-to-top">
        <a href="#"><span class="icon"><i class="now-ui-icons arrows-1_minimal-up"></i></span> <span>بازگشت به
                            بالا</span></a>
    </div>
    <div class="container">
        <div class="footer-services">
            <div class="row">
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{asset('public/assets/img/svg/delivery.svg')}}">
                    </a>
                    <p>تحویل اکسپرس</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{asset('public/assets/img/svg/contact-us.svg')}}">
                    </a>
                    <p>پشتیبانی 24 ساعته</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{asset('public/assets/img/svg/payment-terms.svg')}}">
                    </a>
                    <p>پرداخت درمحل</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{asset('public/assets/img/svg/return-policy.svg')}}">
                    </a>
                    <p>۷ روز ضمانت بازگشت</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{asset('public/assets/img/svg/origin-guarantee.svg')}}">
                    </a>
                    <p>ضمانت اصل بودن کالا</p>
                </div>
            </div>
        </div>
        <div class="footer-widgets">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">راهنمای خرید از {{\App\PublicModel::EnappName()}}</h3>
                        </header>
                        @isset($pages)
                            <ul class="footer-menu">
                                @foreach($pages[0] as $page)
                                    <li>
                                        <a href="{{route('pages.pageCreate',$page->title)}}">{{$page->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">خدمات مشتریان</h3>
                        </header>
                        @isset($pages)
                            <ul class="footer-menu">
                                @foreach($pages[1] as $page)
                                    <li>
                                        <a href="{{route('pages.pageCreate',$page->title)}}">{{$page->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-2">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">{{\App\PublicModel::EnappName()}}</h3>
                        </header>
                        @isset($pages)
                            <ul class="footer-menu">
                                @foreach($pages[2] as $page)
                                    <li>
                                        <a href="{{route('pages.pageCreate',$page->title)}}">{{$page->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-4">

                    <span style="display: block;clear: both"></span>
                    <div class="socials">
                        <p>ما را در شبکه های اجتماعی دنبال کنید.</p>
                        <div class="footer-social" style="width: 45px;padding: 1%;">
                            <a href="https://www.instagram.com/maxi.morse" target="_blank"
                               data-tooltip-text="اینستاگرام {{\App\PublicModel::EnappName()}}"><i
                                        style="margin-left: 0;font-size: 27px;"
                                        class="fa fa-instagram"></i></a>
                        </div>

                        <div class="footer-social"
                             style="width: 45px;padding: 1%;background-image: linear-gradient(266deg, #0694ED , #31A9DD 55%, #31A9DD 34%, #31A9DD );">
                            <a href="http://www.telegram.me/" target="_blank"
                               data-tooltip-text="تلگرام {{\App\PublicModel::EnappName()}}"><i
                                        style="margin-left: 0;;font-size: 27px;"
                                        class="fa fa-telegram"></i></a>
                        </div>
                        <div class="footer-social"
                             style="width: 45px;padding: 1%;background-image: linear-gradient(266deg, #1C9712 , #1C9712 55%, #1C9712 34%, #3AB728 );">
                            <a href="https://web.whatsapp.com/send?l=fa&phone=" target="_blank"
                               data-tooltip-text="واتساپ {{\App\PublicModel::EnappName()}}"><i
                                        style="margin-left: 0;;font-size: 27px;"
                                        class="fa fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <span>هفت روز هفته ، 24 ساعت شبانه‌روز پاسخگوی شما هستیم.</span>
                </div>
                <div class="col-12 col-lg-2">شماره تماس: 03832226666</div>
                <div class="col-12 col-lg-3">آدرس ایمیل:<a href="mailto:info@maxi.morse.com">info@maxi.morse.com</a>
                </div>

            </div>
        </div>
    </div>
    <div class="description">
        <div class="container">
            <div class="row">
                <div class="site-description col-12 col-lg-7">
                    <h1 class="site-title">{{\App\PublicModel::EnappName()}} :</h1>

                </div>
                <div class="symbol col-12 col-lg-5">
                     <a target="_blank" rel="origin" href="https://trustseal.enamad.ir/?id=189439&amp;Code=OVzNCOqP3ieRQ1PzDJrl"><img src="https://Trustseal.eNamad.ir/logo.aspx?id=189439&amp;Code=OVzNCOqP3ieRQ1PzDJrl" alt="" width="100" style="cursor:pointer" id="OVzNCOqP3ieRQ1PzDJrl"></a>
                    {{--                    <a href="#" target="_blank"><img src="{{asset('public/assets/img/symbol-01.png')}}" alt=""></a>--}}
              </div>
                <div class="col-12">
                    <div class="row">
                        <ul class="footer-partners default">

                            {{--<li class="col-md-3 col-sm-6">--}}
                            {{--<a href=""><img src="{{asset('public/assets/img/footer/1.svg')}}" alt=""></a>--}}
                            {{--</li>--}}
                            {{--<li class="col-md-3 col-sm-6">--}}
                            {{--<a href=""><img src="{{asset('public/assets/img/footer/2.svg')}}" alt=""></a>--}}
                            {{--</li>--}}
                            {{--<li class="col-md-3 col-sm-6">--}}
                            {{--<a href=""><img src="{{asset('public/assets/img/footer/3.svg')}}" alt=""></a>--}}
                            {{--</li>--}}
                            {{--<li class="col-md-3 col-sm-6">--}}
                            {{--<a href=""><img src="{{asset('public/assets/img/footer/4.svg')}}" alt=""></a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <p>
                استفاده از مطالب فروشگاه اینترنتی {{\App\PublicModel::EnappName()}} فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.
                کلیه حقوق این سایت متعلق
                به فروشگاه آنلاین {{\App\PublicModel::EnappName()}}  می‌باشد.
            </p>
        </div>
    </div>
</footer>