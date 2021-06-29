<?php
$holeprice = 0;
$counter = 0;
$off=0;
foreach ($allcart as $cart) {
    $holeprice += $cart["price"];
    $counter++;
    if (isset($cart["price_off"]))
        $off+=$cart["price_off"];

}

?>
@if(count($allcart)>0)
    <div class="cart-page-content col-xl-9 col-lg-8 col-md-12 order-1">
        <div class="cart-page-title">
            <h1>سبد خرید</h1>
        </div>
        <div class="table-responsive checkout-content default">
            @if(count($allcart)>0)
                <table class="table">
                    <tbody>
                    @foreach(session('cart') as $cart)
                        <tr class="checkout-item">
                            <td>
                                <img width="70"
                                     src="{{(new App\PublicModel())->image_cover(App\Product::query()->find($cart["product_id"]))}}">

                            </td>
                            <td>
                                <h3 class="checkout-title">
                                    {{App\Product::query()->find($cart["product_id"])->name}}

                                </h3>
                            </td>
                            <td>

                            </td>
                            <td><input disabled="disabled" type="number"

                                       value="{{$cart['count']}}"> عدد
                            </td>
                            <td>{{number_format($cart['price'])}} تومان</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">
                    سبد خرید شما خالی می باشد.
                </div>
            @endif

        </div>
    </div>
    @if($holeprice>1000)
        <aside class="cart-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-2">
            <div class="checkout-aside">
                <div class="checkout-summary">
                    <div class="checkout-summary-main">
                        <ul class="checkout-summary-summary">
                            <li><span>مبلغ کل ({{$counter}} کالا)</span><span> تومان{{number_format($holeprice)}}</span>


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
                                <span class="checkout-summary-price-value-amount">{{number_format($holeprice)}}</span>تومان
                            </div>
                             @if($off>0)
                            <div class="checkout-summary-price-title">تخفیف:</div>
                            <div class="checkout-summary-price-value">
                                <span class="checkout-summary-price-value-amount">{{number_format($off)}}</span>تومان
                            </div>
                            @endif
                            <a href="#" class="selenium-next-step-shipping">
                                <div class="parent-btn">
                                    <a href="{{route('main.order.register')}}" class="dk-btn dk-btn-info">
                                        ادامه ثبت سفارش
                                        <i class="now-ui-icons shopping_basket"></i>
                                    </a>
                                </div>
                            </a>
                            <div>
                                <span>
                                    کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی
                                    را تکمیل
                                    کنید.
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
    @endif
@else
    <div class="container text-center">
        <div class="cart-empty">
            <div class="cart-empty-icon">
                <i class="now-ui-icons shopping_basket"></i>
            </div>
            <div class="cart-empty-title">سبد خرید شما خالیست!</div>
            <div class="parent-btn">
                <a href="{{url('')}}" class="dk-btn dk-btn-success">
                    افزودن محصول
                    <i class="fa fa-sign-in"></i>
                </a>
            </div>
        </div>
    </div>

@endif
