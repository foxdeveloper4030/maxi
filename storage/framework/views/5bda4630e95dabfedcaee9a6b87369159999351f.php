<header class="main-header">
    <!-- Logo -->
    <a class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">پنل</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
        <span><a class="button2" href="<?php echo e(url('')); ?>" target="_blink">مشاهده سایت</a></span>
        <style>

            .button2 {
                display: inline-block;
                text-align: center;
                vertical-align: middle;
                padding: 4px 24px;
                border: 1px solid #62727b;
                font-family: "B Yekan" !important;
                border-radius: 8px;
                background: #62727b;
                background: -webkit-gradient(linear, left top, left bottom, from(#37474f), to(#102027));
                background: -moz-linear-gradient(top, #37474f, #102027);
                background: linear-gradient(to bottom, #37474f, #102027);
                -webkit-box-shadow: #62727b 0px 0px 40px 0px;
                -moz-box-shadow: #62727b 0px 0px 40px 0px;
                box-shadow: #62727b 0px 0px 40px 0px;
                text-shadow: #102027 1px 1px 1px;
                font: normal normal bold 15px arial;
                color: #ffffff;
                text-decoration: none;
            }

            .button2:hover,
            .button2:focus {
                border: 1px solid #d9ebf3;
                background: #b8c7ce;
                background: -webkit-gradient(linear, left top, left bottom, from(#a2afb5), to(#b8c7ce));
                background: -moz-linear-gradient(top, #a2afb5, #b8c7ce);
                background: linear-gradient(to bottom, #a2afb5, #b8c7ce);
                text-shadow: none;
                color: #222d32;
                transition: all 0.2ms ease;
                text-decoration: none;
            }

            .button2:active {
                color: #0a0a0a;
                background: #e1e2e7;
                background: -webkit-gradient(linear, left top, left bottom, from(#e1e2e7), to(#F4F5FA));
                background: -moz-linear-gradient(top, #e1e2e7, #F4F5FA);
                background: linear-gradient(to bottom, #e1e2e7, #F4F5FA);
            }

        </style>

        <?php
        $avatar = 'dist/img/avatar.png';
        if (\Illuminate\Support\Facades\Auth::user()->avatar != null)
            $avatar = \Illuminate\Support\Facades\Auth::user()->avatar;
        ?>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            
            
            

            
            
            
            
            
            

            
            
            
            
            
            
            
            <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <?php $user4030 = \Illuminate\Support\Facades\Auth::user();?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e($avatar); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo e($user4030->fullname); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo e($avatar); ?>" class="user-image" alt="User Image">
                            <p>
                                <?php if($user4030->mobile): ?>
                                    <?php echo e($user4030->mobile); ?>

                                <?php else: ?>
                                    <?php echo e($user4030->email); ?>

                                <?php endif; ?>
                            </p>

                            <label>آخرین بازدید:</label> <i class="fa fa-long-arrow-down"></i>
                            <br>

                            <span
                                style="display: block"><small><?php echo e((new \App\Model\Date())->jdate('j/F/Y، ساعت H:i:s',$user4030->last_seen)); ?></small></span>
                            <br>

                            <span> <a class="button" href="<?php echo e(route('logout')); ?>" title="خروج"></a></span>
                            <span><a class="button1" href="<?php echo e(url('')); ?>/user/panel/changepass">تغیر پسورد</a></span>


                            <style>
                                .button {
                                    display: inline-block;
                                    text-align: center;
                                    vertical-align: middle;
                                    padding: 4px 8px;
                                    border: 1px solid #982727;
                                    border-radius: 8px;
                                    background: #ff4a4a;
                                    background: -webkit-gradient(linear, left top, left bottom, from(#ff4a4a), to(#982727));
                                    background: -moz-linear-gradient(top, #ff4a4a, #982727);
                                    background: linear-gradient(to bottom, #ff4a4a, #982727);
                                    -webkit-box-shadow: #ff5959 0px 0px 40px 0px;
                                    -moz-box-shadow: #ff5959 0px 0px 40px 0px;
                                    box-shadow: #ff5959 0px 0px 40px 0px;
                                    text-shadow: #5a1717 1px 1px 1px;
                                    font: normal normal bold 12px arial;
                                    color: #ffffff;
                                    text-decoration: none;
                                }

                                .button:hover,
                                .button:focus {
                                    border: 1px solid #b32e2e;
                                    background: #ff5959;
                                    background: -webkit-gradient(linear, left top, left bottom, from(#ff5959), to(#b62f2f));
                                    background: -moz-linear-gradient(top, #ff5959, #b62f2f);
                                    background: linear-gradient(to bottom, #ff5959, #b62f2f);
                                    color: #ffffff;
                                    text-decoration: none;
                                }

                                .button:active {
                                    background: #982727;
                                    background: -webkit-gradient(linear, left top, left bottom, from(#982727), to(#982727));
                                    background: -moz-linear-gradient(top, #982727, #982727);
                                    background: linear-gradient(to bottom, #982727, #982727);
                                }

                                .button:before {
                                    content: "\0000a0";
                                    display: inline-block;
                                    height: 24px;
                                    width: 24px;
                                    line-height: 24px;
                                    margin: 0 4px -6px -4px;
                                    position: relative;
                                    top: 0px;
                                    left: 0px;
                                    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAA7EAAAOxAGVKw4bAAABS0lEQVRIibXVMUrEQBQG4M+wiIWF7AHEYyxWgoi1RxBvYSN6Ce08gLYiFt5hERtBUCwt1E4RyVpko7NDZjbZ1R+G+fPezP+GP2+SBRT+Eb3xXCYKhfGaH2T07nCOr3BvLFxM4aMp4zjemyvQBQVO8R4Ge0HyL4o8YUnD6cvx0PDclQvjPZMoM89xrhWKYI7HOvYTORke6zb6P8ArHtCPNuX4oaqTkuLG4pd4wyZexvGZLIq7aICLQPwxcYj4cKkuLOKbfIYVPKt6ug32cB/Far0yrvzZUrQNSn4tqrGDKyxiV2VRGyQvapgoMcQ2lnGNNXNetKYXOFS94LpIP9qU4+J4aFFY7BZb2FB1VNdv08/6sEAZJGu7bhriOR5qNXYR7ayY26J5keyiWT/R9byKjzAe34NwcYqP5HESrp/FoqNMrv7pT2h1/el34t99nXP8wmducAAAAABJRU5ErkJggg==") no-repeat left center transparent;
                                    background-size: 100% 100%;
                                }

                                .button1 {
                                    display: inline-block;
                                    text-align: center;
                                    vertical-align: middle;
                                    padding: 4px 8px;
                                    border: 1px solid #982727;
                                    border-radius: 8px;
                                    background: #ff4a4a;
                                    background: -webkit-gradient(linear, left top, left bottom, from(#ff4a4a), to(#982727));
                                    background: -moz-linear-gradient(top, #ff4a4a, #982727);
                                    background: linear-gradient(to bottom, #ff4a4a, #982727);
                                    -webkit-box-shadow: #ff5959 0px 0px 40px 0px;
                                    -moz-box-shadow: #ff5959 0px 0px 40px 0px;
                                    box-shadow: #ff5959 0px 0px 40px 0px;
                                    text-shadow: #5a1717 1px 1px 1px;
                                    font: normal normal bold 12px arial;
                                    color: #ffffff;
                                    text-decoration: none;
                                }

                                .button1:hover,
                                .button1:focus {
                                    border: 1px solid #b32e2e;
                                    background: #ff5959;
                                    background: -webkit-gradient(linear, left top, left bottom, from(#ff5959), to(#b62f2f));
                                    background: -moz-linear-gradient(top, #ff5959, #b62f2f);
                                    background: linear-gradient(to bottom, #ff5959, #b62f2f);
                                    color: #ffffff;
                                    text-decoration: none;
                                }

                                .button1:active {
                                    background: #982727;
                                    background: -webkit-gradient(linear, left top, left bottom, from(#982727), to(#982727));
                                    background: -moz-linear-gradient(top, #982727, #982727);
                                    background: linear-gradient(to bottom, #982727, #982727);
                                }

                                .button1:before {
                                    content: "\0000a0";
                                    display: inline-block;
                                    height: 24px;
                                    width: 24px;
                                    line-height: 24px;
                                    margin: 0 4px -6px -4px;
                                    position: relative;
                                    top: -110px;
                                    right: -115px;
                                    background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAELElEQVRIiX2WW2hUVxSGv7XnzCSTplVTk3hpaQ2hLXmo2pfS2kaoeHkqQlN9iWBLKdL0rUXIU5FWQ0oVkQpCnwQRDCI+2WtomEahlNZCJZSiqQpeajQdQybO5cz++3DOTGbGsfuwOf85Z+1/r/3vtdc6BjiatP0T/QC9ggHBJok+RJcHEHc8TCHGPYyZd9OfbploRoPFE/jaiQ5k+nsQI4LtwgJJSJG5jwBS3CGUOOs9wwe2Zi7X8HjA1U7A6OSrTj4YFByVaBdG2ROTGgZgipHwgrI3hJBnXjCUV8uJQ1u/rzjsq16PTr7iULAX4zjQHnrIl0SpHBEpvgwwhDNIJqA1KQIHGO3A8RYKez/6dnPV6coEDpKDwAgY+dAohFalAwPVYFvEZkZLEPXoGyNJCoMxdyTR55P9PcBFifaFklEMIw/NDENYDX7UezMohcZCSUjMS6wd3ZaZti9+6ncyTgkGCiHkCpGDzmIfY4cr2MXPS1tX8vJTb5Mr3uWXm6fxKuIsGl8IQeI0sp2BHL2I7WAsFJvEWBMcuBRv9e1j5ePPA1B4UOb32TEA2lLRBKDtQj0OGACCQkg1BEFxfxgvS6/i3ZeOcen2OAvFuWgD809UbZwTLYHALAB2OINNAMVQsU2FLA72GtyRXs2utYfpbFvDxjXvcP7aCa7PTHFh+tSiM4JUUB27KQD6wAjLDZI0yPJk22p2rTtI0trI5e/Tnl5KX8dmjk2+R1tnjbFBkIgfpT4HdCk+NI+SpSO9il3rDvJY0MHt2askXMC9uVt89cPHpJeAufqxzhQfSpbX5CE13Cvkq9m9/jBLWrq4PvMXT3c+x3z+PkfO7SHZnY3JGzkWsQPuGIarOTyVHpEfYklrF1duXaJnRR/Z3AxffjNE0J3FKjHbMM6rcki564ApUKSb6mV5YflrlH0ZSfSuepF7c/9w5NwHJDr/xTXIUsUSYbmCmXKCcYBUoHifoo8bntnJlt73+e3G18wu3GQme4PD5/YQdGdjcqqEdbIYFMMqz7gDxoCwJaiXKWEJEi7gjd7d/HztLEfHPyToyuIaZWmQyPsojwEhxlhguGnhzwIDbSmRK0Sp+O+ZP5ibyeNV5sKf3xF0Z1mWXsGa1OuUw2qUYMCd+SvMpi4SZYOqPGdkbjpKduf7e1Al2UVLrDhazUf8f46Kkh0slEBiTmL96LbMtAPYuyFzGTGEGemkkQrql/2QFE1wMTQelCrvGRrdlrkKNds1H9oJpGEQrUGUT6wxQppgCQqhKITVKBpuKeROxka+rmR+8uNGl04oKpnQLhGXzMi6VncgLpnxVJ45wVAynzu5781ffcXxpkV/JNP/rMToYtFfjMi40NfcFUqc8WL4wJbMVRpa3Qri5gC/f6LfYfRI7Kj8tkgsj1PW3drfFspu+rOtE76BywH+Pwt9Dzfrf7x2AAAAAElFTkSuQmCC") no-repeat left center transparent;
                                    background-size: 100% 100%;
                                }

                            </style>

                        </li>
                        <!-- Menu Body -->

                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- right side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="<?php echo e($avatar); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p><?php echo e($user4030->fullname); ?></p>
                <a><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <!-- search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><h4><a href="<?php echo e(route('admin.home')); ?>">داشبورد</a></h4></li>
            <li class="header">منو</li>
            <li class=" treeview <?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>">
                <a href="">
                    <i class="fa fa-shopping-basket active"></i><span>مدیریت سفارشات</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>"><a href="<?php echo e(route('admin.order.index')); ?>"><i class="fa fa-list"></i> سفارش ها</a>
                    </li>
                    <li class="<?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>"><a href="<?php echo e(route('admin.order.indexUnfinish')); ?>"><i class="fa fa-shopping-cart"></i>سبدهای
                            خرید ناتمام</a>
                </ul>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user')): ?>
                <li class="treeview <?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>">
                    <a href="">
                        <i class="fa fa-user"></i> <span>مدیریت کاربران</span>
                        <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="nav-item <?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>"><a href="<?php echo e(route('admin.users.show')); ?>" class="nav-link"><i class="fa fa-list"></i> لیست کاربران
                            </a>
                        </li>
                    </ul>
                </li>
                
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role')): ?>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user-circle-o"></i>
                        <span>مدیریت کارکنان</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-right pull-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(route('roles.index')); ?>"><i class="fa fa-rouble"></i>نقش‌ها</a>
                        </li>
                        <li><a href="<?php echo e(route('admin.roles.permission.create')); ?>"><i class="fa fa-plus-circle"></i>افزودن
                                مسئولیت به نقش‌ها</a>
                        </li>
                        <li><a href="<?php echo e(route('LevelManages.index')); ?>"><i class="fa fa-user-circle"></i>کاربران</a>
                        </li>
                        <li><a href="<?php echo e(route('admin.user.roles.create')); ?>"><i class="fa fa-user-plus"></i>افزودن نقش به
                                کاربران</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <li class="header">محصولات</li>
            <li class="treeview <?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>">
                <a href="">
                    <i class="fa fa-list-ol"></i> <span>دسته ها</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-edit-product')): ?>
                        <li>
                            <a href="<?php echo e(route('admincategory.create')); ?>"><i class="fa fa-plus-circle"></i> افزودن
                                دسته</a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-product')): ?>
                        <?php $__currentLoopData = \App\Category::query()->where('parent_id','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(empty($category->childs)): ?>
                                <li><a href=""><i class="fa fa-circle-o"></i> <?php echo e($category->name); ?></a></li>
                            <?php else: ?>
                                <li class="treeview">
                                    <a style="cursor: pointer"><i class="fa fa-circle-o"></i><span
                                            style="cursor: pointer"
                                            class="badge"
                                            onclick="redirect1('<?php echo e(route('admincategory.show',['id'=>$category->id])); ?>')"> <?php echo e($category->name); ?>

                                            </span>
                                    
                                        <span class="pull-left-container">
                                             <i class="fa fa-angle-right pull-left"></i>
                                        </span>
                                    </a>
                                    
                                
                                    
                                    <?php echo $__env->make('admin.layouts.categorychilds',['category'=>$category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </li>
            <li class="treeview <?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>">
                <a href="">
                    <i class="fa fa-laptop"></i>
                    <span>محصولات</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">




                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-edit-product')): ?>
                        <li><a href="<?php echo e(route('products.create')); ?>"><i class="fa fa-circle-o"></i> افزودن محصول</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-product')): ?>
                        <li><a href="<?php echo e(route('products.index')); ?>"><i class="fa fa-circle-o"></i> مشاهده همه محصولات</a>
                        </li>
                    <?php endif; ?>
                        <li><a href="<?php echo e(route('admin.color.index')); ?>"><i class="fa fa-circle-o"></i>  رنگ محصولات</a></li>
                        <li><a href="<?php echo e(route('admin.warranty.index')); ?>"><i class="fa fa-circle-o"></i>گارانتی محصولات</a></li>
                </ul>
            </li>

            <li class="treeview <?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>">
                <a href="">
                    <i class="fa fa-laptop"></i>
                    <span>طرح های تخفیف</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('special.index')); ?>"><i class="fa fa-circle-o"></i> پیشنهاد شگفت انگیز</a></li>
                    <li><a href="<?php echo e(route('special.create')); ?>"><i class="fa fa-circle-o"></i> افزودن پیشنهاد شگفت
                            انگیز</a></li>
                    <li><a href="<?php echo e(route('admin.copen.create')); ?>"><i class="fa fa-circle-o"></i> افزودن کپن تخفیف</a>
                    </li>
                    <li><a href="<?php echo e(route('admin.copen.show')); ?>"><i class="fa fa-circle-o"></i> کپن تخفیف</a></li>

                </ul>
            </li>

            <li class="treeview <?php echo e(Route::currentRouteName()=='admin'?'active':''); ?>">
                <a href="">
                    <i class="fa fa-laptop"></i>
                    <span>طراحی</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.banner.index')); ?>"><i class="fa fa-circle-o"></i> بنرها </a></li>
                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-sliders"></i>
                            <span>اسلایدر</span>
                            <span class="pull-left-container">
                            <i class="fa fa-angle-right pull-left"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(route('admin.slider.create')); ?>"><i class="fa fa-circle-o"></i> افزودن اسلایدر
                                </a></li>
                            <li><a href="<?php echo e(route('admin.slider.index')); ?>"><i class="fa fa-circle-o"></i> همه اسلایدر ها</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php echo e(Route::currentRouteName()=='admin.home'?'menu-open':''); ?>">
                <a href="">
                    <i class="fa fa-pagelines"></i>
                    <span>صفحات</span>
                    <span class="pull-left-container">
                            <i class="fa fa-angle-right pull-left"></i>
                          </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo e(Route::currentRouteName()=='admin'?'active':''); ?>"><a href="<?php echo e(route('admin.page.index')); ?>" ><i class="fa fa-circle-o"></i>لیست صفحات</a></li>
                    <li><a href="<?php echo e(route('admin.page.create')); ?>"><i class="fa fa-plus-circle"></i>ایجاد صفحات</a></li>
                    <li><a href="" data-toggle="modal" data-target="#editModal2" class="get-all-col-row"
                           data-url="<?php echo e(route('admin.page.getAllColRow')); ?>">
                            <i class="fa fa-edit"></i>ویرایش/حذف مکان صفحات</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>">
                <a href="">
                    <i class="fa fa-list-alt"></i>
                    <span>برند</span>
                    <span class="pull-left-container">
                            <i class="fa fa-angle-right pull-left"></i>
                          </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>"><a href="<?php echo e(route('admin.brand.index')); ?>"><i class="fa fa-circle-o"></i>لیست برندها</a></li>
                    <li class="<?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>"><a href="<?php echo e(route('admin.brand.create')); ?>"><i class="fa fa-plus-circle"></i>ایجاد برند</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo e(Route::currentRouteName()=='admin.home'?'active':''); ?>">
                <a href="">
                    <i class="fa fa-send-o"></i>
                    <span>ارسال</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.cariar.index')); ?>"><i class="fa fa-circle-o"></i>روش های ارسال</a></li>
                    <li><a href="<?php echo e(route('admin.cariar.create')); ?>"><i class="fa fa-plus-o"></i>افزودن</a></li>
                </ul>
            </li>
            <li><a href="<?php echo e(route('admin.tickets')); ?>"><i class="fa fa-ticket"></i> <span>تیکت ها</span></a></li>
            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>مستندات</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Modal -->
<div id="editModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h5 class="modal-title">مشاهده و ویرایش سطرها و ستون‌های لینک
                    صفحات در صفحه‌ی اصلی</h5>
            </div>
            <div class="modal-body" id="modal-body-all-col-row"
                 style="height: 90%">
                <div id="all-cols-rows">

                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-default"
                        style="width: 100%"
                        data-dismiss="modal">بستن
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End OF Modal -->
<script>

    $(ul.sidebar - menu.li).click(function () {
        $(this).css("color", "red");
    });
</script>
<?php /**PATH C:\xampp\htdocs\rel\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>