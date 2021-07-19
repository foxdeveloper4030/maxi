@extends('layouts.app')
@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
   خانه
@endsection
@section('content')

    <div class="row">
        <aside class="sidebar col-12 col-lg-3 order-2 order-lg-1">
            <div class="sidebar-inner default">

                <div class="widget-services widget card">
                    <div class="row" style="background-color: tomato">
                        <div class="feature-item col-12">
                            <a href="#" target="_blank">
                                <img src="{{asset('public/assets/img/svg/return-policy.svg')}}">
                            </a>
                            <p>ضمانت برگشت</p>
                        </div>
                        <div class="feature-item col-6">
                            <a href="#" target="_blank">
                                <img src="{{asset('public/assets/img/svg/payment-terms.svg')}}">
                            </a>
                            <p>پرداخت درمحل</p>
                        </div>
                        <div class="feature-item col-6">
                            <a href="#" target="_blank">
                                <img src="{{asset('public/assets/img/svg/delivery.svg')}}">
                            </a>
                            <p>تحویل اکسپرس</p>
                        </div>
                        <div class="feature-item col-6">
                            <a href="#" target="_blank">
                                <img src="{{asset('public/assets/img/svg/origin-guarantee.svg')}}">
                            </a>
                            <p>تضمین بهترین قیمت</p>
                        </div>
                        <div class="feature-item col-6">
                            <a href="#" target="_blank">
                                <img src="{{asset('public/assets/img/svg/contact-us.svg')}}">
                            </a>
                            <p>پشتیبانی 24 ساعته</p>
                        </div>
                    </div>
                </div>
                <div class="widget-suggestion widget card">
                    <header class="card-header">
                        <h3 class="card-title">پیشنهاد لحظه ای</h3>
                    </header>
                    <div id="progressBar">
                        <div class="slide-progress"></div>
                    </div>
                    <div id="suggestion-slider" class="owl-carousel owl-theme">
                        @foreach(\App\Special::query()->where('expire','>',time())->get() as $item)
                        <div class="item">
                            <a href="{{route('main.product.show',['slug'=>$item->product->slug])}}">
                                <img src="{{(new \App\PublicModel())->image_cover($item->product)}}" class="w-100" alt="">
                            </a>
                            <h3 class="product-title">
                                <a href="{{route('main.product.show',['slug'=>$item->product->slug])}}"> {{$item->product->name}} </a>
                            </h3>
                            <div class="price">
                                <span class="amount">{{number_format($item->product->price_main-$item->product->price_off)}}<span>تومان</span></span>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @foreach(\App\Banner::query()->where('id','>',4)->get() as $banner)
                <div class="widget-banner widget card">
                    <a href="{{$banner->link}}" target="_blank">
                        <img class="img-fluid" src="{{url('')}}/{{$banner->url}}" alt="{{$banner->title}}">
                    </a>
                </div>
                @endforeach

            </div>
        </aside>
        <div class="col-12 col-lg-9 order-1 order-lg-2">
            <section id="main-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php   $slidindex=0;?>
                    @foreach(\App\Slider::all() as $slider)

                            <li data-target="#main-slider" data-slide-to="{{$slidindex}}" @if($slidindex==0) <?php $slidindex=1; ?> class="active" @endif></li>


                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <?php  $slidindex=0 ?>
                    @foreach(\App\Slider::all() as $slider)
                    <div class="carousel-item @if($slidindex==0) active <?php $slidindex=1; ?> @endif">
                        <a class="d-block" href="{{route('slider.show',['id'=>$slider->id])}}">
                            <img src="{{$slider->url}}"
                                 class="d-block w-100" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                </a>
                <a class="carousel-control-next" href="#main-slider" data-slide="next">
                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                </a>
            </section>
            <section id="amazing-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                <div class="row m-0">
                    <ol class="carousel-indicators pr-0 d-flex flex-column col-lg-3">
                        <?php
                        $index=0;
                        ?>
                      @foreach(\App\Special::query()->limit(9)->orderByDesc('id')->get() as $item)


                        <li @if($index==0) class="active" @endif data-target="#amazing-slider" data-slide-to="{{$index}}">
                         <span>{{$item->product->name}}</span>
                       </li>
                        <?php
                        $index++;
                        ?>
                        @endforeach

                        <li class="view-all">
                            <a href="{{route('main.special')}}" class="btn btn-primary btn-block hvr-sweep-to-left">
                                <i class="fa fa-arrow-left"></i>مشاهده همه شگفت انگیزها
                            </a>
                        </li>
                    </ol>
                    <div class="carousel-inner p-0 col-12 col-lg-9">
                        <img class="amazing-title" src="{{url('public')}}/assets/img/amazing-slider/amazing-title-01.png"
                             alt="">
                        <?php  $index=0;  ?>
                        @foreach(\App\Special::query()->limit(9)->orderByDesc('id')->get() as $item)
                        <div class="carousel-item @if($item->expire<time()) finished @endif  @if($index==0) active @endif  ">
                            <div class="row m-0">
                                <div class="right-col col-5 d-flex align-items-center">
                                    <a class="w-100 text-center" href="{{route('main.product.show',['slug'=>$item->product->slug])}}">
                                        <img src="{{(new \App\PublicModel())->image_cover($item->product)}}"
                                             class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="left-col col-7">
                                    <div class="price">
                                        <del><span>{{number_format($item->product->price_main)}}<span>تومان</span></span></del>
                                        <ins><span>{{number_format($item->product->price_main-$item->price_off)}}<span>تومان</span></span></ins>
                                        <span class="discount-percent">{{round(($item->price_off)*100/($item->product->price_main))}} % تخفیف</span>

                                    </div>
                                    <h2 class="product-title">
                                        <a href="{{route('main.product.show',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                    </h2>


                                    <div id="counter{{$index}}" class="countdown-timer" countdown data-date="{{(new \Carbon\Carbon($item->expire))->format('d m Y h:m:s')}}">
                                        <span data-days>0</span>:
                                        <span data-hours>0</span>:
                                        <span data-minutes>0</span>:
                                        <span data-seconds>0</span>
                                    </div>
                                    <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                                </div>
                            </div>
                        </div>
                            <script>
                                // Set the date we're counting down to
                                var countDownDate{{$index}} = new Date("{{(new \Carbon\Carbon($item->expire))->format('Y-m-d h:m:s')}}").getTime();

                                // Update the count down every 1 second
                                var x{{$index}} = setInterval(function() {

// Get today's date and time
                                    var now{{$index}} = new Date().getTime();

// Find the distance between now and the count down date
                                    var distance{{$index}} = countDownDate{{$index}} - now{{$index}};

// Time calculations for days, hours, minutes and seconds
                                    var days{{$index}} = Math.floor(distance{{$index}} / (1000 * 60 * 60 * 24));
                                    var hours{{$index}} = Math.floor((distance{{$index}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes{{$index}} = Math.floor((distance{{$index}} % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds{{$index}} = Math.floor((distance{{$index}} % (1000 * 60)) / 1000);

// Output the result in an element with id="demo"
                                    document.getElementById("counter{{$index}}").innerHTML =' <span data-days>'+days{{$index}}+'</span>:'+
                                        ' <span data-hours>'+hours{{$index}}+'</span>:'+
                                        '<span data-minutes>'+minutes{{$index}}+'</span>:'+
                                        '<span data-seconds>'+seconds{{$index}}+'</span>';

// If the count down is over, write some text
                                    if (distance{{$index}} < 0) {
                                        clearInterval(x{{$index}});
                                        document.getElementById("counter{{$index}}").innerHTML = '<button href="#" class="finished btn"> تمام شد </button>';
                                    }
                                }, 1000);
                            </script>

                        <?php $index++;  ?>
                        @endforeach

                    </div>
                </div>
            </section>

            <div class="row banner-ads">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="widget-banner card">
                                <a href="#" target="_blank">
                                    <img class="img-fluid" src="{{asset('public/assets/img/banner/banner-1.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="widget-banner card">
                                <a href="#" target="_top">
                                    <img class="img-fluid" src="{{asset('public/assets/img/banner/banner-2.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="widget-banner card">
                                <a href="#" target="_top">
                                    <img class="img-fluid" src="{{asset('public/assets/img/banner/banner-3.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="widget-banner card">
                                <a href="#" target="_top">
                                    <img class="img-fluid" src="{{asset('public/assets/img/banner/banner-4.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            </div>

            <div class="row banner-ads">

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="widget-banner card">
                                <a href="{{\App\Banner::query()->find(2)->link}}" target="_blank">
                                    <img class="img-fluid" src="{{url('')}}/{{\App\Banner::query()->find(2)->url}}" alt="{{\App\Banner::query()->find(2)->link}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="widget-banner card">
                                <a href="{{\App\Banner::query()->find(3)->link}}" target="_top">
                                    <img class="img-fluid" src="{{\App\Banner::query()->find(3)->url}}" alt="{{\App\Banner::query()->find(3)->title}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    @php($brands=\App\Brand::all())
    @includeIf('sub.brands')
<script>

    function csss(){
        $(document).ready(function(){
           alert(15);

        });
    }


</script>


@endsection

@section('js')
    @include('sub.js')
    <script>
       function f() {

       }

    </script>

@endsection



