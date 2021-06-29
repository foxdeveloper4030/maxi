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
                        <ul class="footer-menu">
                            <li>
                                <a href="#">نحوه ثبت سفارش</a>
                            </li>
                            <li>
                                <a href="#">رویه ارسال سفارش</a>
                            </li>
                            <li>
                                <a href="#">شیوه‌های پرداخت</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">خدمات مشتریان</h3>
                        </header>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">پاسخ به پرسش‌های متداول</a>
                            </li>
                            <li>
                                <a href="#">رویه‌های بازگرداندن کالا</a>
                            </li>
                            <li>
                                <a href="#">شرایط استفاده</a>
                            </li>
                            <li>
                                <a href="#">حریم خصوصی</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-2">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">با خانه موبایل</h3>
                        </header>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">فروش در خانه موبایل</a>
                            </li>
                            <li>
                                <a href="#">همکاری با سازمان‌ها</a>
                            </li>
                            <li>
                                <a href="#">فرصت‌های شغلی</a>
                            </li>
                            <li>
                                <a href="#">تماس با خانه موبایل</a>
                            </li>
                            <li>
                                <a href="#">درباره خانه موبایل</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-4">
                    <div class="newsletter" style="background-color: rgba(192, 230, 236,0.3);padding: 5%;">
                        <p style="text-align: left">از تخفیف‌ها و جدیدترین‌های فروشگاه، در ایمیل خود باخبر شوید:</p>
                        <form action="" data-url="<?php echo e(route('newsletter')); ?>" method="post" id="newsletter">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($myUser)): ?>
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
                            <?php else: ?>
                                <input name="email" type="email" class="form-control"
                                       style="text-align: center"
                                       placeholder="آدرس ایمیل خود را وارد کنید...">
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </form>
                    </div>
                    <span style="display: block;clear: both"></span>
                    <div class="socials">
                            <p>ما را در شبکه های اجتماعی دنبال کنید.</p>
                        <div class="footer-social" style="width: 45px;padding: 1%;">
                            <a href="https://www.instagram.com/khanehmobileiran" target="_blank" data-tooltip-text="اینستاگرام خانه موبایل"><i
                                        style="margin-left: 0;font-size: 27px;"
                                        class="fa fa-instagram"></i></a>
                        </div>
                        <div class="footer-social"
                             style="width: 45px;padding: 1%;background-image: linear-gradient(266deg, #0694ED , #31A9DD 55%, #31A9DD 34%, #31A9DD );">
                            <a href="http://www.telegram.me/khanehmobileiran" target="_blank" data-tooltip-text="تلگرام خانه موبایل"><i
                                        style="margin-left: 0;;font-size: 27px;"
                                        class="fa fa-telegram"></i></a>
                        </div>
                        <div class="footer-social"
                             style="width: 45px;padding: 1%;background-image: linear-gradient(266deg, #1C9712 , #1C9712 55%, #1C9712 34%, #3AB728 );">
                            <a href="https://web.whatsapp.com/send?l=fa&phone=+989300871779" target="_blank" data-tooltip-text="واتساپ خانه موبایل"><i
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
                    <h1 class="site-title">فروشگاه اینترنتی خانه موبایل، بررسی، انتخاب و خرید آنلاین</h1>
                    <p>
                        خانه موبایل به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با
                        پایبندی به سه اصل کلیدی، پرداخت در
                        محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا، موفق شده تا همگام با فروشگاه‌های
                        معتبر جهان، به بزرگ‌ترین فروشگاه
                        اینترنتی ایران تبدیل شود. به محض ورود به خانه موبایل با یک سایت پر از کالا رو به رو
                        می‌شوید! هر آنچه که نیاز دارید و به
                        ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
                    </p>
                </div>
                <div class="symbol col-12 col-lg-5">
                    <a href="#" target="_blank"><img src="<?php echo e(asset('public/assets/img/symbol-01.png')); ?>" alt=""></a>
                    <a href="#" target="_blank"><img src="<?php echo e(asset('public/assets/img/symbol-02.png')); ?>" alt=""></a>
                </div>
                <div class="col-12">
                    <div class="row">
                        <ul class="footer-partners default">
                            <li class="col-md-3 col-sm-6">
                                <a href=""><img src="<?php echo e(asset('public/assets/img/footer/1.svg')); ?>" alt=""></a>
                            </li>
                            <li class="col-md-3 col-sm-6">
                                <a href=""><img src="<?php echo e(asset('public/assets/img/footer/2.svg')); ?>" alt=""></a>
                            </li>
                            <li class="col-md-3 col-sm-6">
                                <a href=""><img src="<?php echo e(asset('public/assets/img/footer/3.svg')); ?>" alt=""></a>
                            </li>
                            <li class="col-md-3 col-sm-6">
                                <a href=""><img src="<?php echo e(asset('public/assets/img/footer/4.svg')); ?>" alt=""></a>
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
</footer><?php /**PATH D:\project\xampp\htdocs\khanehkala\resources\views/sub/myfooter.blade.php ENDPATH**/ ?>