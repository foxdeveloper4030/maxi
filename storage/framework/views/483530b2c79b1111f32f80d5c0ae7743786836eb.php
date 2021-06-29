<footer class="main-footer default">
    <div class="back-to-top">
        <a href="#"><span class="icon"><i class="now-ui-icons arrows-1_minimal-up"></i></span> <span>بازگشت به
                            بالا</span></a>
    </div>
    <div class="container">
        <div class="footer-services">
            <div class="row">
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="<?php echo e(asset('public/assets/img/svg/delivery.svg')); ?>">
                    </a>
                    <p>تحویل اکسپرس</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="<?php echo e(asset('public/assets/img/svg/contact-us.svg')); ?>">
                    </a>
                    <p>پشتیبانی 24 ساعته</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="<?php echo e(asset('public/assets/img/svg/payment-terms.svg')); ?>">
                    </a>
                    <p>پرداخت درمحل</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="<?php echo e(asset('public/assets/img/svg/return-policy.svg')); ?>">
                    </a>
                    <p>۷ روز ضمانت بازگشت</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="<?php echo e(asset('public/assets/img/svg/origin-guarantee.svg')); ?>">
                    </a>
                    <p>ضمانت اصل بودن کالا</p>
                </div>
            </div>
        </div>
        <div class="footer-widgets">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">راهنمای خرید از خانه موبایل</h3>
                        </header>
                        <?php if(isset($pages)): ?>
                            <ul class="footer-menu">
                                <?php $__currentLoopData = $pages[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('pages.pageCreate',$page->title)); ?>"><?php echo e($page->title); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">خدمات مشتریان</h3>
                        </header>
                        <?php if(isset($pages)): ?>
                            <ul class="footer-menu">
                                <?php $__currentLoopData = $pages[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('pages.pageCreate',$page->title)); ?>"><?php echo e($page->title); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-2">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">با خانه موبایل</h3>
                        </header>
                        <?php if(isset($pages)): ?>
                            <ul class="footer-menu">
                                <?php $__currentLoopData = $pages[2]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('pages.pageCreate',$page->title)); ?>"><?php echo e($page->title); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-4">
                    <div class="newsletter" style="background-color: rgba(192, 230, 236,0.3);padding: 5%;">
                        <?php if(isset($myUser)): ?>
                            <?php if(!$myUser->newsletter): ?>
                                <p style="text-align: left">از تخفیف‌ها و جدیدترین‌های فروشگاه، در ایمیل خود باخبر
                                    شوید:</p>
                                <form action="" data-url="<?php echo e(route('newsletter')); ?>" method="post" id="newsletter">
                                    <?php echo csrf_field(); ?>
                                    <?php if($myUser->email): ?>
                                        <div class="containerCheckbox" style="font-size: 2rem;">
                                            <input id="2" type="checkbox" name="email" value="chkboxEmail">
                                            <label for="2"></label>
                                            <div id="guideCheckboxNewsletter"
                                                 style="font-size: 12px;display: inline-block;position: absolute;top: 23%;right: 10%;">
                                                لطفا کادر مقابل را علامت بزنید:
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <input name="email" type="email" class="form-control"
                                               style="text-align: center"
                                               placeholder="آدرس ایمیل خود را وارد کنید...">
                                    <?php endif; ?>
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                </form>
                            <?php else: ?>
                                <div style="text-align: center">در خبرنامه‌ی خانه موبایل عضو هستید.</div>
                            <?php endif; ?>
                        <?php else: ?>
                            <p style="text-align: left">از تخفیف‌ها و جدیدترین‌های فروشگاه، در ایمیل خود باخبر
                                شوید:</p>
                            <form action="" data-url="<?php echo e(route('newsletter')); ?>" method="post" id="newsletter">
                                <?php echo csrf_field(); ?>
                                <input name="email" type="email" class="form-control"
                                       style="text-align: center"
                                       placeholder="آدرس ایمیل خود را وارد کنید...">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <span style="display: block;clear: both"></span>
                    <div class="socials">
                        <p>ما را در شبکه های اجتماعی دنبال کنید.</p>
                        <div class="footer-social" style="width: 45px;padding: 1%;">
                            <a href="https://www.instagram.com/khanehmobileiran" target="_blank"
                               data-tooltip-text="اینستاگرام خانه موبایل"><i
                                        style="margin-left: 0;font-size: 27px;"
                                        class="fa fa-instagram"></i></a>
                        </div>
                        <div class="footer-social"
                             style="width: 45px;padding: 1%;background-image: linear-gradient(266deg, #0694ED , #31A9DD 55%, #31A9DD 34%, #31A9DD );">
                            <a href="http://www.telegram.me/khanehmobileiran" target="_blank"
                               data-tooltip-text="تلگرام خانه موبایل"><i
                                        style="margin-left: 0;;font-size: 27px;"
                                        class="fa fa-telegram"></i></a>
                        </div>
                        <div class="footer-social"
                             style="width: 45px;padding: 1%;background-image: linear-gradient(266deg, #1C9712 , #1C9712 55%, #1C9712 34%, #3AB728 );">
                            <a href="https://web.whatsapp.com/send?l=fa&phone=+989300871779" target="_blank"
                               data-tooltip-text="واتساپ خانه موبایل"><i
                                        style="margin-left: 0;;font-size: 27px;"
                                        class="fa fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <span>هفت روز هفته ، 24 ساعت شبانه‌روز پاسخگوی شما هستیم.</span>
                </div>
                <div class="col-12 col-lg-2">شماره تماس: 66754670-021</div>
                <div class="col-12 col-lg-3">آدرس ایمیل:<a href="mailto:info@khanehmobile.com">info@khanehmobile.com</a>
                </div>
                <div class="col-12 col-lg-4 text-center">
                    <a href="#" target="_blank"><img src="<?php echo e(asset('public/assets/img/bazzar.png')); ?>" width="159"
                                                     height="48"
                                                     alt=""></a>
                    <a href="#" target="_blank"><img src="<?php echo e(asset('public/assets/img/sibapp.png')); ?>" width="159"
                                                     height="48"
                                                     alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="description">
        <div class="container">
            <div class="row">
                <div class="site-description col-12 col-lg-7">
                    <h1 class="site-title">خانه موبایل ایران: انتخاب دقیق، خرید بی‌واسطه</h1>
                    <p>
                        این مجموعه از سال 1374 تاسیس و در حوزه تجهیزات و خدمات ارتباطی فعالیت خود را آغاز نموده است.
                        تنوع محصولات، قیمت مناسب، ارسال رایگان و ضمانت‌نامه اصالت کالا باعث اعتماد بیش از پیش کاربران به
                        این مجموعه شده است.
                    </p>
                </div>
                <div class="symbol col-12 col-lg-5">
                    <a target="_blank" href="https://trustseal.enamad.ir/?id=36517&amp;Code=1CIAqSgVcDLQ56jEqnmR"><img
                                src="https://Trustseal.eNamad.ir/logo.aspx?id=36517&amp;Code=1CIAqSgVcDLQ56jEqnmR"
                                alt="" style="cursor:pointer" id="1CIAqSgVcDLQ56jEqnmR"></a>
                    
                    <img id='jxlzesgtjxlzwlaosizpesgtfukz' style='cursor:pointer'
                         onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1014906&p=rfthobpdrfthaodspfvlobpdgvka", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                         alt='logo-samandehi'
                         src='https://logo.samandehi.ir/logo.aspx?id=1014906&p=nbpdlymanbpdshwlbsiylymawlbq'>
                    
                </div>
                <div class="col-12">
                    <div class="row">
                        <ul class="footer-partners default">
                            <li class="col-md-12 col-sm-12">
                                <a href="https://khanehmobile.com/mag/"><img style="width: 200px;height: auto;"
                                                                             src="<?php echo e(asset('public/assets/img/footer/logo-blog.png')); ?>"
                                                                             alt="سرچ مرچ"></a>
                            </li>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <p>
                استفاده از مطالب فروشگاه اینترنتی خانه موبایل فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.
                کلیه حقوق این سایت متعلق
                به فروشگاه آنلاین خانه موبایل ایران می‌باشد.
            </p>
        </div>
    </div>
</footer><?php /**PATH C:\xampp\htdocs\khanehkal\resources\views/sub/myfooter.blade.php ENDPATH**/ ?>