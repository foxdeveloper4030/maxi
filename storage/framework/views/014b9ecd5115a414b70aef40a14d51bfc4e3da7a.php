<header class="main-header default">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="logo-area default">
                    <a href="<?php echo e(route('urlMain')); ?>">
                        <img src="<?php echo e(asset('public/assets/img/logo.jpg')); ?>" alt="">
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
                                onclick="window.location.href='<?php echo e(url('')); ?>/search/'+document.getElementById('gsearchsimple').value">
                            <img src="<?php echo e(asset('public/assets/img/search.png')); ?>" alt=""></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="user-login dropdown">
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                           id="navbarDropdownMenuLink1"
                           style="background-color: #ef5661;border-radius: 5px;color: #fff;font-size:
                                                      15px;margin-top: 5px;padding: 0px;width: 85%;height:
                                                      43px;line-height: 38px;margin-left: -10%;">
                            ورود / ثبت نام
                        </a>
                    <?php endif; ?>

                    <?php if(auth()->guard()->check()): ?>
                        <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                           id="navbarDropdownMenuLink1"
                           style="background-color: #ef5661;border-radius: 5px;color: #fff;font-size:
                           30px;margin-top: 5px;padding: 0px;width: 85%;height:
                           43px;line-height: 33px;margin-left: -10%;"
                        >

                            <?php if(\Illuminate\Support\Facades\Auth::user()->firstname	== null): ?>
                                <i class="fa fa-user-circle-o"
                                   style="margin-top:4%"></i>
                            <?php else: ?>
                                <div style="display: inline;font-size: 12px;margin-right: 1%;">
                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->fullname); ?>

                                </div>
                            <?php endif; ?>

                        </a>
                    <?php endif; ?>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <?php if(auth()->guard()->guest()): ?>
                            <div class="dropdown-item">
                                <a href="<?php echo e(route('login')); ?>" class="btn btn-info">ورود به خانه موبایل</a>
                            </div>
                            <div class="dropdown-item font-weight-bold">
                                <span>کاربر جدید هستید؟</span> <a href="<?php echo e(route('register')); ?>"
                                                                  class="register">ثبت‌نام</a>
                            </div>
                            <hr>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <div class="dropdown-item">
                                <a href="<?php echo e(route('main.user.index')); ?>" class="dropdown-item-link">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                            </div>
                            <div class="dropdown-item">
                                <a href="<?php echo e(route('main.refrense.index')); ?>" class="dropdown-item-link">
                                    <i class="now-ui-icons shopping_bag-16"></i>
                                    پیگیری سفارش
                                </a>
                            </div>
                            <div class="dropdown-item">
                                <a href="<?php echo e(route('mylogout')); ?>" class="dropdown-item-link">
                                    <i class="fa fa-sign-out"></i>
                                    خروج
                                </a>
                            </div>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php if(!session()->has('cart')): ?>
                    <?php session(['cart' => array()]);  ?>

                <?php endif; ?>
                <div id="showcart">
                    <?php echo $__env->make('layouts.cart',['allcart'=>session('cart')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <script>
                    function show_cart() {
                        $(document).ready(function () {
                            $.get("<?php echo e(route('show_cart')); ?>",
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
                    <a onclick="window.location.href='<?php echo e(route('main.compare.show')); ?>'" class="btn dropdown-toggle"
                       data-toggle="dropdown" id="navbarDropdownMenuLink1">
                        <img src="https://img.icons8.com/dusk/64/000000/bar-chart.png">
                        مقایسه
                        <span class="count-cart"
                              id="compare_id"><?php if(is_array(session('compare'))): ?><?php echo e(count(session('compare'))); ?><?php endif; ?></span>
                    </a>

                </div>
            </div>
            <?php if(session()->has('compare')): ?>
                <?php if(count(session('compare'))>0): ?>
                    <script>
                        document.getElementById('compare_box').style.display = 'block';
                    </script>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
    <nav class="main-menu">
        <div class="container">
            <ul class="list float-right">
                <?php ($counter=0); ?>
                <?php $__currentLoopData = \App\Category::query()->orWhere('home','=',1)->where('parent_id','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php ($counter++); ?>
                    <?php if(empty($category->childs)): ?>
                        <li class="list-item">
                            <a class="nav-link"
                               href="<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])); ?>"><?php echo e($category->name); ?></a>
                        </li>
                    <?php else: ?>
                        <li class="list-item list-item-has-children mega-menu mega-menu-col-5">
                            <a class="nav-link"
                               href="<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])); ?>"><?php echo e($category->name); ?></a>
                            <ul class="sub-menu nav categoryHover">
                                <?php echo $__env->make('layouts.category_childs',['childs'=>$category->childs->all()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <img src="<?php echo e(asset('public/assets/img/139'.$counter.'.jpg')); ?>" alt="">
                            </ul>
                        </li>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="list-item amazing-item">
                    <a class="nav-link" href="<?php echo e(route('main.special')); ?>" target="_blank">شگفت‌انگیزها</a>
                </li>
                <li class="list-item amazing-item">
                    <a class="nav-link" href="<?php echo e(route('main.refrense.index')); ?>" target="_blank">پیگیری سفارش</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="overlay-search-box"></div>
<?php /**PATH C:\xampp\htdocs\khanehkalaWithMelat\resources\views/sub/myheader.blade.php ENDPATH**/ ?>