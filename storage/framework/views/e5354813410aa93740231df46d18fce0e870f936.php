

<div class="cart dropdown">
    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink1">
        <img src="<?php echo e(asset('public/assets/img/shopping-cart.png')); ?>" alt="">
        سبد خرید
        <span class="count-cart"><?php echo e(count($allcart)); ?></span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
        <div class="basket-header">
            <div class="basket-total">
                <span>مبلغ کل خرید:</span>
                <span><?php
                    use App\Attribute;use App\Product_Attribute;$holeprice=0;
                    foreach ($allcart as $cart){
                        $holeprice+=$cart["price"];
                    }



                    ?><?php echo e(number_format($holeprice)); ?></span>
                <span> تومان</span>
            </div>
            <a href="<?php echo e(route('main.show.cart')); ?>" class="basket-link">
                <span>مشاهده سبد خرید</span>
                <div class="basket-arrow"></div>
            </a>
        </div>
        <ul class="basket-list">

                        <?php $__currentLoopData = $allcart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a  class="basket-item">

                        <div class="basket-item-content">
                            <?php if(isset($cart["attr_id"])): ?>
                            <button class="basket-item-remove" onclick="delete_cart_multy('<?php echo e($cart["product_id"]); ?>','<?php echo e($cart["attr_id"]); ?>')"></button>
                            <?php else: ?>
                                <button class="basket-item-remove" onclick="delete_cart('<?php echo e($cart["product_id"]); ?>')"></button>

                            <?php endif; ?>
                            <div class="basket-item-image">

                                <img alt="" src="<?php echo e((new App\PublicModel())->image_cover(App\Product::query()->find($cart["product_id"]))); ?>">
                            </div>
                            <div class="basket-item-details">
                                <div class="basket-item-title"><?php echo e((new App\PublicModel())->short_string(App\Product::query()->find($cart["product_id"])->name)); ?>

                                </div>
                                <div class="basket-item-params">
                                    <div class="basket-item-props">
                                        <?php if(isset($cart['attr_id'])): ?>
                                           <?php
                                           $attr_cart=Product_Attribute::query()->find($cart['attr_id'])->combines;
                                           foreach ($attr_cart as $comb){
                                               if (Attribute::query()->find($comb->id_attribute)->group->id==17)
                                                   echo '<span>'.Attribute::query()->find($comb->id_attribute)->value->name.'</span>';
                                           }

                                           ?>
                                        <?php endif; ?>

                                        <span> <?php echo e($cart['count']); ?> عدد</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
        <a href="<?php echo e(route('main.show.cart')); ?>" class="basket-submit">ورود و ثبت سفارش</a>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\khanehkalaWithMelat\resources\views/layouts/cart.blade.php ENDPATH**/ ?>