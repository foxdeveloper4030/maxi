<div  style="height:200px;">
    <aside style="width: 100%" class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-ol"></i> <span> انتخاب ویژگی</span>
                        <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php $__currentLoopData = \App\Attribute_Group::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="treeview" >
                                    <a ><span style="cursor: pointer" class="badge"> <?php echo e($group->name); ?></span>

                                        <span class="pull-left-container">

                                             <i class="fa fa-angle-right pull-left"></i>
                                        </span>
                                    </a>

                                    <ul style="overflow: scroll;max-height: 200px" class="treeview-menu">
                                        <?php $__currentLoopData = $group->attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $is=false;  ?>
                                            <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atrr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if ($atrr->id==$child->id)
                                                    $is=true;
                                                ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!$is): ?>
                                                <li class="treeview">

                                                    <input  id="<?php echo e($child->id); ?>" type="radio" name="group<?php echo e($group->id); ?>" checked="" style="width:20px;display: inline" onchange="select_attr(this,this.id)"><span style="cursor: pointer" class="badge" > <?php echo e($child->value->name); ?></span>

                                                    <span class="pull-left-container">
                                             <i class="fa fa-angle-right pull-left"></i>
                                            </span>
                                                    </a>

                                                </li>
                                            <?php else: ?>
                                                <li class="treeview">

                                                    <span style="cursor: pointer;background-color: green"  class="badge badge-success" > <?php echo e($child->value->name); ?></span>

                                                    <span class="pull-left-container">
                                             <i class="fa fa-angle-right pull-left"></i>
                                            </span>
                                                    </a>

                                                </li>

                                            <?php endif; ?>


                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </li>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>


                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
</div><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/product/attribute_select.blade.php ENDPATH**/ ?>