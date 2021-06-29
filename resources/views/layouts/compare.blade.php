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
            <?php  $select = 'off';
            if (isset($_GET['select']))
                if ($_GET['select'] == 'on')
                    $select = 'on';
            ?>
            <div class="widget-suggestion widget card">
                <div class="box">
                    <div class="box-content">
                        @if($select=='on')
                            <input checked type="checkbox" onchange="selectradio(this)" name="checkbox"
                                   class="bootstrap-switch"/>
                        @else
                            <input type="checkbox" onchange="selectradio(this)" name="checkbox"
                                   class="bootstrap-switch"/>
                        @endif
                        <label for="">فقط کالاهای موجود</label>
                    </div>
                </div>
            </div>
            <div class="widget-suggestion widget card">
                <div class="box">
                    <div class="container">

                        <style>
                            .slidecontainer {
                                width: 100%;
                            }

                            .slider {
                                -webkit-appearance: none;
                                width: 100%;
                                height: 25px;
                                background: url("{{url('public/img')}}/back2.png");
                                outline: none;
                                opacity: 0.7;
                                -webkit-transition: .2s;
                                transition: opacity .2s;
                            }

                            .slider:hover {
                                opacity: 1;
                            }

                            .slider::-webkit-slider-thumb {
                                -webkit-appearance: none;
                                appearance: none;
                                width: 25px;
                                height: 25px;
                                background: #4CAF50;
                                cursor: pointer;
                            }

                            .slider::-moz-range-thumb {
                                width: 25px;
                                height: 25px;
                                border-radius: 10px;
                                background: tomato;
                                cursor: pointer;
                            }
                        </style>


                        <div class="slidecontainer">

                            <p>بیشترین قیمت</p>
                            <input type="range" id="price_high" min="1" max="1000" value="1000" class="slider"
                                   onchange="price_filter()">
                            <p id="demo_high" data-an="1"></p>
                            <p>کمترین قیمت</p>
                            <input type="range"  id="price_low" min="1" max="1000" value="1" class="slider"
                                   onchange="price_filter()">
                            <p id="demo_low" data-an="1"></p>
                        </div>


                    </div>
                </div>

            </div>

            <div class="sidebar-inner default">

                <div class="widget-services widget card">
                    <div class="row">
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
                                    <img src="{{(new \App\PublicModel())->image_cover($item->product)}}" class="w-100"
                                         alt="">
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

            </div>
        </aside>
        <div class="col-12 col-lg-9 order-1 order-lg-2">
            <div class="row">

                <div class="widget widget-product card">
                    <header class="card-header">
                        <h3 class="card-title">
                            <span>{{$category->name}}</span>
                        </h3>

                    </header>


                </div>

                <div class="listing default" style="margin: 5px;">
                   @if($category->parent_id!=0)
                    <div class="listing-header default">
                        <ul class="listing-sort nav nav-tabs justify-content-center" role="tablist"
                            data-label="مرتب‌ سازی بر اساس :">

                            <li>
                                <a @if($filter=='view') class="active" @endif href=""
                                   data-toggle="tab"
                                   onclick="window.location.href='{{route('category.show.filter',['name'=>$category->name,'filter'=>'view'])}}'"
                                   role="tab"
                                   aria-expanded="false">پربازدیدترین</a>
                            </li>
                            <li>
                                <a @if($filter=='new') class="active" @endif data-toggle="tab" href="?filter=view"
                                   onclick="window.location.href='{{route('category.show.filter',['name'=>$category->name,'filter'=>'new'])}}'"
                                   role="tab" aria-expanded="true">جدیدترین</a>
                            </li>

                            <li>
                                <a @if($filter=='ex') class="active" @endif data-toggle="tab" href="?filter=ex"
                                   onclick="window.location.href='{{route('category.show.filter',['name'=>$category->name,'filter'=>'ex'])}}'"
                                   role="tab"
                                   aria-expanded="false">ارزان‌ترین</a>
                            </li>
                            <li>
                                <a @if($filter=='ch') class="active" @endif data-toggle="tab" href="?filter=ch"
                                   onclick="window.location.href='{{route('category.show.filter',['name'=>$category->name,'filter'=>'ch'])}}'"
                                   role="tab"
                                   aria-expanded="false">گران‌ترین</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content default text-center">
                        <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true">
                            <div class="container no-padding-right">
                                <ul class="row listing-items">
                                    <?php  $index = 0;
                                    ?>
                                    @if($select=='on')
                                        @if(count($products)>0)
                                            @foreach($products as $product)
                                                @if((new \App\Model\ProductModel($product->id))->count()>0)
                                                    @include('front.show_product_box')
                                                    <?php  $index++;?>
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                        <?php $index = 0;?>
                                        @foreach($products as $product)
                                            @include('front.show_product_box')
                                            <?php  $index++;?>

                                        @endforeach
                                    @endif

                                    @if($index<1)
                                        <h3>
                                            هیچ کالایی یافت نشد!
                                        </h3>
                                        <img src="{{url('public')}}/404.png">
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="pager default text-center">
                        <input type="hidden" id="itemindex" value="{{$index}}">
                        {{$products->links()}}
                    </div>
                       @else
                        <div class="tab-content default text-center" >
                            <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true" >
                                <div class="container no-padding-right" >
                                    <ul class="row listing-items">
                                        <div class="widget widget-product card " style="max-width: 200px;">
                                            <header class="card-header">

                                                <a href=""><i class="fa fa-remove"></i></a></header>
                                            <div class="item">
                                                <a href="">
                                                    <img style="max-height: 200px" src="" class="img-fluid" alt="">
                                                </a>
                                                <p class="post-title small">
                                                    <a href="">44</a>
                                                </p>
                                                <div class="price">



                                                </div>
                                                <div class="btn-group">
                                                    <button id="fastmode-load" onclick="loadproduct('سامسونگ_Galaxy_Z_Fold_2_5G_دو_سیم_کارت_256_گیگابایتی')" type="button" class="btn btn-info" style="margin-right: 25%">مشاهده کلی</button>



                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>

                        </div>


                    @endif
                </div>

            </div>
        </div>

    </div>

    <script>
        function selectradio(value) {
            var select = 'off';
            if (value.checked)
                @if(!isset($_GET['page']))
                    window.location.href = '{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}?select=' + 'on';
            @else
                window.location.href = window.location.href + '&&select=' + 'on';
            @endif
        else
            window.location.href = '{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}';


        }

    </script>



@endsection

@section('js')
    @include('sub.js')
    <script>

        setout();

        function price_filter() {

            var output_low = document.getElementById("demo_low");
            var output_high = document.getElementById("demo_high");
            var high = document.getElementById('price_high');
            var low = document.getElementById('price_low');
            setout();
            $(document).ready(function () {
                for (var i = 0; i < document.getElementById('itemindex').value; i++) {
                    var docs = document.getElementById('item' + i);
                    var value = docs.getAttribute('data-price');
                    if (value >= low.value * 100000 && value <= high.value * 100000) {
                        docs.style.display = '';
                    } else {
                        docs.style.display = 'none';
                    }
                }


            });

        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        function setout() {
            var output_low = document.getElementById("demo_low");
            var output_high = document.getElementById("demo_high");
            var high = document.getElementById('price_high');
            var low = document.getElementById('price_low');
            output_high.innerHTML = formatNumber(high.value * 100000) + ' تومان ';
            output_low.innerHTML = formatNumber(low.value * 100000) + ' تومان ';
        }

        setout();
    </script>
@endsection

