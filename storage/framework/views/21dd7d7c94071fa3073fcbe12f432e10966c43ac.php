<?php $__env->startSection('title'); ?>
    <?php echo e($product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <script>
        var cats=[];
    </script>
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">  <?php echo e($product->name); ?>  </span>
                        <span class="info-box-number"><small></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-help"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">مستندات</span>
                        <span class="info-box-number"><button class="btn btn-success">نمایش مستندات</button></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><img src="https://image.flaticon.com/icons/svg/3014/3014802.svg"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">نظرات کاربران</span>
                        <span class="info-box-number"><a href="" class="btn btn-success">نمایش نظرات کاربران</a></span>
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
            <div class="col-md-10">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> محصول </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#excel-edite">ویرایش از فایل اکسل</button>
                        <a class="btn btn-primary" href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>" target="_blank">مشاهده محصول درون سایت</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('products.update',['id'=>$product->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام محصول</label>
                                    <input value="<?php echo e($product->name); ?>" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام محصول">
                                </div>

                                <!-- Trigger the modal with a button -->
                                <div class="form-group">
                                    <span class="badge badge-info"><?php echo e(\App\Category::query()->find($product->category_id)->name); ?></span>
                                    <label for="exampleInputEmail1">دسته بندی پیشفرض</label>
                                    <select id="category_id_select" onchange="document.getElementById('category_id').value=document.getElementById('category_id_select').value"  type="text" class="form-control" id="exampleInputEmail1" >
                                        <?php $__currentLoopData = \App\Category::query()->where('home','=',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="hidden" name="category_id" value="<?php echo e($product->category_id); ?>" id="category_id">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">خلاصه ویژگی ها</label>


                                    <div class="box box-success">
                                        <div class="box-header">

                                            <!-- tools box -->
                                            <div class="pull-right box-tools">

                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">

                  <textarea  id="editor1" name="details" rows="10"
                             cols="80"><?php echo e($product->details); ?></textarea>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">قیمت اصلی (پرداختی)</label>
                                    <input value="<?php echo e($product->price_main); ?>" name="price_main" type="text" class="form-control" id="exampleInputEmail1" placeholder="قیمت محصول">
                                </div>
                               <?php if(count($product->colors)<1): ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">تعداد</label>
                                    <input value="<?php echo e($product->quantity); ?>" name="quantity" type="text" class="form-control" id="exampleInputEmail1" placeholder="قیمت محصول">
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">قیمت با مالیات (اختیاری)</label>
                                    <input value="<?php echo e($product->wholesale_price); ?>" name="wholesale_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="قیمت با مالیات محصول">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">عنوان متا (اختیاری)</label>
                                    <input value="<?php echo e($product->meta_title); ?>" name="meta_title" type="text" class="form-control" id="exampleInputEmail1" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">کلمات متا (اختیاری)</label>
                                    <input value="<?php echo e($product->meta_keyword); ?>" name="meta_keyword" type="text" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">توضیحات متا (اختیاری)</label>
                                    <input value="<?php echo e($product->meta_description); ?>" name="meta_description" type="text" class="form-control" id="exampleInputEmail1" >
                                </div>





                                <input type="hidden" name="cats" id="cats_id">


                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                            </div>
                                            <div class="modal-body" style="overflow: scroll;height: 90%">
                                                <?php echo $__env->make('admin.product.category_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">ویرایش</button>
                            </div>
                        </form>


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

        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> ویژگی ها </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->

                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            مشخصات و ویرایش  </h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addColors">افزودن رنگ</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody><tr>

                                <th>نام رنگ</th>
                                <th>رنگ</th>
                                <th>قیمت افزوده</th>
                                <th>تعداد محصول با این رنگ </th>
                                <th>ویرایش</th>

                            </tr>
                            <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($color->color->name); ?></td>
                                    <td><span style="width: 20px;height: 20px;background-color: <?php echo e($color->color->color); ?>">0</span></td>
                                    <td><?php echo e($color->price); ?></td>
                                    <td><?php echo e($color->count); ?></td>
                                    <td>
                                        <button type="button" onclick="setColor('<?php echo e($color->id); ?>','<?php echo e($color->price); ?>','<?php echo e($color->count); ?>')" class="btn btn-info" data-toggle="modal" data-target="#modal-color">ویرایش</button>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.product.color.delete',['id'=>$color->id])); ?>" class="btn btn-danger" >حذف</a>
                                    </td>
                                </tr>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>


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

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            مشخصات و ویرایش  </h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-w">افزودن گارانتی</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody><tr>

                                <th>نام </th>
                                <th>قیمت افزوده</th>
                                <th>حذف</th>

                            </tr>
                            <?php $__currentLoopData = $product->warranties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($w->warranty->name); ?></td>

                                    <td><?php echo e($w->price); ?></td>


                                    <td>
                                        <a href="<?php echo e(route('admin.product.warranty.delete',['id'=>$w->id])); ?>" class="btn btn-danger" >حذف</a>
                                    </td>
                                </tr>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>


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

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            ویژگی محصولات</h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">افزودن ویژگی</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>شماره</th>

                                <th>نام مشخصه</th>
                                <th>مقدار</th>
                                <th>حذف</th>

                            </tr>
                            </thead>
                            <tbody>
                              <?php  $category=\App\PublicModel::parent($product);  ?>
                              <?php $__currentLoopData = $category->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td><?php echo e($feature->id); ?></td>


                                            <td><?php echo e($feature->feature); ?></td>
                                            <td><input type="text" id="fid<?php echo e($feature->id); ?>" class="form-control" value="<?php echo e(\App\PublicModel::feature_value($product->id,$feature->id)); ?>"></td>
                                            <td>
                                                <button onclick="edite_feature('<?php echo e($product->id); ?>','<?php echo e($feature->id); ?>',document.getElementById('fid<?php echo e($feature->id); ?>').value)" class="btn btn-danger" >ویرایش</button>

                                            </td>
                                        </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <script>
                                function edite_feature(pid,fid,value) {
                                    if(value!=" "){
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {


                                                alert('عملیات موفق');
                                            }
                                        };
                                        xhttp.open("GET", "<?php echo e(route('admin.feature.add.product')); ?>/"+pid+"/"+fid+"/"+value, true);
                                        xhttp.send();
                                    }
                                }
                            </script>
                                    </tbody>
                                </table>





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

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            تصاویر محصولات</h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add-image" >افزودن تصویر</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th>تصویر</th>
                                <th>متن جایگزین</th>
                                <th>حذف</th>
                                <th>تنظیم به عنوان کاور</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($image->id); ?></td>
                                    <td> <img class="img-thumbnail" height="100" width="200" src="<?php echo e((new \App\PublicModel())->image_show($image)); ?>"></td>
                                    <td><?php echo e($image->alt); ?></td>
                                    <?php if($image->cover==0): ?>
                                    <td>
                                     <a class="btn btn-danger" href="<?php echo e(route('admin.product.image.delete',['id'=>$image->id])); ?>">حذف</a>
                                    </td>
                                        <td><a href="<?php echo e(route('admin.product.image.set',['id'=>$image->id,'product'=>$product->id])); ?>" class="btn btn-info">کاور</a></td>
                                      <?php else: ?>
                                        <td>کاور</td>
                                        <td></td>

                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>


                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>

            <!-- /.col -->

        </div>


        <!-- /.row -->
    </section>

    <div class="modal modal-info fade" id="modal-add-image" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        افزودن تصویر
                    </h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>
                    <form enctype="multipart/form-data" action="<?php echo e(route('admin.product.image.add',['product_id'=>$product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <label>انتخاب عکس 600*600:</label>
                        <input type="file" id="attrs_id" name="image">
                        <br>
                        <label>متن جایگزین تصویر</label>
                        <input type="text" name="alt" class="form-control">
                        <br>
                        <label>تنظیم به عنوان کاور:</label>
                        <input class="checkbox" type="checkbox" name="cover">
                        <br>
                        <button class="btn btn-success" id="sub" type="submit" >اعمال تغییرات</button>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal modal-info fade" id="addColors" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">

                    </h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.product.color.add',['id'=>$product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <label>قیمت:</label>
                            <input type="hidden" id="color_id" name="color_id">
                            <input type="text" id="color_price" class="form-control" name="color_price">
                            <label> تعداد:</label>
                            <input type="text" id="color_count" class="form-control" name="color_count">
                            <label> رنگ:</label>
                            <select name="color" class="form-control">

                                <?php $__currentLoopData = \App\Color::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <br>
                            <button class="btn btn-success" id="sub" type="submit" >اعمال تغییرات</button>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
    <div class="modal modal-info fade" id="modal-info" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">افزودن ویژگی و ترکیبات به محصول</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>
                    <form action="<?php echo e(route('product.add.atribute',['product'=>$product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="attrs_id" name="attrs">
                        <button class="btn btn-success" id="sub" type="submit" style="display: none">اعمال تغییرات</button>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal modal-info fade" id="modal-add" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">افزودن ویژگی و ترکیبات به محصول</h4>
                </div>
                <form action="<?php echo e(route('admin.feature.add',['product'=>$product->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <label>مقدار مشخصه:</label>
                        <input type="text" id="id_feature_value" name="id_feature_value" class="form-control" >
                        <br>
                        <label>انتخاب مشخصه:</label>
                        <select name="feature_id" class="form-control">
                           <?php $__currentLoopData = \App\Feature_Lang::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($f->id); ?>">
                                   <?php echo e($f->name); ?>

                               </option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <br>
دذ کادر زیر جستجو کنید و یکی از مقادیر آبی رنگ را انتخاب کنید
                        <input type="text" class="form-control" onkeyup="showFeature(this.value)">
                        <div id="feature_result" style="overflow: scroll;height: 100px;background-color: black">

                        </div>

                        <br>
                        <button style="display: none" class="btn btn-success" id="submiting" type="submit" >اعمال تغییرات</button>

                    </div>

                </form>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>

                    <input type="hidden" id="attrs_id" name="attrs">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        function setColor(id,price,count) {
                  document.getElementById('color_id1').value=id;
                  document.getElementById('color_price').value=price;
                  document.getElementById('color_count').value=count;

        }
    </script>
    <div class="modal modal-info fade" id="modal-w" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">ویرایش
                    </h4>
                </div>
                <form action="<?php echo e(route('admin.product.warranty.add',['product'=>$product->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <label>قیمت افزوده گارانتی:</label>
                        <input type="text" class="form-control" name="warranty_price">

                        <label> انتخاب گارنتی:</label>
                        <select name="warranty_id" class="form-control">
                            <?php $__currentLoopData = \App\Warranty::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($w->id); ?>"><?php echo e($w->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <br>
                        <button class="btn btn-success" id="sub" type="submit" >اعمال تغییرات</button>

                    </div>

                </form>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>

                    <input type="hidden" id="attrs_id" name="attrs">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal modal-info fade" id="modal-color" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">ویرایش
                    </h4>
                </div>
                <form action="<?php echo e(route('admin.product.color.edit',['product'=>$product->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <label>قیمت:</label>
                        <input type="hidden" id="color_id1" name="color_id">
                        <input type="text" id="color_price" class="form-control" name="color_price">
                        <label> تعداد:</label>
                        <input type="text" id="color_count" class="form-control" name="color_count">
                        <br>
                        <button class="btn btn-success" id="sub" type="submit" >اعمال تغییرات</button>

                    </div>

                </form>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>

                    <input type="hidden" id="attrs_id" name="attrs">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




    <!-- /.modal -->
    <?php echo $__env->make('admin.product.excelform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script>

        function select_cat(checkbox,id) {
            var arr=[];
            var exist=false;
            if (checkbox.checked) {
                for (var i = 0; i < cats.length; i++) {
                    if (id == cats[i])
                        exist = true;
                    else arr.push(cats[i]);
                }
                if (!exist) {
                    arr.push(id);
                }
            }
            else {
                for (var i = 0; i < cats.length; i++) {
                    var ex=-1;
                    if (id != cats[i])
                        arr.push(cats[i]);
                }

            }
            cats=arr;
            var textcat="["
            document.getElementById('cats_id').value=textcat+cats.toString()+"]";


        }

    </script>
    <script src="bower_components/ckeditor/ckeditor.js"></script>

    <script>

        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    <script>
        var attributes=[];
        function select_attr(checkbox,id) {
            var arr=[];
            var exist=false;
            if (checkbox.checked) {
                for (var i = 0; i < attributes.length; i++) {
                    if (id == attributes[i])
                        exist = true;
                    else arr.push(attributes[i]);
                }
                if (!exist) {
                    arr.push(id);
                }
            }
            else {
                for (var i = 0; i < attributes.length; i++) {
                    var ex=-1;
                    if (id != attributes[i])
                        arr.push(attributes[i]);
                }

            }
            attributes=arr;

            document.getElementById('attrs_id').value=attributes.toString();
            if (attributes.length>0)
                document.getElementById('sub').style.display='block';
            else
                document.getElementById('sub').style.display='none';
        }

    </script>
    <!-- jQuery 3 -->
    
    
    
    
    
    
    
    

    
    
    
    
    

    <script>


        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor

        })
    </script>

    <script>
        function showFeature(str) {

            if (str.length == 0) {
                document.getElementById("feature_result").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("feature_result").innerHTML = this.responseText;

                    }
                };
                xmlhttp.open("GET", "<?php echo e(route('admin.search.features')); ?>/" + str, true);
                xmlhttp.send();
            }
        }

        function setFeature(id) {
            document.getElementById('id_feature_value').value=id;
            document.getElementById('submiting').style.display='block';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/maximors/public_html/resources/views/admin/product/show.blade.php ENDPATH**/ ?>