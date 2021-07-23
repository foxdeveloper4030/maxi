<nav class="navbar direction-ltr fixed-top header-responsive">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="#pablo">
                <img src="{{asset('public/assets/img/logo.jpg')}}" height="24px" alt="">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            <div class="search-nav default">
                <form action="">
                    <input type="text" id="gsearchsimple" placeholder="جستجو ...">
                    <button type="button" onclick="window.location.href='{{url('')}}/search/'+document.getElementById('gsearchsimple').value"><img src="{{asset('public/assets/img/search.png')}}" alt=""></button>
                </form>
                <ul>
                    <li><a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-user"><i class="now-ui-icons users_single-02"></i></a>

                    </li>
                    <li><a href="{{route('main.show.cart')}}"><i class="now-ui-icons shopping_basket"></i></a></li>
                </ul>
            </div>
            <div class="overlay-search-box">
                <div style="background-color: red">
                    4444
                </div>
            </div>
        </div>


        <!-- Modal -->






        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div class="logo-nav-res default text-center">
                <a href="#">
                    <img src="{{asset('public/assets/img/logo.jpg')}}" height="36px" alt="">
                </a>
            </div>
            <ul class="navbar-nav default">
                @foreach(\App\Category::query()->orWhere('home','=',1)->where('parent_id','=',0)->get() as $category)
                  @if(empty($category->childs))
                        <li>
                            <a href="#"> <p style="cursor: pointer" onclick="window.location.href='{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}'">{{$category->name}}</p>
                            </a>
                        </li>
                      @else
                        <li class="sub-menu">
                            <a href="#"> <p style="cursor: pointer" onclick="window.location.href='{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}'">{{$category->name}}</p>
                            </a>
                            <ul>
                                @include('layouts.category_childs_responsive',['childs'=>$category->childs->all()])
                            </ul>
                        </li>
                  @endif

                @endforeach

            </ul>
        </div>
    </div>
</nav>


<div id="myModal-user" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <ul  aria-labelledby="navbarDropdownMenuLink1">
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
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>



