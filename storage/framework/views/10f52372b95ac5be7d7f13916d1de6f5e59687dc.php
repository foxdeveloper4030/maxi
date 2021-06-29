


<?php if(!empty($category->childs)): ?>

    <ul class="treeview-menu">

        <?php $__currentLoopData = $category->childs->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($child->childs->all())<1): ?>
                <li> <input id="<?php echo e($category->id); ?>" type="checkbox" style="display: inline" onchange="select_cat(this,'<?php echo e($category->id); ?>')"><a style="display: inline"><i class="fa fa-circle-o"></i><?php echo e($child->name); ?></a></li>
            <?php else: ?>
                <li class="treeview">

                    <input id="<?php echo e($category->id); ?>" type="checkbox" style="display: inline" onchange="select_cat(this,'<?php echo e($category->id); ?>')"><span style="cursor: pointer" class="badge" > <?php echo e($child->name); ?></span>

                        <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                      </span>
                    </a>
                    <?php echo $__env->make('admin.product.childs1',['category'=>$child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </li>
            <?php endif; ?>


       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
<?php endif; ?>


<?php /**PATH /home2/maximors/public_html/resources/views/admin/product/childs1.blade.php ENDPATH**/ ?>