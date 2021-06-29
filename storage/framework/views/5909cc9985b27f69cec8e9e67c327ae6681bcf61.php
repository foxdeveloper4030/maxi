<li data-brand="<?php echo e($product->id_manufacturer); ?>" id="item<?php echo e($index); ?>"  data-price="<?php echo e($product->price_main); ?>"  class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
    <?php if($product->number<1): ?>
        <div class="label-check">موجود نیست</div>

    <?php else: ?>
        <div class="label-check" style="background-color: green">جدید</div>
    <?php endif; ?>
    <div class="product-box">
        <div
                class="product-seller-details product-seller-details-item-grid">
            <div class="btn-group">
                <a onclick="compare_add('<?php echo e($product->id); ?>')" type="button"  class="myButton"><i class="fa fa-exchange"></i></a>
                <style>

                </style>
                <button  onclick="loadproduct('<?php echo e($product->slug); ?>')" type="button" class="myButton"><i class="fa fa-list"></i></button>
                <?php if(empty((new \App\Model\ProductModel($product->id))->getdefaultattribute())): ?>
                    <button onmouseenter="ok(this)"    id="fastmode-cart" onclick="maincart('<?php echo e($product->id); ?>','0')" type="button" class="myButton"> <i class="fa fa-shopping-cart"></i></button>
                <?php else: ?>
                    <button data-toggle="444" onmouseenter="ok(this)" id="fastmode-cart"  onclick="maincart('<?php echo e($product->id); ?>','<?php echo e((new \App\Model\ProductModel($product->id))->getdefaultattribute()->id); ?>')" type="button" class="myButton"><i class="fa fa-shopping-cart"></i></button>
                <?php endif; ?>

            </div>
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
<?php /**PATH D:\project\xampp\htdocs\khanehkala\resources\views/front/show_product_box.blade.php ENDPATH**/ ?>