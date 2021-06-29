@extends('layouts.app')
@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    {{$slider->title}}
@endsection
@section('content')

    <div class="row">
        <aside class="sidebar col-12 col-lg-3 order-2 order-lg-1">
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

            </div>
        </aside>
        <div class="col-12 col-lg-9 order-1 order-lg-2">
            <div class="row">

                    <div class="widget widget-product card">
                        <header class="card-header">
                            <h3 class="card-title">
                                <span>{{$slider->title}}</span>
                            </h3>

                        </header>
                        <div class="card-body">
                            {!! $slider->text !!}
                        </div>

                    </div>

                <div class="listing default" style="margin: 5px;">

                    <div class="listing-header default">
                    </div>
                    <div class="tab-content default text-center">
                        <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true">
                            <div class="container no-padding-right">
                                <ul class="row listing-items">
                                    <?php  $index=0;
                                    $select='off';?>
                                    @if($select=='on')
                                        @if(count($products)>0)
                                            @foreach($products as $product)
                                                @if((new \App\Model\ProductModel($product->id))->count()>0)
                                                    <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
                                                        @if((new \App\Model\ProductModel($product->id))->count()<1)
                                                            <div class="label-check">موجود نیست</div>
                                                        @endif
                                                        <div class="product-box">
                                                            <div
                                                                    class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller"><span
                                                                    class="product-seller-details-label">فروشنده:
                                                            </span> {{\App\PublicModel::EnappName()}}</span>

                                                                <span class="product-seller-details-badge-container"></span>
                                                            </div>
                                                            <a class="product-box-img" href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                                                <img src="{{(new \App\PublicModel())->image_cover($product)}}" alt="">
                                                            </a>
                                                            <div class="product-box-content">
                                                                <div class="product-box-content-row">
                                                                    <div class="product-box-title">
                                                                        <a href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                                                            {{$product->name}}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-box-row product-box-row-price">
                                                                    <div class="price">
                                                                        <div class="price-value">
                                                                            <div class="price-value-wrapper">
                                                                                {{number_format($product->price_main)}} <span
                                                                                        class="price-currency">تومان</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php  $index++;?>
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                        @foreach($products as $product)

                                                <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
                                                    @if((new \App\Model\ProductModel($product->id))->count()<1)
                                                        <div class="label-check">موجود نیست</div>
                                                    @endif
                                                    <div class="product-box">
                                                        <div
                                                                class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller"><span
                                                                    class="product-seller-details-label">فروشنده:
                                                            </span> {{\App\PublicModel::EnappName()}}</span>&ensp;
                                                            <span><i class="fa fa-eye"></i>&ensp;{{number_format($product->view)}}</span>
                                                            <span class="product-seller-details-badge-container"></span>
                                                        </div>
                                                        <a class="product-box-img" href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                                            <img src="{{(new \App\PublicModel())->image_cover($product)}}" alt="">
                                                        </a>
                                                        <div class="product-box-content">
                                                            <div class="product-box-content-row">
                                                                <div class="product-box-title">
                                                                    <a href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                                                        {{$product->name}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="product-box-row product-box-row-price">
                                                                <div class="price">
                                                                    <div class="price-value">
                                                                        <div class="price-value-wrapper">
                                                                            {{number_format($product->price_main)}} <span
                                                                                    class="price-currency">تومان</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php  $index++;?>

                                        @endforeach
                                    @endif

                                    @if($index<1)
                                        <h3>
                                            هیچ کالایی یافت نشد!
                                        </h3>
                                        <img src="{{url('public')}}/404.png" >
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="pager default text-center">


                    </div>
                </div>

            </div>
        </div>

    </div>



@endsection



