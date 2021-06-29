
<?php if(count($product->AllCategory )>0): ?>
    <table class="table">
        <thead>
        <tr>
            <th>نام دسته</th>
            <th>حذف</th>

        </tr>
        </thead>
        <tbody >


        <?php $__currentLoopData = $product->AllCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr class="success">
                <td><?php echo e($cat->category->name); ?></td>
                <td><button onclick="DeleteCat(<?php echo e($product->id); ?>,<?php echo e($cat->id); ?>)"><i class="fa fa-remove"></i></button></td>
            </tr>



        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-danger">
        هیچ دسته بندی مرطبتی وجود ندارد
    </div>
<?php endif; ?>
    <br>

<h2>
    افزودن
</h2>
    <table class="table" >
        <thead>
        <tr>
            <th>نام دسته</th>
            <th>افزودن</th>

        </tr>
        </thead>
        <tbody >
          <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $exitt=true;?>
              <?php $__currentLoopData = $product->AllCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                  if ($cata->category_id==$cat->id){
                      $exitt=false;

                  }

                  ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php if($exitt): ?>
              <tr class="success">
                  <td><?php echo e($cat->name); ?></td>
                  <td><button onclick="AddCat(<?php echo e($product->id); ?>,<?php echo e($cat->id); ?>)"><i class="fa fa-plus"></i></button></td>
              </tr>
              <?php endif; ?>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php /**PATH /home2/maximors/public_html/resources/views/admin/product/relationCats.blade.php ENDPATH**/ ?>