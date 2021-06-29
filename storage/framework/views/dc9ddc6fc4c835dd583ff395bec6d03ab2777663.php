<?php $__env->startSection('meta'); ?>
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    پیگیری سفارش
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- main -->
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <?php if(isset($alert)): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e($alert); ?>

                                    </div>
                                <?php endif; ?>
                                <h1 class="title-tab-content">پیگیری سفارش</h1>
                            </div>
                            <div class="content-section default">

                                <div class="content-section default">
                                    <div class="table-responsive">
                                        <table class="table table-order">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">شماره سفارش</th>
                                                <th scope="col">تاریخ ثبت سفارش</th>
                                                <th scope="col">مبلغ کل</th>
                                                <th scope="col">عملیات پرداخت</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="order-code"><?php echo e($order->refrens); ?></td>
                                                <td><?php echo e($order->created_at); ?></td>
                                                <td><?php echo e(number_format($order->price)); ?></td>
                                                <td class="text-success"><?php echo (new \App\OrderModul($order))->state(); ?></td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="content-section default">

                                <div class="content-section default">
                                    <div class="table-responsive">
                                        <table class="table table-order">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">محصول</th>
                                                <th scope="col">تصویر محصول</th>
                                                <th scope="col">قیمت محصول</th>
                                                <th scope="col"> تعداد</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $order->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>1</td>

                                                <td class="order-code"><?php echo e(\App\Product::query()->find($cart->product_id)->name); ?></td>
                                                <td><img src="<?php echo e((new \App\PublicModel())->image_cover(\App\Product::query()->find($cart->product_id))); ?>"></td>
                                                <td><?php echo e(number_format($order->price)); ?></td>
                                                <td class="text-success"><?php echo e($cart->count); ?></td>

                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr class="alert alert-danger">
                                                   هیچ سبد خریدی وجود ندارد
                                                </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\max\resources\views/front/refrense_show.blade.php ENDPATH**/ ?>