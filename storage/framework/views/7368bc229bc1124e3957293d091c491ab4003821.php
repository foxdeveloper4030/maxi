



<div  style="height:200px;">
    <aside style="width: 100%" class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-ol"></i> <span>دسته ها</span>
                        <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php $__currentLoopData = \App\Category::query()->where('parent_id','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(empty($category->childs)): ?>
                                <li><a> <input id="<?php echo e($category->id); ?>" type="checkbox" style="display: inline" onchange="select_cat(this,'<?php echo e($category->id); ?>')"><?php echo e($category->name); ?></a></li>
                            <?php else: ?>
                                <li class="treeview">
                                    <input id="<?php echo e($category->id); ?>" type="checkbox" style="display: inline" onchange="select_cat(this,'<?php echo e($category->id); ?>')">  <a style="cursor: pointer;display: inline"><span style="cursor: pointer" class="badge"> <?php echo e($category->name); ?></span>

                                        <span class="pull-left-container">

                                             <i class="fa fa-angle-right pull-left"></i>
                                        </span>
                                    </a>
                                    <?php echo $__env->make('admin.product.childs1',['category'=>$category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </li>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
</div>
<?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/product/category_select.blade.php ENDPATH**/ ?>