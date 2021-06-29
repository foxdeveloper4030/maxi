<?php $__env->startSection('title'); ?>
    جستجو
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- main -->
    <main class="search-page amazing-search default">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-amazing-search"></div>
                </div>
                <aside class="sidebar-page col-12 col-sm-12 col-md-4 col-lg-3 order-1">
                    <div class="sidebar-title-amazing">
                       <p></p>
                    </div>
                    <div class="box">
                        <div class="box-header">جستجو در نتایج:</div>
                        <div class="box-content">
                            <div class="ui-input ui-input--quick-search">
                                <form>
                                    <input name="result" type="text" class="ui-input-field ui-input-field--cleanable"
                                           placeholder="نام محصول یا برند مورد نظر را بنویسید…">
                                    <span class="ui-input-cleaner" style="cursor: pointer;"></span>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-content">
                            <?php if($select=='on'): ?>
                            <input checked  type="checkbox" onchange="selectradio(this)" name="checkbox" class="bootstrap-switch"  />
                            <?php else: ?>
                                <input   type="checkbox" onchange="selectradio(this)" name="checkbox" class="bootstrap-switch"  />
                            <?php endif; ?>
                            <label for="">فقط کالاهای موجود</label>
                        </div>
                    </div>

                </aside>
                <div class="amazing-content col-12 col-sm-12 col-md-8 col-lg-9 order-2">
                    <div class="breadcrumb-section default">
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="#">
                                    <span>فروشگاه اینترنتی  <?php echo e(\App\PublicModel::EnappName()); ?></span>
                                </a>
                            </li>
                            <li><span>جستجوی موبایل</span></li>
                        </ul>
                    </div>
                    <div class="listing default">
                        <div class="listing-counter"><?php echo e(number_format($count)); ?> کالا</div>
                        <div class="listing-header default">
                            <ul class="listing-sort nav nav-tabs justify-content-center" role="tablist"
                                data-label="نتایج جستجوی پیشرفته">

                            </ul>
                        </div>
                        <div class="tab-content default text-center">
                            <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true">
                                <div class="container no-padding-right">
                                    <ul class="row listing-items">
                                        <?php  $index=0;   ?>
                                        <?php if($select=='on'): ?>
                                        <?php if(count($products)>0): ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if((new \App\Model\ProductModel($product->id))->count()>0): ?>
                                        <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
                                            <?php if((new \App\Model\ProductModel($product->id))->count()<1): ?>
                                            <div class="label-check">موجود نیست</div>
                                            <?php endif; ?>
                                            <div class="product-box">
                                                <div
                                                        class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller"><span
                                                                    class="product-seller-details-label">فروشنده:
                                                            </span> <?php echo e(\App\PublicModel::EnappName()); ?></span>
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
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
                                                            <?php if((new \App\Model\ProductModel($product->id))->count()<1): ?>
                                                                <div class="label-check">موجود نیست</div>
                                                            <?php endif; ?>
                                                            <div class="product-box">
                                                                <div
                                                                        class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller"><span
                                                                    class="product-seller-details-label">فروشنده:
                                                            </span> <?php echo e(\App\PublicModel::EnappName()); ?></span>
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

                            <?php echo e($products->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->
<script>
    function selectradio(value) {
        var select='off';
        if (value.checked)
            <?php if(!isset($_GET['page'])): ?>
            window.location.href='<?php echo e(route('main.search',['name'=>$text])); ?>?select='+'on';
            <?php else: ?>
                window.location.href=window.location.href+'&&select='+'on';
                <?php endif; ?>
            else
            window.location.href='<?php echo e(route('main.search',['name'=>$text])); ?>';




    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rel\resources\views/front/search.blade.php ENDPATH**/ ?>