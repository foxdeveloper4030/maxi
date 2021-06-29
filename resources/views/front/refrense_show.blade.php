


@extends('layouts.app')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    پیگیری سفارش
@endsection

@section('content')
    <!-- main -->
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                @if(isset($alert))
                                    <div class="alert alert-danger">
                                        {{$alert}}
                                    </div>
                                @endif
                                <h1 class="title-tab-content">پیگیری سفارش</h1>
                            </div>
                            <div class="content-section default">

                                <div class="content-section default">
                                    <div class="table-responsive">
                                        <table class="table table-order">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">شماره سفارش</th>
                                                <th scope="col">تاریخ ثبت سفارش</th>
                                                <th scope="col">مبلغ کل</th>
                                                <th scope="col">عملیات پرداخت</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="order-code">{{$order->refrens}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{number_format($order->price)}}</td>
                                                <td class="text-success">{!! (new \App\OrderModul($order))->state() !!}</td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="content-section default">

                                <div class="content-section default">
                                    <div class="table-responsive">
                                        <table class="table table-order">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">محصول</th>
                                                <th scope="col">تصویر محصول</th>
                                                <th scope="col">قیمت محصول</th>
                                                <th scope="col"> تعداد</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($order->carts as $cart)
                                            <tr>
                                                <td>1</td>

                                                <td class="order-code">{{\App\Product::query()->find($cart->product_id)->name}}</td>
                                                <td><img src="{{(new \App\PublicModel())->image_cover(\App\Product::query()->find($cart->product_id))}}"></td>
                                                <td>{{number_format($order->price)}}</td>
                                                <td class="text-success">{{$cart->count}}</td>

                                            </tr>
                                            @empty
                                                <tr class="alert alert-danger">
                                                   هیچ سبد خریدی وجود ندارد
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->

@endsection


