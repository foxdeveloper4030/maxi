<?php if((new \App\PublicModel())->AllCount($product)>0): ?>
    <div class="price">
        <?php if((new \App\Model\ProductModel($product->id))->specialcost()!=0): ?>
            <div class="text-center">
                <del><span><?php echo e(number_format($product->price_main)); ?><span>تومان</span></span>
                </del>
            </div>
            <div class="text-center">
                <ins><span><?php echo e(number_format((new \App\Model\ProductModel($product->id))->specialcost())); ?><span>تومان</span></span>
                </ins>
            </div>
        <?php else: ?>
            <div class="text-center">
                <ins><span><?php echo e(number_format($product->price_main)); ?><span>تومان</span></span>
                </ins>
            </div>


        <?php endif; ?>
    </div>

<?php else: ?>
    <div class="price">
        <div class="text-center">
            <ins><span>اتمام موجودی<span></span></span>
            </ins>
        </div>
    </div>

<?php endif; ?>
<?php /**PATH /home2/maximors/public_html/maximorse/resources/views/product/price.blade.php ENDPATH**/ ?>