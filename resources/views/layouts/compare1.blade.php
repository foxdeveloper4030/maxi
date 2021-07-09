@extends('layouts.app')
@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    مقایسه
@endsection
@section('content')

    <div class="row mt-5 mb-5">


        <table class="table table-striped">
            <thead>
            <tr>

                <th>
                    @foreach(session('compare') as $pid)
                        <?php
                        $product = \App\Product::query()->find($pid);
                        ?>
                    <div class="widget widget-product card " style="max-width: 200px;">
                        <header class="card-header">

                            <a href="{{route('main.compare.delete',['product_id'=>$product->id])}}">
                            <i class="fa fa-remove"></i>
                            </a>
                        </header>
                        <div class="item">
                            <a href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                <img style="max-height: 200px" src="{{(new \App\PublicModel())->image_cover($product)}}" class="img-fluid" alt="">
                            </a>
                            <p class="post-title small">
                                <a href="{{route('main.product.show',['slug'=>$product->slug])}}">{{$product->name}}</a>
                            </p>

                            <div class="btn-group">
                                <a href="{{route('main.product.show',['slug'=>$product->slug])}}"><button type="button" class="btn btn-info" style="margin-right: 25%">مشاهده </button>
                                </a>
                            </div>

                        </div>

                    </div>
                    @endforeach
                </th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">تعداد سیم کارت</span>
                </td>

                <td>
                    <label>
                        دو سیم کارت ( نانو )
                    </label>
                </td>

                <td>
                    <label>
                        دو سیم کارت ( نانو )
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <label>
                        دو سیم کارت ( نانو )
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">تراشه پردازنده</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        Qualcomm SM7125 Snapdragon 720G (8 nm)
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">پردازنده مرکزی</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        Octa-core (2x2.3 GHz Kryo 465 Gold &amp; 6x1.8 GHz Kryo 465 Silver)
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">پردازنده گرافیکی</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        Adreno 618
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">حافظه داخلی</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        128 گیگابایت
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">حافظه موقت ( RAM )</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        6 گیگابایت
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">نوع صفحه نمایش</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        Super AMOLED
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">اندازه صفحه نمایش</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        6.7 اینچ
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">رزولوشن صفحه نمایش</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        2400 × 1080 پیکسل
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">تعداد رنگ صفحه نمایش</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        16 میلیون رنگ
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">شبکه اینترنتی 2G</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        GSM 850 / 900 / 1800 / 1900
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">شبکه اینترنتی 3G</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">شبکه اینترنتی 4G</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        LTE
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">رزولوشن عکس دوربین</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        64 + 8 + 12 + 5 مگاپیکسل
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">فلش دوربین</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        دارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">رزولوشن فیلمبرداری</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        فیلم برداری 4K با سرعت 30 فریم در ثانیه
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">رزولوشن عکس دوربین سلفی</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        32 مگاپیکسل
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">بلندگو</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        دارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">جک 3.5 میلی‌متری</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        دارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">سیستم عامل</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        دارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">نسخه سیستم عامل</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        11.0
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">پشتیبانی از زبان فارسی</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        دارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">باتری قابل تعویض</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        ندارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">مشخصات باتری</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        لیتیوم یونی 5000 میلی‌آمپر
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">پشتیبانی از کارت حافظه جانبی</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        دارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">حسگر</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        اثرانگشت ، شتاب سنج ، ژیروسکوپ ، مجاورت ، قطب نما
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">تراکم پیکسلی</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        394 پیکسل بر اینچ
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">Wi-Fi</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        دارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">بلوتوث</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        نسخه 5.0
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">فناوری‌های مکان‌یابی</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        دارد
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">پورت USB</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        Type-C 2.0
                    </label>
                </td>

            </tr>
            <tr>
                <td>
                    <span style="background-color: #9f9f9f" class="block badge">رابط کاربری</span>
                </td>


            </tr>
            <tr>
                <td>
                    <label>
                        One UI 3.1
                    </label>
                </td>

            </tr>

            </tbody>

        </table>
    </div>


@endsection

@section('js')
    @include('sub.js')

@endsection

