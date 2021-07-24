


<header class="main-header default" >
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="logo-area default">
                    <a href="{{route('urlMain')}}">
                        <img   src="{{asset('public/assets/img/logo.jpg')}}" alt=" فروشگاه آنلاین ماکزی مورس">

                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-8 col-7">
                <div class="search-area default">
                    <form action="" class="search">
                        <input type="text" id="gsearchsimple"
                               placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">

                        <div class="localSearchSimple"></div>
                        <button type="button"
                                onclick="window.location.href='{{url('')}}/search/'+document.getElementById('gsearchsimple').value">
                            <img src="{{asset('public/assets/img/search.png')}}" alt=""></button>

                    </form>

                </div>
                <div class="overlay-search-box">
                    <div style="background-color: white;height: 200px;border: 1px solid #f44336;border-radius: 20px;padding: 10px;overflow-y: scroll" >
                        <div id="search-result" style="margin: 5px;">

                        </div>
                        <hr>
                        <p><small>پر جستجوترین</small> <i class="fa fa-fire"></i> </p>
                        <div style="margin: 5px">
                            @foreach(\App\Category::query()->orderByDesc('seen')->limit(10)->get() as $category)

                                <a style="display: inline" href="{{route('category.show',['name'=>$category->name])}}">
                                             <span class="badge" style="border: 1px solid #f44336;background-color: #e7e4e4">
                                                {{$category->name}}
                                             </span>
                                </a>

                            @endforeach
                        </div>
                        <hr>
                        <div style="margin: 5px">

                            @foreach(\App\Product::query()->orderByDesc('view')->limit(10)->get() as $product)
                                <a style="display: inline" href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                             <span class="badge" style="border: 1px solid #f44336;background-color: #e7e4e4">
                                                 {{$product->name}}
                                             </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="user-login dropdown">
                    @guest
                        <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                           id="navbarDropdownMenuLink1"
                           style="background-color: #ef5661;border-radius: 5px;color: #fff;font-size:
                                                      15px;margin-top: 5px;padding: 0px;width: 85%;height:
                                                      43px;line-height: 38px;margin-left: -10%;">
                            ورود / ثبت نام
                        </a>
                    @endguest

                    @auth
                        <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                           id="navbarDropdownMenuLink1"
                           style="background-color: #ef5661;border-radius: 5px;color: #fff;font-size:
                           30px;margin-top: 5px;padding: 0px;width: 85%;height:
                           43px;line-height: 33px;margin-left: -10%;"
                        >

                            @if(\Illuminate\Support\Facades\Auth::user()->firstname	== null)
                                <i class="fa fa-user-circle-o"
                                   style="margin-top:4%"></i>
                            @else
                                <div style="display: inline;font-size: 12px;margin-right: 1%;">
                                    {{\Illuminate\Support\Facades\Auth::user()->fullname}}
                                </div>
                            @endif

                        </a>
                    @endauth
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        @guest
                            <div class="dropdown-item">
                                <a href="{{route('login')}}" class="btn btn-info">ورود به {{\App\PublicModel::EnappName()}}</a>
                            </div>
                            <div class="dropdown-item font-weight-bold">
                                <span>کاربر جدید هستید؟</span> <a href="{{route('register')}}"
                                                                  class="register">ثبت‌نام</a>
                            </div>
                            <hr>
                        @endguest
                        @auth
                            <div class="dropdown-item">
                                <a href="{{route('main.user.index')}}" class="dropdown-item-link">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{route('main.refrense.index')}}" class="dropdown-item-link">
                                    <i class="now-ui-icons shopping_bag-16"></i>
                                    پیگیری سفارش
                                </a>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{route('mylogout')}}" class="dropdown-item-link">
                                    <i class="fa fa-sign-out"></i>
                                    خروج
                                </a>
                            </div>
                        @endauth
                    </ul>
                </div>
                @if(!session()->has('cart'))
                    <?php session(['cart' => array()]);  ?>

                @endif
                <div id="showcart">
                    @include('layouts.cart',['allcart'=>session('cart')])
                </div>
                <script>
                    function show_cart() {
                        $(document).ready(function () {
                            $.get("{{route('show_cart')}}",
                                {},
                                function (data, status) {
                                    document.getElementById('showcart').innerHTML = data;

                                });
                        });
                    }
                </script>
            </div>
            <div class="col-md-1 col-lg-2" id="compare_box" style="display: none">
                <div class="cart dropdown">
                    <a onclick="window.location.href='{{route('main.compare.show')}}'" class="btn dropdown-toggle"
                       data-toggle="dropdown" id="navbarDropdownMenuLink1">
                        <img src="https://img.icons8.com/dusk/64/000000/bar-chart.png">
                        مقایسه
                        <span class="count-cart"
                              id="compare_id">@if(is_array(session('compare'))){{count(session('compare'))}}@endif</span>
                    </a>

                </div>
            </div>
            @if(session()->has('compare'))
                @if(count(session('compare'))>0)
                    <script>
                        document.getElementById('compare_box').style.display = 'block';
                    </script>
                @endif
            @endif

        </div>
    </div>
    <nav class="main-menu" style="background-color: #0c0a2d">
        <div class="container" >
            <ul class="list float-right">
                @php($counter=0)
                @foreach(\App\Category::query()->orWhere('home','=',1)->where('parent_id','=',0)->get() as $category)
                    @php($counter++)
                    @if(empty($category->childs))
                        <li class="list-item ">

                            <a class="nav-link"
                               href="{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}">{{$category->name}}</a>
                        </li>
                    @else
                        <li class="list-item list-item-has-children mega-menu mega-menu-col-5 " >
                            <a class="nav-link"
                               href="{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}">{{$category->name}}&ensp;<i class="fa fa-mobile"></i></a>
                            <ul class="sub-menu nav categoryHover" style=" background: rgb(0,159,255);
background: linear-gradient(90deg, rgba(0,159,255,1) 2%, rgba(9,15,121,0.9247898988697041) 28%, rgba(2,0,36,1) 80%); ">
                                @include('layouts.category_childs',['childs'=>$category->childs->all()])
                                <img src="{{asset('public/assets/img/139'.$counter.'.jpg')}}" alt="">
                            </ul>
                        </li>
                    @endif

                @endforeach


            </ul>
        </div>
    </nav>
</header>
<!-- Modal -->


