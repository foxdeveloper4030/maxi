<?php $__env->startSection('title'); ?>


    دسته ها

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> مدیریت دسته </span>
                        <span class="info-box-number"><small><?php echo e($category->name); ?></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">تعداد محصولات</span>
                        <span class="info-box-number"><?php echo e(count(\App\Product::all())); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">تعداد دسته ها</span>
                        <span class="info-box-number"><?php echo e(count(\App\Category::all())); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <!-- /.row -->


        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">افزودن دسته بندی</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="box box-primary">
                            <div class="box-header with-border">

                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('admincategory.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">نام دسته</label>
                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام دسته">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">سر دسته</label>:<?php echo e($category->name); ?>

                                      <input type="hidden" value="<?php echo e($category->id); ?>" name="parent_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">آیکن دسته (اختیاری)</label>
                                        <input name="icon" type="file" id="exampleInputFile">


                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">افزودن</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
<?php if($category->parent_id==0): ?>
            <div class="col-md-6" id="feature_content">
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
                                        <span style="cursor: pointer;"><?php echo e($feature->feature); ?></span>-
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <button class="btn" data-toggle="modal" data-target="#add_feature" onclick="setid('<?php echo e($feature_category->id); ?>','<?php echo e($feature_category->name); ?>')">+</button>
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
            </div>
<?php endif; ?>

            <script>
                function add_cat() {
                    var name=document.getElementById('cat_feature_name').value;

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("feature_content").innerHTML =
                                this.responseText;

                            alert('عملیات موفق');
                        }
                    };
                    xhttp.open("GET", "<?php echo e(route('admin.feature.add.category')); ?>/<?php echo e($category->id); ?>/"+name, true);
                    xhttp.send();
                }
var id_feature=0;
                function setid(id,name) {
                    document.getElementById('h4f').innerHTML='اافزودن زیر ویژگی به:'+name;
                    id_feature=id;
                }
                function add_feature() {
                    var feature=document.getElementById('feature_name').value;

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("feature_content").innerHTML =
                                this.responseText;

                            alert('عملیات موفق');
                        }
                    };
                    xhttp.open("GET", "<?php echo e(route('admin.feature.add.feature')); ?>/"+id_feature+"/"+feature, true);
                    xhttp.send();
                }
            </script>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div id="add_cat_feature"   class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">افزودن سردسته ویژگی</h4>
                </div>
                <div class="modal-body">
                    <label>نام سردسته ویژگی:</label>

                    <input class="form-control" id="cat_feature_name">
                    <br>
                    <button type="button" onclick="add_cat()" class="btn vtn-info">افزودن</button>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" data-dismiss="modal" >Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="add_feature"   class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="h4f"></h4>
                </div>
                <div class="modal-body">
                    <label>نام  ویژگی:</label>

                    <input class="form-control" id="feature_name">
                    <br>
                    <button type="button" onclick="add_feature()" class="btn vtn-info">افزودن</button>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" data-dismiss="modal" >Close</button>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/maximors/public_html/resources/views/admin/category/show.blade.php ENDPATH**/ ?>