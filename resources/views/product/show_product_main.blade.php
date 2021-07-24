@extends('layouts.app')
@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    {{$product->name}}
@endsection
@section('content')

<main class="single-product default">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('urlMain')}}"><span><img alt="فروشگاه آنلاین موبایل maximorse" width="20" height="20" src="https://img.icons8.com/dusk/2x/home.png"></span></a>
                        </li>
                        @if(count($categories) > 0)
                            @foreach($categories as $catName)

                                <a href="{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($catName)])}}">
                                    <img width="20" src="{{url('public/img/left-arrow.png')}}">
                                    {{$catName}}
                                </a>

                            @endforeach
                        @endif

                        <img width="20" src="{{url('public/img/left-arrow.png')}}">{{$product->name}}

                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <article class="product">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="product-gallery default">
                                <img class="zoom-img" id="img-product-zoom"
                                     src="{{(new App\PublicModel())->image_cover($product)}}"
                                     data-zoom-image="{{(new App\PublicModel())->image_cover($product)}}"
                                     width="411"/>

                                <div id="gallery_01f" style="width:500px;float:left;">
                                    <ul class="gallery-items owl-carousel owl-theme" id="gallery-slider">

                                        @foreach($product->images as $image)
                                            <li class="item">
                                                <a href="#" onclick="document.getElementById('img-product-zoom').src='{{(new App\PublicModel())->image_show($image)}}'" class="elevatezoom-gallery active" data-update=""
                                                   data-image="{{(new App\PublicModel())->image_show($image)}}"
                                                   data-zoom-image="{{(new App\PublicModel())->image_show($image)}}">
                                                    <img src="{{(new App\PublicModel())->image_show($image)}}"
                                                         width="100"/></a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <ul class="gallery-options">

                                <li>
                                    <a class="btn btn-sm" href="{{route('main.love.add',[$product->id])}}"><i
                                            class="fa fa-heart"></i></a>
                                    <span class="tooltip-option">افزودن به علاقمندی</span>
                                </li>
                                <li>
                                    <button class="btn btn-sm" onclick="compare_add({{$product->id}})"><i
                                            class="fa fa-list"></i></button>
                                    <span class="tooltip-option">افزودن به لیست مقایسه</span>
                                </li>

                            </ul>
                            <!-- Modal Core -->
                            <div class="modal-share modal fade" id="myModal" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">اشتراک گذاری</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-share">
                                                <div class="form-share-title">اشتراک گذاری در شبکه های اجتماعی
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="btn-group-share">
                                                            <li><a href="#" class="btn-share btn-share-twitter"
                                                                   target="_blank"><i
                                                                        class="fa fa-twitter"></i></a></li>
                                                            <li><a href="#" class="btn-share btn-share-facebook"
                                                                   target="_blank"><i
                                                                        class="fa fa-facebook"></i></a></li>
                                                            <li><a href="#"
                                                                   class="btn-share btn-share-google-plus"
                                                                   target="_blank"><i
                                                                        class="fa fa-google-plus"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-share-title">ارسال به ایمیل</div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="ui-input ui-input-send-to-email">
                                                            <input class="ui-input-field" type="email"
                                                                   placeholder="آدرس ایمیل را وارد نمایید.">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn-primary">ارسال</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <form class="form-share-url default">
                                                <div class="form-share-url-title">آدرس صفحه</div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="ui-url">
                                                            <input class="ui-url-field"
                                                                   value="https://www.digikala.com">
                                                        </label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Core -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="product-title default">
                                <h1>
                                    {{$product->name}}
                                </h1>
                            </div>
                            <div class="product-directory default">
                                <ul>

                                    <li>
                                        <span>دسته‌بندی</span> :
                                        <a class="btn-link-border">
                                            {{$product->category->name}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-delivery-seller default">
                                <p>
                                    <i class="now-ui-icons shopping_shop"></i>
                                    <span>فروشنده:‌</span>
                                    <a href="{{url('')}}" class="btn-link-border">ماکسی مورس</a>
                                </p>
                            </div>
                            @if($type==0)
                                <?php
                                $off = 0;
                                if (isset($product->special))
                                    if ($product->special->expire > time()) {
                                        $price = $price - $product->special->price_off;
                                        $off = $product->special->price_off;
                                    }

                                ?>
                                <br>
                                <div style="top: 100px;" class="price-product defualt">
                                    @if($count!=0)
                                        <div class="price-value">
                                            <span>{{number_format($price)}}</span>
                                            <span class="price-currency">تومان</span>
                                        </div>
                                    @else
                                        <div class="price-value">

                                            <span class="price-currency">برای گرفتن قیمت تماس بگیری.</span>
                                        </div>

                                    @endif

                                    @if(number_format($off*100/$product->price_main)>0)
                                        <div class="price-discount" data-title="تخفیف">
                                            <span>
                                                {{number_format($off*100/$product->price_main)}}
                                            </span>
                                            <span>%</span>
                                        </div>
                                    @endif
                                </div>
                                <br>
                                <div class="product-add default">
                                    <div class="parent-btn">
                                        @if($count!=0)
                                            <button onclick="simplecart()" class="dk-btn dk-btn-info">
                                                افزودن به سبد خرید
                                                <i class="now-ui-icons shopping_cart-simple"></i>
                                            </button>
                                        @else
                                            <a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
                                                اتمام موجودی!
                                                <i class="now-ui-icons show-less"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <script>
                                    function simplecart(count = 1) {


                                        $(document).ready(function () {
                                            loader_show();

                                            $.post("{{route('simpelcart')}}",
                                                {
                                                    _token: "{{csrf_token()}}",
                                                    id: "{{$product->id}}"
                                                },
                                                function (data, status) {

                                                    loader_dismis();

                                                    show_cart();

                                                    if (data['state']['status'] == true)
                                                        Swal.fire(
                                                            ' ',
                                                            'محصول با موفقیت به سبد خرید اضاف شد',
                                                            'success'
                                                        );
                                                    else
                                                        Swal.fire({
                                                            type: 'error',
                                                            title: ' ',
                                                            text: 'تعداد محصول بیشتر از موجودی می باشد',
                                                        });
                                                });
                                        });
                                    }
                                </script>
                            @else
                                @include('front.product.selectAttribute')
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 center-breakpoint">

                            <div class="product-params default">
                                <ul data-title="ویژگی‌های محصول">
                                    {!! $product->details !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-12 default no-padding">
                    <div class="product-tabs default">
                        <div class="box-tabs default">
                            <ul class="nav" role="tablist">
                                <li class="box-tabs-tab">
                                    <a class="active" data-toggle="tab" href="#desc" role="tab"
                                       aria-expanded="true">
                                        <i class="now-ui-icons objects_umbrella-13"></i> نقد و بررسی
                                    </a>
                                </li>
                                <li class="box-tabs-tab">
                                    <a data-toggle="tab" href="#params" role="tab" aria-expanded="false">
                                        <i class="now-ui-icons shopping_cart-simple"></i> مشخصات
                                    </a>
                                </li>
                                <li class="box-tabs-tab">
                                    <a data-toggle="tab" href="#comments" role="tab" aria-expanded="false">
                                        <i class="now-ui-icons shopping_shop"></i> نظرات کاربران
                                    </a>
                                </li>
                                <li class="box-tabs-tab">
                                    <a data-toggle="tab" href="#questions" role="tab" aria-expanded="false">
                                        <i class="now-ui-icons ui-2_settings-90"></i> پرسش و پاسخ
                                    </a>
                                </li>
                            </ul>
                            <div class="card-body default">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="desc" role="tabpanel"
                                         aria-expanded="true">
                                        <article>

                                            <h2 class="param-title">
                                                نقد و بررسی تخصصی
                                                <span>{{$product->name}}</span>
                                            </h2>
                                            <div class="parent-expert default">
                                                {!!  $product->description!!}
                                            </div>

                                        </article>
                                    </div>
                                    <div class="tab-pane fade params" id="params" role="tabpanel"
                                         aria-expanded="false">
                                        <article>
                                            <h2 class="param-title">
                                                مشخصات فنی
                                                <?php  $category=\App\PublicModel::parent($product);
                                                $sub='';
                                                ?>
                                                <span>{{$product->name}}</span>
                                            </h2>
                                            <section>




                                                <ul class="params-list">
                                                    @foreach($category->feature_category as $feature_cat)
                                                      <?php

                                                      $isfeature = false;
                                                      ?>
                                                          @foreach($feature_cat->features as $feature)

                                                              @if(App\PublicModel::feature_value($product->id,$feature->id)!=" ")
                                                                  <?php $isfeature=true; ?>
                                                              @endif

                                                          @endforeach
                                                      @if($isfeature)
                                                        <hr>
                                                        <div class="badge badge-success">{{$feature_cat->name}}</div>


                                                        <li>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                @foreach($feature_cat->features as $feature)

                                                                    @if(App\PublicModel::feature_value($product->id,$feature->id)!=" ")

                                                                        <tr style="margin: 10px">
                                                                            <th style="margin: 10px;background-color: #d0cdcd;">{{$feature->feature}}</th>
                                                                            <th style="margin: 10px;background-color: #a5a4a4;">{{App\PublicModel::feature_value($product->id,$feature->id)}}</th>

                                                                        </tr>

                                                                    @endif

                                                                @endforeach
                                                                </thead>

                                                            </table>

                                                        </li>
                                                       @endif

                                                    @endforeach
                                                </ul>
                                            </section>
                                        </article>
                                    </div>
                                    <div class="tab-pane fade" id="comments" role="tabpanel" aria-expanded="false">
                                        <article>
                                            <h2 class="param-title">
                                                نظرات کاربران
                                                <span>{{count($product->comments->where('deleted','=',0))}}</span>
                                            </h2>
                                            <div class="comments-area default">
                                                <ol class="comment-list">
                                                @forelse($product->comments->where('deleted','=',0) as $comment)
                                                    <!-- #comment-## -->
                                                        <li>
                                                            <div class="comment-body">
                                                                <div class="comment-author">
                                                                    <img alt="" src="assets/img/default-avatar.png"
                                                                         class="avatar"><cite
                                                                        class="fn">{{\App\User::query()->find($comment->user_id)->firstname}}</cite>
                                                                    <span class="says">گفت:</span></div>

                                                                <div class="commentmetadata"><a>
                                                                        {{$comment->created_at}}</a></div>

                                                                <p>{{$comment->message}}</p>


                                                            </div>
                                                        </li>
                                                    @empty
                                                        <div class="alert alert-info">
                                                            هنوز نظری در مورد این محصول وجود ندارد اولین نفری باشید
                                                            که در مورد محصول نظر میدهید.
                                                        </div>
                                                        <!-- #comment-## -->
                                                    @endforelse

                                                </ol>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="tab-pane fade form-comment" id="questions" role="tabpanel"
                                         aria-expanded="false">
                                        @auth
                                            <article>
                                                <h2 class="param-title">
                                                    افزودن نظر
                                                    <span>نظر خود را در مورد محصول مطرح نمایید</span>
                                                </h2>
                                                <form method="post"
                                                      action="{{route('main.product.comment')}}/{{$product->id}}"
                                                      class="comment">
                                                    @csrf
                                                    <textarea name="message" class="form-control" placeholder="نظر"
                                                              rows="5"></textarea>
                                                    <button class="btn btn-default">ارسال نظر</button>
                                                </form>
                                            </article>
                                        @else
                                            برای ارسال نظر ابتدا وارد <a class="btn-link-border form-account-link"
                                                                         href="{{route('login')}}">پنل کاربری</a>
                                            خود شوید.
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-10">
            <div class="widget widget-product card">
                <header class="card-header">
                    <h3 class="card-title">
                        <?php  $category = \App\Category::query()->find($product->category_id);?>
                        <span>محصولات مرتبط</span>
                    </h3>
                    <a href="{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}"
                       class="view-all">مشاهده همه</a>

                </header>
                <div class="product-carousel owl-carousel owl-theme">

                    @foreach(\App\Product::query()->orWhere('price_main','>',1000)->where('category_id','=',$category->id)->orderByDesc('id')->limit(10)->get() as $product)
                        <div class="item" style="max-width: 300px;">
                            <a href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                <img style="max-height: 200px"
                                     src="{{(new \App\PublicModel())->image_cover($product,1)}}"
                                     class="img-fluid" alt="">
                            </a>
                            <h2 class="post-title">
                                <a href="{{route('main.product.show',['slug'=>$product->slug])}}">{{$product->name}}</a>
                            </h2>
                            @include('product.price')

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</main>

@endsection

@section('js')

    <script>


        function loader_show() {
            document.getElementById('loader').style.display = 'block';
        }

        function loader_dismis() {
            document.getElementById('loader').style.display = 'none';
        }


    </script>
    <script>
        function delete_cart(id) {
            $(document).ready(function () {
                loader_show();
                $.get("{{route('deletecart')}}/"+id,
                    function (data, status) {
                        loader_dismis();

                        show_cart();
                        Swal.fire(
                            ' ',
                            'محصول از سبد خرید شما حذف شد!',
                            'success'
                        );

                    });
            });
        }
        proajax();

        $(document).ready(function () {

            function createStatusNewsletterOfElement(idDiv, textColor, backGroundColor, msgText) {
                let div = document.createElement("div");
                div.style.cssText = 'color: ' + textColor + ';background-color: ' + backGroundColor + ';margin-top: 1%';
                div.className = 'alert';
                div.setAttribute('id', idDiv)

                let aTag = document.createElement("a");
                aTag.style.cssText = 'cursor: none';
                aTag.className = 'alert-link';
                let node = document.createTextNode(msgText);
                aTag.appendChild(node);

                div.appendChild(aTag);

                document.getElementById('newsletter').appendChild(div);
            }

            $('#newsletter').on('submit', function (e) {
                e.preventDefault();
                let url_ = $(this).attr('data-url');
                $.ajax({
                    type: "POST",
                    url: url_,
                    data: $(this).serialize(),
                    success: function (data) {
                        // console.table(data);
                        // debugger;

                        if (data.statusNewsletterNo) {
                            let elementduplicate = document.getElementById('notLoginUser');
                            if (elementduplicate == null) {
                                createStatusNewsletterOfElement('notLoginUser', '#721c24', '#f8d7da', 'ابتدا ثبت نام کنید، یا وارد سایت شوید.')
                            }
                        } else if (data.statusNewsletterYes) {
                            let elementduplicate = document.getElementById('newsLetterYes');
                            if (elementduplicate == null) {
                                createStatusNewsletterOfElement('newsLetterYes', '#155724', '#d4edda', 'ایمیل شما در خبرنامه، ثبت گردید.')
                            }
                        } else if (data.statusNewsletterHasOK) {
                            let elementduplicate = document.getElementById('newsLetterHasOK');
                            if (elementduplicate == null) {
                                createStatusNewsletterOfElement('newsLetterHasOK', '#0c5460', '#d1ecf1', 'قبلا، در خبرنامه عضو شده اید!')
                            }
                        }
                        $('#guideCheckboxNewsletter').css('top', '12%');
                    }, error: function (error) {
                        // swal("", "تغییرات انجام نشد.", "error");
                    }
                })
            });  // end of delete image
        });//  end of jquery

    </script>

    @include('sub.js')
@endsection



