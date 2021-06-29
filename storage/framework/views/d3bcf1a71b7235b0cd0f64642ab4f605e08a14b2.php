

<li data-brand="<?php echo e($product->id_manufacturer); ?>" id="item<?php echo e($index); ?>"  data-price="<?php echo e($product->price_main); ?>"  class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
    <?php if((new \App\Model\ProductModel($product->id))->count()<1): ?>
        <div class="label-check">موجود نیست</div>

    <?php else: ?>
        <div class="label-check" style="background-color: green">جدید</div>
    <?php endif; ?>
    <div class="product-box">
        <div
                class="product-seller-details product-seller-details-item-grid">
            <div class="btn-group" style="height: 50px">
                <a onclick="compare_add('<?php echo e($product->id); ?>')" class="btn" style="background-color: tomato;width:100%;height:40px" onclick="addToCart()">
                    افزودن به لیست مقایسه
                    <i class="now-ui-icons shopping_tag-content"></i>
                </a>

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
<?php /**PATH C:\xampp\htdocs\max\resources\views/front/show_product_box.blade.php ENDPATH**/ ?>