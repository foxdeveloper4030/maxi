


<?php if(!empty($category->childs)): ?>

    <ul class="treeview-menu">

        <?php $__currentLoopData = $category->childs->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($child->childs->all())<1): ?>
                <li><a href="<?php echo e(route('admincategory.show',['id'=>$child->id])); ?>"><i class="fa fa-circle-o"></i><?php echo e($child->name); ?></a></li>
            <?php else: ?>
                <li class="treeview">

                    <a style="cursor: pointer"><i class="fa fa-circle-o"></i><span style="cursor: pointer" class="badge" onclick="redirect('<?php echo e(route('category.show',['name'=>(new \App\PublicModel())->slug_format($child->name)])); ?>')"> <?php echo e($child->name); ?></span>

                        <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                      </span>
                    </a>
                    <?php echo $__env->make('admin.layouts.categorychilds',['category'=>$child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </li>
            <?php endif; ?>


       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
<?php endif; ?>


<?php /**PATH D:\project\xampp\htdocs\khanehkala\resources\views/admin/layouts/categorychilds.blade.php ENDPATH**/ ?>