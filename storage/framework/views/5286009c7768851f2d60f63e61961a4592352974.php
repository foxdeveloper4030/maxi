

<?php

$warranty_id=session('warranty_id');
$color_id=session('color_id');

?>
<div id="product-page">
    <?php if(\App\PublicModel::hasColor($product)): ?>

        <div class="product-variants default">
            <span>انتخاب رنگ: </span>

            <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div <?php if($color_id!=$color->color_id): ?>onclick="changeColor(<?php echo e($color->color_id); ?>,<?php echo e($product->id); ?>)" <?php endif; ?> class="radio" style="cursor: pointer;width: 80px;border-radius: 5px;background-color: #e6eede;<?php if($color_id==$color->color_id): ?> border: dashed 2px #14d3ff; <?php endif; ?> padding: 3px;">

                    <span class="badge" style="background-color: <?php echo e($color->color->color); ?>">&ensp;</span>

                    <?php echo e($color->color->name); ?>



                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

     <?php

        $off = 0;
        $price=$product->price_main;
        if (isset($product->special))
            if ($product->special->expire > time()) {
                $price -=$product->special->price_off;
                $off = $product->special->price_off;
            }
        if (\App\PublicModel::hasColor($product)){
            $color=$product->colors->where('color_id','=',$color_id)->first();
            $price+=$color->price;
        }
        if (\App\PublicModel::hasWarranty($product))
            {
                $warraty=$product->warranties->where('warranty_id','=',$warranty_id)->first();
                $price+=$warraty->price;
            }
        ?>


       <?php if(\App\PublicModel::hasWarranty($product)): ?>
           <?php $__currentLoopData = $product->warranties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warranty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div <?php if($warranty->warranty_id!=$warranty_id): ?> onclick="changeWarranty(<?php echo e($warranty->warranty_id); ?>,<?php echo e($product->id); ?>)" <?php endif; ?> class="product-guarantee default" style="cursor: pointer;height: 20px">
            <?php if($warranty->warranty_id==$warranty_id): ?>
            <i class="fa fa-check-circle"></i>
            <?php else: ?>
            <i class="fa fa-circle"></i>
            <?php endif; ?>

            <p class="product-guarantee-text"><?php echo e($warranty->warranty->name); ?></p>
        </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

     <?php if(\App\PublicModel::hasColor($product)): ?>
            <div class="product-add default">
              <?php
                $color=$product->colors->where('color_id','=',$color_id)->first();
              ?>
                  <div class="price-value" >
                      <span><?php echo e(number_format($price)); ?></span>
                      <span class="price-currency">تومان</span>
                  </div>
                  <br>
                  <br>
                  <br>
                  <div style="top: 100px;" class="price-product defualt">


                      <?php if(number_format($off*100/$product->price_main)>0): ?>
                          <div class="price-discount" data-title="تخفیف">
                                            <span>
                                                <?php echo e(number_format($off*100/$product->price_main)); ?>

                                            </span>
                              <span>%</span>
                          </div>
                      <?php endif; ?>
                  </div>
                <div class="parent-btn" id="product_btn">
                    <?php if($color->count>0): ?>
                    <a class="dk-btn dk-btn-info" onclick="addToCart()">
                        افزودن به سبد خرید
                        <i class="now-ui-icons shopping_cart-simple"></i>
                    </a>
                    <?php else: ?>
                        <a class="dk-btn dk-btn-danger">
                            اتمام موجودی!
                            <i class="now-ui-icons shopping_cart-simple"></i>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
         <?php else: ?>
            <div style="top: 100px;" class="price-product defualt">

            <div class="product-add default">


                <div class="product-guarantee default">
                    <div><?php echo e(number_format($price)); ?></div>
                    <span class="price-currency">تومان</span>
                </div>
                    <?php if(number_format($off*100/$product->price_main)>0): ?>
                        <div class="price-discount" data-title="تخفیف">
                                            <span>
                                                <?php echo e(number_format($off*100/$product->price_main)); ?>

                                            </span>
                            <span>%</span>
                        </div>
                    <?php endif; ?>
                </div>


                    <div class="product-guarantee default" style="display: block">
                        <div class="parent-btn">
                            <?php if($product->quantity>0): ?>

                                <button onclick="addToCart()" class="dk-btn dk-btn-info">
                                    افزودن به سبد خرید
                                    <i class="now-ui-icons shopping_cart-simple"></i>
                                </button>
                            <?php else: ?>

                                <a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
                                    اتمام موجودی!
                                    <i class="now-ui-icons show-less"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>


            </div>
     <?php endif; ?>


</div>

<script>
function changeColor(color,product) {
    $(document).ready(function () {
        loader_show();

        $.get("<?php echo e(url('selectcolor')); ?>/"+product+"/"+color, function(data, status){

            document.getElementById("product-page").innerHTML=data;
            loader_dismis();
        });
    });
}
function changeWarranty(warranty,product) {
    $(document).ready(function () {
        loader_show();

        $.get("<?php echo e(url('selectwarranty')); ?>/"+product+"/"+warranty, function(data, status){

            document.getElementById("product-page").innerHTML=data;
            loader_dismis();
        });
    });
}
function addToCart() {
    $(document).ready(function () {
        loader_show();

        $.get("<?php echo e(url('addtocart')); ?>/<?php echo e($product->id); ?>", function(data, status){
            loader_dismis();

            show_cart();

            if (data['state']['status'] == true)
                Swal.fire(
                    ' ',
                    'محصول با موفقیت به سبد خرید اضاف شد',
                    'success'
                );
            else
                Swal.fire({
                    type: 'error',
                    title: ' ',
                    text: 'تعداد محصول بیشتر از موجودی می باشد',
                });
        });
    });

}
</script>
<?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/front/product/selectAttribute.blade.php ENDPATH**/ ?>