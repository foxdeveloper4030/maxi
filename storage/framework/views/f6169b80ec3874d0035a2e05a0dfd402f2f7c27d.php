<?php $__env->startSection('meta'); ?>
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    پیشنهادات شگفت انگیز
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <aside class="sidebar col-12 col-lg-3 order-2 order-lg-1">
            <div class="sidebar-inner default">

                <div class="widget-services widget card">
                    <div class="row">
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

            </div>
        </aside>
        <div class="col-12 col-lg-9 order-1 order-lg-2">
            <div class="row">

                    <div class="widget widget-product card">
                        <header class="card-header">
                            <h3 class="card-title">
                                <span>پیشنهادات شگفت انگیز</span>
                            </h3>

                        </header>


                    </div>

                <div class="listing default" style="margin: 5px;">

                    <div class="listing-header default">
                        <ul class="listing-sort nav nav-tabs justify-content-center" role="tablist"
                            data-label="مرتب‌ سازی بر اساس :">

                            <li>
                                <a <?php if($filter=='view'): ?> class="active" <?php endif; ?> href=""
                                        data-toggle="tab"   onclick="window.location.href='<?php echo e(route('main.special.filter',['filter'=>'view'])); ?>'" role="tab"
                                   aria-expanded="false">پربازدیدترین</a>
                            </li>
                            <li>
                                <a <?php if($filter=='new'): ?> class="active" <?php endif; ?> data-toggle="tab" href="?filter=view"  onclick="window.location.href='<?php echo e(route('main.special.filter',['filter'=>'new'])); ?>'" role="tab" aria-expanded="true">جدیدترین</a>
                            </li>

                            <li>
                                <a <?php if($filter=='ex'): ?> class="active" <?php endif; ?> data-toggle="tab" href="?filter=ex"  onclick="window.location.href='<?php echo e(route('main.special.filter',['filter'=>'ex'])); ?>'"  role="tab"
                                   aria-expanded="false">ارزان‌ترین</a>
                            </li>
                            <li>
                                <a <?php if($filter=='ch'): ?> class="active" <?php endif; ?> data-toggle="tab" href="?filter=ch"  onclick="window.location.href='<?php echo e(route('main.special.filter',['filter'=>'ch'])); ?>'" role="tab"
                                   aria-expanded="false">گران‌ترین</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content default text-center">
                        <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true">
                            <div class="container no-padding-right">
                                <ul class="row listing-items">
                                    <?php  $index=0;
                                    $select='off';?>
                                    <?php if($select=='on'): ?>
                                        <?php if(count($products)>0): ?>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if((new \App\Model\ProductModel($product->id))->count()>0): ?>
                                                    <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
                                                        <?php if((new \App\Model\ProductModel($product->id))->count()<1): ?>
                                                            <div class="label-check">موجود نیست</div>
                                                        <?php endif; ?>
                                                        <div class="product-box">
                                                            <div class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller"><span
                                                                    class="product-seller-details-label">فروشنده:
                                                            </span>خانه موبایل</span>
                                                                <span class="product-seller-details-badge-container"></span>
                                                            </div>
                                                            <a class="product-box-img" href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>">
                                                                <img src="<?php echo e((new \App\PublicModel())->image_cover($product)); ?>" alt="">
                                                            </a>
                                                            <div class="product-box-content">
                                                                <div class="product-box-content-row">
                                                                    <div class="product-box-title">
                                                                        <a href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>">
                                                                            <?php echo e($product->name); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-box-row product-box-row-price">
                                                                    <div class="price">
                                                                        <div class="price-value">
                                                                            <div class="price-value-wrapper">
                                                                                <?php echo e(number_format($product->price_main)); ?> <span
                                                                                        class="price-currency">تومان</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php  $index++;?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php

                                            $product=\App\Product::query()->where('slug','=',$item)->first();
                                            ?>
                                                <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
                                                    <?php if((new \App\Model\ProductModel($product->id))->count()<1): ?>
                                                        <div class="label-check">موجود نیست</div>
                                                    <?php endif; ?>
                                                    <div class="product-box">
                                                        <div
                                                                class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller"><span
                                                                    class="product-seller-details-label">فروشنده:
                                                            </span>خانه موبایل</span>&ensp;
                                                            <span><i class="fa fa-eye"></i>&ensp;<?php echo e(number_format($product->view)); ?></span>
                                                            <span class="product-seller-details-badge-container"></span>
                                                        </div>
                                                        <a class="product-box-img" href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>">
                                                            <img src="<?php echo e((new \App\PublicModel())->image_cover($product)); ?>" alt="">
                                                        </a>
                                                        <div class="product-box-content">
                                                            <div class="product-box-content-row">
                                                                <div class="product-box-title">
                                                                    <a href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>">
                                                                        <?php echo e($product->name); ?>

                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="product-box-row product-box-row-price">
                                                                <div class="price">
                                                                    <div class="price-value">
                                                                        <div class="price-value-wrapper">
                                                                            <?php echo e(number_format($product->price_main)); ?> <span
                                                                                    class="price-currency">تومان</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php  $index++;?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <?php if($index<1): ?>
                                        <h3>
                                            هیچ کالایی یافت نشد!
                                        </h3>
                                        <img src="<?php echo e(url('public')); ?>/404.png" >
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="pager default text-center">

                    </div>
                </div>

            </div>
        </div>

    </div>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/front/special_show.blade.php ENDPATH**/ ?>