

<tr>
    <th>شماره
    </th>
    <th>نام
    </th>

    <th>تصویر</th>
    <th>تعداد</th>
    <th>قیمت</th>
    <th>نوع محصول</th>
    <th>مشاهده</th>
</tr>

<?php
if ($products!=null)
    if (count($products->get())>1)
        $products=$products->paginate(200);
    else
        $products=$products->get();


?>
<?php if($products!=null): ?>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <td><?php echo e($product->id); ?></td>

        <td><?php echo e($product->name); ?></td>
        <td><img width="50" src="<?php echo e((new \App\PublicModel())->image_cover($product)); ?>"></td>
        <td><?php echo e((new \App\PublicModel())->count($product)); ?></td>
        <td><?php echo e(number_format($product->price_main)); ?></td>
        <td>
            <?php if(count($product->attrs)>0): ?>
                محصولات با ترکیبات
            <?php else: ?>
                محصول بدون ترکیب
            <?php endif; ?>
        </td>
        <td>
            <a href="<?php echo e(route('products.show',['id'=>$product->id])); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php else: ?>
    <tr>
        <td class="alert alert-danger">محصولی یافت نشد</td>
    </tr>


<?php endif; ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/product/ajax_show.blade.php ENDPATH**/ ?>