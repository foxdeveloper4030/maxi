<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(count($child->childs->all())<1&&$child->home==1): ?>
        <li class="list-item list-item-has-children"
            style="width:20%;height:40px;line-height:40px;background-color: rgba(245,245,245,.5);margin-bottom: 1%; margin-right:1%;
                    border: 1px solid #eeeeee; border-radius: 5px;">
            <i class="now-ui-icons arrows-1_minimal-left" style="line-height: 2.533;"></i>
            <a class="nav-link" style="font-size: 13px; font-weight: bold"
               href="<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($child->name)])); ?>"><?php echo e($child->name); ?></a>
        </li>

    <?php else: ?>
        <?php if($child->home==1): ?>
            <li class=" widget-suggestion widget card"
                style="width:20%;height:40px;line-height:40px;background-color: rgba(40,255,188,0.5);margin-bottom: 1%; margin-right:1%;
                    border: 1px solid #eeeeee; border-radius: 5px;">
                <i class="now-ui-icons " style="line-height: 2.533;"></i>
                <a class="nav-link" style="font-size: 13px; font-weight: bold"
                   href="<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($child->name)])); ?>"><?php echo e($child->name); ?></a>
                <ul class="sub-menu nav">
                    <?php echo $__env->make('layouts.category_childs',['childs'=>$child->childs->all()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            </li>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home2/maximors/public_html/resources/views/layouts/category_childs.blade.php ENDPATH**/ ?>