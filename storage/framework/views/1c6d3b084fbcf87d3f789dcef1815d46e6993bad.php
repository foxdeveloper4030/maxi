

<tr>
    <th>شماره
    </th>
    <th>نام<
    </th>

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

        <td><button type="button" onclick="addspecial('<?php echo e($product->name); ?>','<?php echo e($product->id); ?>','<?php echo e($product->price_main); ?>')"  class="btn btn-success"><?php echo e($product->name); ?></button></td>

    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php else: ?>
    <tr>
        <td class="alert alert-danger">محصولی یافت نشد</td>
    </tr>


<?php endif; ?><?php /**PATH /home2/maximors/public_html/resources/views/admin/product/ajax_show_special.blade.php ENDPATH**/ ?>