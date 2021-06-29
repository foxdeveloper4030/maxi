<header class="main-header">
    <!-- Logo -->
    <a  class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">پنل</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
        <span><a class="button2" href="<?php echo e(url('')); ?>">مشاهده سایت</a></span>
        <style>
            .button2 {
                display: inline-block;
                text-align: center;
                vertical-align: middle;
                padding: 4px 24px;
                border: 1px solid #258f3a;
                border-radius: 8px;
                background: #3ce95f;
                background: -webkit-gradient(linear, left top, left bottom, from(#3ce95f), to(#258f3a));
                background: -moz-linear-gradient(top, #3ce95f, #258f3a);
                background: linear-gradient(to bottom, #3ce95f, #258f3a);
                -webkit-box-shadow: #37d758 0px 0px 40px 0px;
                -moz-box-shadow: #37d758 0px 0px 40px 0px;
                box-shadow: #37d758 0px 0px 40px 0px;
                text-shadow: #175a25 1px 1px 1px;
                font: normal normal bold 15px arial;
                color: #ffffff;
                text-decoration: none;
            }
            .button2:hover,
            .button2:focus {
                border: 1px solid #2eb349;
                background: #48ff72;
                background: -webkit-gradient(linear, left top, left bottom, from(#48ff72), to(#2cac46));
                background: -moz-linear-gradient(top, #48ff72, #2cac46);
                background: linear-gradient(to bottom, #48ff72, #2cac46);
                color: #ffffff;
                text-decoration: none;
            }
            .button2:active {
                background: #258f3a;
                background: -webkit-gradient(linear, left top, left bottom, from(#258f3a), to(#258f3a));
                background: -moz-linear-gradient(top, #258f3a, #258f3a);
                background: linear-gradient(to bottom, #258f3a, #258f3a);
            }
            .button2:before{
                content:  "\0000a0";
                display: inline-block;
                height: 24px;
                width: 24px;
                line-height: 24px;
                margin: 0 4px -6px -4px;
                position: relative;
                top: -3px;
                left: -9px;
                background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAA7EAAAOxAGVKw4bAAABPElEQVRIibXVvy4EURQG8N9OptxKloqN0CpFZwuNUiFRUW/NC4gXwBNQUCu8gS1EFArZqGUjChGlqDaKO5PdnRmyxsyXTO65/8435zv33NtApEakzoc/zA+rsLMRRFXaMVrJVwfeY+xjF28VO5/DZZx0TnAsn5PoH/YBZlOCFCto4laQbbXEn7/iMe2ME0TYwALu0Ea3BMEN+kUEQ5wahfmAbeUlyhEQcrGELXRwXiKCa+Hg5AgiHCVjEe6xXoLg01g9ZCXqCMk9wzx2ShD0hShQ8z1EXqKekUQvQiR/xZdfJDo0SvKaipNsfEKIZrkEwQSyElWOlKCLzYp9L+KqkRjtKTftJe3FlOsHMQZ4NinRjFATWTSTtuj96OEjO5g9RRKilnAPZZGuKZp7Sghy91KtxVb7KSpyXOmj/w3JE0Fmq4dmkAAAAABJRU5ErkJggg==") no-repeat left center transparent;
                background-size: 100% 100%;
            }

        </style>

        <?php
        $avatar='dist/img/avatar.png';
        if (\Illuminate\Support\Facades\Auth::user()->avatar!=null)
        $avatar=\Illuminate\Support\Facades\Auth::user()->avatar;
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
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?php echo e(count(\Illuminate\Support\Facades\DB::select('SELECT * FROM `usermessages` WHERE `read`=0'))); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?php echo e(count(\Illuminate\Support\Facades\DB::select('SELECT * FROM `usermessages` WHERE `read`=0'))); ?>

                            پیام خوانده نشده
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php $__empty_1 = true; $__currentLoopData = \App\UserMessage::query()->where('read','=',0)->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li>
                                        <!-- start message -->
                                        <a href="#">
                                            <div class="pull-right">

                                                <img src="<?php echo e($avatar); ?>" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>

                                                <small><i class="fa fa-clock-o"></i> <?php echo e($message['created_at']); ?></small>
                                            </h4>
                                            <p><?php echo e((new \App\PublicModel())->short_string($message['message'],40)); ?></p>
                                        </a>
                                    </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>
                            <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer"><a href="<?php echo e(route('admin.message.index')); ?>">نمایش تمام پیام ها</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->


                <li class="dropdown user user-menu">
                    <?php $user4030 = \Illuminate\Support\Facades\Auth::user();   ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e($avatar); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo e($user4030->firstname); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo e($avatar); ?>" class="user-image" alt="User Image">
                            <p>
                                <?php echo e($user4030->firstname); ?>


                            </p>

                            <label>آخرین بازدید:</label> <i class="fa fa-long-arrow-down"></i>
                            <br>

                            <span><small><?php echo e((new \App\Model\Date())->jdate('r',$user4030->last_seen)); ?></small></span>
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
                                .button:before{
                                    content:  "\0000a0";
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
                                .button1:before{
                                    content:  "\0000a0";
                                    display: inline-block;
                                    height: 24px;
                                    width: 24px;
                                    line-height: 24px;
                                    margin: 0 4px -6px -4px;
                                    position: relative;
                                    top: -3px;
                                    left: 0px;
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
                <p><?php echo e($user4030->firstname); ?> <?php echo e($user4030->lastname); ?></p>
                <a><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <!-- search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><h4>داشبورد</h4></li>
            <li class="header">منو</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-shopping-basket"></i> <span>مدیریت سفارشات</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(route('admin.order.index')); ?>"><i class="fa fa-list"></i> سفارش ها</a>
                    </li>
                </ul>
            </li>
            <li><a href="<?php echo e(route('admin.users.show')); ?>"><i class="fa fa-user"></i> مدیریت کاربران</a></li>

            <li class="header">محصولات</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-ol"></i> <span>دسته ها</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admincategory.create')); ?>"><i class="fa fa-plus-circle"></i> افزودن دسته</a>
                    </li>
                    <?php $__currentLoopData = \App\Category::query()->where('parent_id','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(empty($category->childs)): ?>
                            <li><a href="#"><i class="fa fa-circle-o"></i> <?php echo e($category->name); ?></a></li>
                        <?php else: ?>
                            <li class="treeview">
                                <a style="cursor: pointer"><i class="fa fa-circle-o"></i><span style="cursor: pointer"
                                                                                               class="badge"
                                                                                               onclick="redirect('<?php echo e(route('admincategory.show',['id'=>$category])); ?>')"> <?php echo e($category->name); ?></span>

                                    <span class="pull-left-container">
                                             <i class="fa fa-angle-right pull-left"></i>
                                        </span>
                                </a>
                                <?php echo $__env->make('admin.layouts.categorychilds',['category'=>$category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </li>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>محصولات</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('products.create')); ?>"><i class="fa fa-circle-o"></i> افزودن محصول</a></li>
                    <li><a href="<?php echo e(route('products.index')); ?>"><i class="fa fa-circle-o"></i> مشاهده همه محصولات</a></li>

                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>طراحی</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.banner.index')); ?>"><i class="fa fa-circle-o"></i> بنرها </a></li>
                    <li class="treeview">
                        <a href="#">
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
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pagelines"></i>
                    <span>صفحات</span>
                    <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('admin.page.index')); ?>"><i class="fa fa-circle-o"></i>لیست صفحات</a></li>
                    <li><a href="<?php echo e(route('admin.cariar.create')); ?>"><i class="fa fa-plus-circle"></i>ایجاد صفحات</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
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


            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>مستندات</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH D:\project\xampp\htdocs\khanehkala\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>