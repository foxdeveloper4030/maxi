<div class="row">
    <div class="col-12">
        <div class="brand-slider card">
            <header class="card-header">
                <h3 class="card-title"><span>برندهای ویژه</span></h3>
            </header>
            <div class="owl-carousel">
                <?php if(isset($brands)): ?>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                                <a href="<?php echo e($brand->siteUrl); ?>"
                                   data-tooltip-text="<?php echo e($brand->alt); ?>">
                                    <img src="<?php echo e($brand->imgUrl); ?>" alt="<?php echo e($brand->alt); ?>">
                                </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\arsi\resources\views/sub/brands.blade.php ENDPATH**/ ?>