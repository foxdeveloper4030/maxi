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
            <?php  $select = 'off';
            if (isset($_GET['select']))
                if ($_GET['select'] == 'on')
                    $select = 'on';
            ?>
            <div class="widget-suggestion widget card">
                <div class="box">
                    <div class="box-content">
                        <?php if($select=='on'): ?>
                            <input checked type="checkbox" onchange="selectradio(this)" name="checkbox"
                                   class="bootstrap-switch"/>
                        <?php else: ?>
                            <input type="checkbox" onchange="selectradio(this)" name="checkbox"
                                   class="bootstrap-switch"/>
                        <?php endif; ?>
                        <label for="">فقط کالاهای موجود</label>
                    </div>
                </div>
            </div>
            <div class="widget-suggestion widget card">
                <div class="box">
                    <div class="container">

                        <style>
                            .slidecontainer {
                                width: 100%;
                            }

                            .slider {
                                -webkit-appearance: none;
                                width: 100%;
                                height: 25px;
                                background: url("<?php echo e(url('public/img')); ?>/back2.png");
                                outline: none;
                                opacity: 0.7;
                                -webkit-transition: .2s;
                                transition: opacity .2s;
                            }

                            .slider:hover {
                                opacity: 1;
                            }

                            .slider::-webkit-slider-thumb {
                                -webkit-appearance: none;
                                appearance: none;
                                width: 25px;
                                height: 25px;
                                background: #4CAF50;
                                cursor: pointer;
                            }

                            .slider::-moz-range-thumb {
                                width: 25px;
                                height: 25px;
                                border-radius: 10px;
                                background: tomato;
                                cursor: pointer;
                            }
                        </style>


                        <div class="slidecontainer">

                            <p>بیشترین قیمت</p>
                            <input type="range" id="price_high" min="1" max="1000" value="1000" class="slider"
                                   onchange="price_filter()">
                            <p id="demo_high" data-an="1"></p>
                            <p>کمترین قیمت</p>
                            <input type="range"  id="price_low" min="1" max="1000" value="1" class="slider"
                                   onchange="price_filter()">
                            <p id="demo_low" data-an="1"></p>
                        </div>


                    </div>
                </div>

            </div>

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
                                    <img src="<?php echo e((new \App\PublicModel())->image_cover($item->product)); ?>" class="w-100"
                                         alt="">
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
                            <span><?php echo e($category->name); ?></span>
                        </h3>

                    </header>


                </div>

                <div class="listing default" style="margin: 5px;">

                    <div class="listing-header default">
                        <ul class="listing-sort nav nav-tabs justify-content-center" role="tablist"
                            data-label="مرتب‌ سازی بر اساس :">

                            <li>
                                <a <?php if($filter=='view'): ?> class="active" <?php endif; ?> href=""
                                   data-toggle="tab"
                                   onclick="window.location.href='<?php echo e(route('category.show.filter',['name'=>$category->name,'filter'=>'view'])); ?>'"
                                   role="tab"
                                   aria-expanded="false">پربازدیدترین</a>
                            </li>
                            <li>
                                <a <?php if($filter=='new'): ?> class="active" <?php endif; ?> data-toggle="tab" href="?filter=view"
                                   onclick="window.location.href='<?php echo e(route('category.show.filter',['name'=>$category->name,'filter'=>'new'])); ?>'"
                                   role="tab" aria-expanded="true">جدیدترین</a>
                            </li>

                            <li>
                                <a <?php if($filter=='ex'): ?> class="active" <?php endif; ?> data-toggle="tab" href="?filter=ex"
                                   onclick="window.location.href='<?php echo e(route('category.show.filter',['name'=>$category->name,'filter'=>'ex'])); ?>'"
                                   role="tab"
                                   aria-expanded="false">ارزان‌ترین</a>
                            </li>
                            <li>
                                <a <?php if($filter=='ch'): ?> class="active" <?php endif; ?> data-toggle="tab" href="?filter=ch"
                                   onclick="window.location.href='<?php echo e(route('category.show.filter',['name'=>$category->name,'filter'=>'ch'])); ?>'"
                                   role="tab"
                                   aria-expanded="false">گران‌ترین</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content default text-center">
                        <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true">
                            <div class="container no-padding-right">
                                <ul class="row listing-items">
                                    <?php  $index = 0;
                                    ?>
                                    <?php if($select=='on'): ?>
                                        <?php if(count($products)>0): ?>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if((new \App\Model\ProductModel($product->id))->count()>0): ?>
                                                    <?php echo $__env->make('front.show_product_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php  $index++;?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php $index = 0;?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('front.show_product_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php  $index++;?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <?php if($index<1): ?>
                                        <h3>
                                            هیچ کالایی یافت نشد!
                                        </h3>
                                        <img src="<?php echo e(url('public')); ?>/404.png">
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="pager default text-center">
                        <input type="hidden" id="itemindex" value="<?php echo e($index); ?>">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        function selectradio(value) {
            var select = 'off';
            if (value.checked)
                <?php if(!isset($_GET['page'])): ?>
                    window.location.href = '<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])); ?>?select=' + 'on';
            <?php else: ?>
                window.location.href = window.location.href + '&&select=' + 'on';
            <?php endif; ?>
        else
            window.location.href = '<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])); ?>';


        }

    </script>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php echo $__env->make('sub.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>

        setout();

        function price_filter() {

            var output_low = document.getElementById("demo_low");
            var output_high = document.getElementById("demo_high");
            var high = document.getElementById('price_high');
            var low = document.getElementById('price_low');
            setout();
            $(document).ready(function () {
                for (var i = 0; i < document.getElementById('itemindex').value; i++) {
                    var docs = document.getElementById('item' + i);
                    var value = docs.getAttribute('data-price');
                    if (value >= low.value * 100000 && value <= high.value * 100000) {
                        docs.style.display = '';
                    } else {
                        docs.style.display = 'none';
                    }
                }


            });

        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        function setout() {
            var output_low = document.getElementById("demo_low");
            var output_high = document.getElementById("demo_high");
            var high = document.getElementById('price_high');
            var low = document.getElementById('price_low');
            output_high.innerHTML = formatNumber(high.value * 100000) + ' تومان ';
            output_low.innerHTML = formatNumber(low.value * 100000) + ' تومان ';
        }

        setout();
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rel\resources\views/front/category_show.blade.php ENDPATH**/ ?>