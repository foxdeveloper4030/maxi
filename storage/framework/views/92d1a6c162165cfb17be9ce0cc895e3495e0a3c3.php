

<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(count($child->childs->all())<1&&$child->home==1): ?>
    <li>
        <a href="#"> <p style="cursor: pointer" onclick="window.location.href='<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($child->name)])); ?>'"><?php echo e($child->name); ?></p>
        </a>
    </li>

    <?php else: ?>
    <?php if($child->home==1): ?>
       <li class="sub-menu">


        <a href="#">
            <p style="cursor: pointer" onclick="window.location.href='<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])); ?>'"><?php echo e($category->name); ?></p>
        </a>

            <ul>
                <?php echo $__env->make('layouts.category_childs_responsive',['childs'=>$child->childs->all()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </ul>

       </li>
    <?php endif; ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\project\xampp\htdocs\khanehkala\resources\views/layouts/category_childs_responsive.blade.php ENDPATH**/ ?>