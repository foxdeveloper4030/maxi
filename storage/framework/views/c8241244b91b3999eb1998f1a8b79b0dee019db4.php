<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row mt-5 mb-5">

            <table class="table table-striped">
                <thead>
                <tr>
                    <?php $__currentLoopData = session('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $product=\App\Product::query()->find($compare);  ?>
                    <th class="col-md-1">
                        <div class="widget widget-product card"  style="max-height: 400px;">
                            <header class="card-header">

                                <a href="<?php echo e(route('main.compare.delete',['product_id'=>$product->id])); ?>" ><i class="fa fa-remove"></i></a></header>
                            <div class="item">
                                <a href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>">
                                    <img style="max-height: 200px" src="<?php echo e((new \App\PublicModel())->image_cover($product,1)); ?>"
                                         class="img-fluid" alt="">
                                </a>
                                <p class="post-title small">
                                    <a href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>"><?php echo e($product->name); ?></a>
                                </p>
                                <div class="price">
                                    <?php if((new \App\Model\ProductModel($product->id))->specialcost()!=0): ?>
                                        <div class="text-center">
                                            <del><span><?php echo e(number_format($product->price_main)); ?><span>تومان</span></span></del>
                                        </div>
                                        <div class="text-center">
                                            <ins><span><?php echo e(number_format((new \App\Model\ProductModel($product->id))->specialcost())); ?><span>تومان</span></span></ins>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-center">
                                            <ins><span><?php echo e(number_format($product->price_main)); ?><span>تومان</span></span></ins>
                                        </div>


                                    <?php endif; ?>
                                </div>
                                <div class="btn-group">
                                    <button id="fastmode-load" onclick="loadproduct('<?php echo e($product->slug); ?>')" type="button" class="btn btn-default"><i class="fa fa-eye"></i></button>
                                    <?php if(empty((new \App\Model\ProductModel($product->id))->getdefaultattribute())): ?>
                                        <button onmouseenter="ok(this)"    id="fastmode-cart" onclick="maincart('<?php echo e($product->id); ?>','0')" type="button" class="btn btn-default"> <i class="fa fa-shopping-cart"></i></button>
                                    <?php else: ?>
                                        <button data-toggle="444" onmouseenter="ok(this)" id="fastmode-cart"  onclick="maincart('<?php echo e($product->id); ?>','<?php echo e((new \App\Model\ProductModel($product->id))->getdefaultattribute()->id); ?>')" type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = session('count_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $__currentLoopData = session('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <span style="background-color: #9f9f9f" class="block badge"><?php echo e(\App\Feature_Lang::query()->find($feature->id_feature)->name); ?></span>
                    </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tr>
                    <tr>
                        <?php $__currentLoopData = session('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $product=\App\Product::query()->find($compare);  ?>
                        <td>
                            <label>
                                <?php if(\App\Feature_Product::query()->where('id_product','=',$product->id)->where('id_feature','=',$feature->id_feature)->first()!=null): ?>
                                    <?php echo e(\App\Feature_value::query()->find(\App\Feature_Product::query()->where('id_product','=',$product->id)->where('id_feature','=',$feature->id_feature)->first()->id_feature_value)->value); ?>

                                <?php else: ?>
                                    &ensp;
                                <?php endif; ?>
                            </label>
                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php echo $__env->make('sub.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/layouts/compare.blade.php ENDPATH**/ ?>