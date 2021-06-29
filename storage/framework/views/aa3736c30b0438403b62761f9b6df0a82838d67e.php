<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">افزودن ویژگی</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_cat_feature">افزودن سر دسته ویژگی+</button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="box box-primary">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <?php $__currentLoopData = $category->feature_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo e($feature_category->name); ?>:</label>
                        <?php $__currentLoopData = $feature_category->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p style="cursor: pointer;"><?php echo e($feature->feature); ?></p>-
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer -->
</div>
<!-- /.box -->
<?php /**PATH C:\xampp\htdocs\rel\resources\views/admin/category/feature_content.blade.php ENDPATH**/ ?>