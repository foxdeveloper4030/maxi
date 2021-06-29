<?php $__env->startSection('meta'); ?>
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
   خانه
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <aside class="sidebar col-12 col-lg-3 order-2 order-lg-1">
            <div class="sidebar-inner default">

                <div class="widget-services widget card">
                    <div class="row" style="background-color: tomato">
                        <div class="feature-item col-12">
                            <a href="#" target="_blank">
                                <img src="<?php echo e(asset('public/assets/img/svg/return-policy.svg')); ?>">
                            </a>
                            <p>ضمانت برگشت</p>
                        </div>
                        <div class="feature-item col-6">
                            <a href="#" target="_blank">
                                <img src="<?php echo e(asset('public/assets/img/svg/payment-terms.svg')); ?>">
                            </a>
                            <p>پرداخت درمحل</p>
                        </div>
                        <div class="feature-item col-6">
                            <a href="#" target="_blank">
                                <img src="<?php echo e(asset('public/assets/img/svg/delivery.svg')); ?>">
                            </a>
                            <p>تحویل اکسپرس</p>
                        </div>
                        <div class="feature-item col-6">
                            <a href="#" target="_blank">
                                <img src="<?php echo e(asset('public/assets/img/svg/origin-guarantee.svg')); ?>">
                            </a>
                            <p>تضمین بهترین قیمت</p>
                        </div>
                        <div class="feature-item col-6">
                            <a href="#" target="_blank">
                                <img src="<?php echo e(asset('public/assets/img/svg/contact-us.svg')); ?>">
                            </a>
                            <p>پشتیبانی 24 ساعته</p>
                        </div>
                    </div>
                </div>
                <div class="widget-suggestion widget card">
                    <header class="card-header">
                        <h3 class="card-title">پیشنهاد لحظه ای</h3>
                    </header>
                    <div id="progressBar">
                        <div class="slide-progress"></div>
                    </div>
                    <div id="suggestion-slider" class="owl-carousel owl-theme">
                        <?php $__currentLoopData = \App\Special::query()->where('expire','>',time())->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <a href="<?php echo e(route('main.product.show',['slug'=>$item->product->slug])); ?>">
                                <img src="<?php echo e((new \App\PublicModel())->image_cover($item->product)); ?>" class="w-100" alt="">
                            </a>
                            <h3 class="product-title">
                                <a href="<?php echo e(route('main.product.show',['slug'=>$item->product->slug])); ?>"> <?php echo e($item->product->name); ?> </a>
                            </h3>
                            <div class="price">
                                <span class="amount"><?php echo e(number_format($item->product->price_main-$item->product->price_off)); ?><span>تومان</span></span>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <?php $__currentLoopData = \App\Banner::query()->where('id','>',4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="widget-banner widget card">
                    <a href="<?php echo e($banner->link); ?>" target="_blank">
                        <img class="img-fluid" src="<?php echo e(url('')); ?>/<?php echo e($banner->url); ?>" alt="<?php echo e($banner->title); ?>">
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </aside>
        <div class="col-12 col-lg-9 order-1 order-lg-2">
            <section id="main-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php   $slidindex=0;?>
                    <?php $__currentLoopData = \App\Slider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li data-target="#main-slider" data-slide-to="<?php echo e($slidindex); ?>" <?php if($slidindex==0): ?> <?php $slidindex=1; ?> class="active" <?php endif; ?>></li>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <div class="carousel-inner">
                    <?php  $slidindex=0 ?>
                    <?php $__currentLoopData = \App\Slider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php if($slidindex==0): ?> active <?php $slidindex=1; ?> <?php endif; ?>">
                        <a class="d-block" href="<?php echo e(route('slider.show',['id'=>$slider->id])); ?>">
                            <img src="<?php echo e($slider->url); ?>"
                                 class="d-block w-100" alt="">
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                </a>
                <a class="carousel-control-next" href="#main-slider" data-slide="next">
                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                </a>
            </section>
            <section id="amazing-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                <div class="row m-0">
                    <ol class="carousel-indicators pr-0 d-flex flex-column col-lg-3">
                        <?php
                        $index=0;
                        ?>
                      <?php $__currentLoopData = \App\Special::query()->limit(9)->orderByDesc('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <li <?php if($index==0): ?> class="active" <?php endif; ?> data-target="#amazing-slider" data-slide-to="<?php echo e($index); ?>">
                         <span><?php echo e($item->product->name); ?></span>
                       </li>
                        <?php
                        $index++;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <li class="view-all">
                            <a href="<?php echo e(route('main.special')); ?>" class="btn btn-primary btn-block hvr-sweep-to-left">
                                <i class="fa fa-arrow-left"></i>مشاهده همه شگفت انگیزها
                            </a>
                        </li>
                    </ol>
                    <div class="carousel-inner p-0 col-12 col-lg-9">
                        <img class="amazing-title" src="<?php echo e(url('public')); ?>/assets/img/amazing-slider/amazing-title-01.png"
                             alt="">
                        <?php  $index=0;  ?>
                        <?php $__currentLoopData = \App\Special::query()->limit(9)->orderByDesc('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php if($item->expire<time()): ?> finished <?php endif; ?>  <?php if($index==0): ?> active <?php endif; ?>  ">
                            <div class="row m-0">
                                <div class="right-col col-5 d-flex align-items-center">
                                    <a class="w-100 text-center" href="<?php echo e(route('main.product.show',['slug'=>$item->product->slug])); ?>">
                                        <img src="<?php echo e((new \App\PublicModel())->image_cover($item->product)); ?>"
                                             class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="left-col col-7">
                                    <div class="price">
                                        <del><span><?php echo e(number_format($item->product->price_main)); ?><span>تومان</span></span></del>
                                        <ins><span><?php echo e(number_format($item->product->price_main-$item->price_off)); ?><span>تومان</span></span></ins>
                                        <span class="discount-percent"><?php echo e(round(($item->price_off)*100/($item->product->price_main))); ?> % تخفیف</span>

                                    </div>
                                    <h2 class="product-title">
                                        <a href="<?php echo e(route('main.product.show',['slug'=>$item->product->slug])); ?>"><?php echo e($item->product->name); ?></a>
                                    </h2>


                                    <div id="counter<?php echo e($index); ?>" class="countdown-timer" countdown data-date="<?php echo e((new \Carbon\Carbon($item->expire))->format('d m Y h:m:s')); ?>">
                                        <span data-days>0</span>:
                                        <span data-hours>0</span>:
                                        <span data-minutes>0</span>:
                                        <span data-seconds>0</span>
                                    </div>
                                    <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                                </div>
                            </div>
                        </div>
                            <script>
                                // Set the date we're counting down to
                                var countDownDate<?php echo e($index); ?> = new Date("<?php echo e((new \Carbon\Carbon($item->expire))->format('Y-m-d h:m:s')); ?>").getTime();

                                // Update the count down every 1 second
                                var x<?php echo e($index); ?> = setInterval(function() {

// Get today's date and time
                                    var now<?php echo e($index); ?> = new Date().getTime();

// Find the distance between now and the count down date
                                    var distance<?php echo e($index); ?> = countDownDate<?php echo e($index); ?> - now<?php echo e($index); ?>;

// Time calculations for days, hours, minutes and seconds
                                    var days<?php echo e($index); ?> = Math.floor(distance<?php echo e($index); ?> / (1000 * 60 * 60 * 24));
                                    var hours<?php echo e($index); ?> = Math.floor((distance<?php echo e($index); ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes<?php echo e($index); ?> = Math.floor((distance<?php echo e($index); ?> % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds<?php echo e($index); ?> = Math.floor((distance<?php echo e($index); ?> % (1000 * 60)) / 1000);

// Output the result in an element with id="demo"
                                    document.getElementById("counter<?php echo e($index); ?>").innerHTML =' <span data-days>'+days<?php echo e($index); ?>+'</span>:'+
                                        ' <span data-hours>'+hours<?php echo e($index); ?>+'</span>:'+
                                        '<span data-minutes>'+minutes<?php echo e($index); ?>+'</span>:'+
                                        '<span data-seconds>'+seconds<?php echo e($index); ?>+'</span>';

// If the count down is over, write some text
                                    if (distance<?php echo e($index); ?> < 0) {
                                        clearInterval(x<?php echo e($index); ?>);
                                        document.getElementById("counter<?php echo e($index); ?>").innerHTML = '<button href="#" class="finished btn"> تمام شد </button>';
                                    }
                                }, 1000);
                            </script>

                        <?php $index++;  ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </section>

            <div class="row banner-ads">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="widget-banner card">
                                <a href="#" target="_blank">
                                    <img class="img-fluid" src="<?php echo e(asset('public/assets/img/banner/banner-1.jpg')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="widget-banner card">
                                <a href="#" target="_top">
                                    <img class="img-fluid" src="<?php echo e(asset('public/assets/img/banner/banner-2.jpg')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="widget-banner card">
                                <a href="#" target="_top">
                                    <img class="img-fluid" src="<?php echo e(asset('public/assets/img/banner/banner-3.jpg')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="widget-banner card">
                                <a href="#" target="_top">
                                    <img class="img-fluid" src="<?php echo e(asset('public/assets/img/banner/banner-4.jpg')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            </div>

            <div class="row banner-ads">

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="widget-banner card">
                                <a href="<?php echo e(\App\Banner::query()->find(2)->link); ?>" target="_blank">
                                    <img class="img-fluid" src="<?php echo e(url('')); ?>/<?php echo e(\App\Banner::query()->find(2)->url); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="widget-banner card">
                                <a href="<?php echo e(\App\Banner::query()->find(3)->link); ?>" target="_top">
                                    <img class="img-fluid" src="<?php echo e(\App\Banner::query()->find(3)->url); ?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row banner-ads">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-banner card">
                                <a href="<?php echo e(\App\Banner::query()->find(4)->link); ?>" target="_blank">
                                    <img class="img-fluid" src="<?php echo e(\App\Banner::query()->find(4)->url); ?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php ($brands=\App\Brand::all()); ?>
    <?php if ($__env->exists('sub.brands')) echo $__env->make('sub.brands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>

    function csss(){
        $(document).ready(function(){
           alert(15);

        });
    }


</script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php echo $__env->make('sub.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
       function f() {

       }

    </script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/maximors/public_html/resources/views/front/main.blade.php ENDPATH**/ ?>