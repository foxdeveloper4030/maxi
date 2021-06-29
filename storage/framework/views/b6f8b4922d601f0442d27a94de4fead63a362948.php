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
    <!-- Main content -->
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

                  <textarea  id="details" name="editor1" rows="10"
                             cols="80"><?php echo e($product->details); ?></textarea>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">قیمت اصلی (پرداختی)</label>
                                    <input value="<?php echo e($product->price_main); ?>" name="price_main" type="text" class="form-control" id="exampleInputEmail1" placeholder="قیمت محصول">
                                </div>

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

                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>نام</th>


                            </tr>
                            <?php $index=1  ?>
                            <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atrr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($atrr->id); ?></td>
                                    <td><?php echo e($atrr->value->name); ?>

                                        <?php if($atrr->color!=null): ?>
                                            <span class="badge" style="background-color: <?php echo e($atrr->color); ?>">#</span>


                                        <?php endif; ?>
                                    </td>

                                    <?php $index+=1;?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody></table>


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
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            ترکیبات </h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">افزودن ویژگی</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>نام</th>
                                <th>تعداد</th>
                                <th>قیمت افزوده</th>
                                <th>پیشفرض</th>
                            </tr>
                            <?php $index=1  ?>
                            <?php $__currentLoopData = $product_attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($attr->id); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $attr->combines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($com->atrr->value->name); ?>*
                                            <?php if(isset($atrr->color)): ?>
                                                <span class="badge" style="background-color: <?php echo e($atrr->color); ?>"></span>


                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><input id="attrq<?php echo e($index); ?>" type="text" class="form-control" value="<?php echo e($attr->counts->quantity); ?>"></td>
                                    <td><input type="text" id="attrp<?php echo e($index); ?>" class="form-control" value="<?php echo e($attr->price); ?>"></td>

                                    <td>
                                        <?php if($attr->id==$attr_id): ?>
                                            <input id="attrd<?php echo e($index); ?>"  type="radio"  name="defult" checked="checked"><i class="fa fa-check"></i>
                                        <?php else: ?>
                                            <input id="attrd<?php echo e($index); ?>"  type="radio" name="defult" checked="">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="new function() {
                                            $(document).ready(function(){
                                            var defaul=0;
                                            if (document.getElementById('attrd<?php echo e($index); ?>').checked==true)
                                            defaul=1;
                                            var price=document.getElementById('attrp<?php echo e($index); ?>').value;
                                            var quantity=document.getElementById('attrq<?php echo e($index); ?>').value;
                                            window.location.href='<?php echo e(route('product.attribute.edite')); ?>/'+'<?php echo e($attr->id); ?>/'+price+'/'+quantity+'/'+defaul;
                                            });
                                            }">اعمال</button>
                                    </td>
                                    <?php $index+=1;?>
                                    <td>
                                        <button onclick="new function() {
                                            var delete1=window.confirm('ویژگی حذف شود؟؟');
                                            if (delete1==true)
                                            window.location.href='<?php echo e(route('product.attribute.delete')); ?>/'+'<?php echo e($attr->id); ?>';
                                            }" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody></table>


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
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">افزودن ویژگی</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody><tr>

                                <th>نام</th>
                                <th>مقدار</th>
                                <th>ویرایش </th>
                                <th>حدف </th>
                            </tr>
                            <?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <form action="<?php echo e(route('admin.feature.edite',['id'=>$feature->id_feature])); ?>" method="post">
                                        <td>
                                            <?php echo csrf_field(); ?>
                                            <input name="name" type="text" value="<?php echo e(\App\Feature_Lang::query()->find($feature->id_feature)->name); ?>">
                                        </td>
                                        <td>
                                            <input type="hidden" name="value_id" value="<?php echo e(\App\Feature_value::query()->find($feature->id_feature_value)->id); ?>">
                                            <input name="value" type="text" value=" <?php echo e(\App\Feature_value::query()->find($feature->id_feature_value)->value); ?>">
                                        </td>
                                        <td><button type="submit" class="btn btn-success">ویرایش</button></td>
                                    </form>


                                    <td><button onclick="new function() {
                                            var con=window.confirm('آیتم انتخابی حذف شود؟');
                                            if (con==true)
                                            window.location.href='<?php echo e(route('admin.feature.delete',['product'=>$product->id,'id'=>$feature->id_feature])); ?>';
                                            }" class="btn btn-danger">حذف</button></td>


                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody></table>


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
                        <button type="button" class="btn btn-info" >افزودن تصویر</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php $__empty_1 = true; $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-1">
                                <div class="card">
                                    <img class="img-thumbnail" height="100" width="200" src="<?php echo e((new \App\PublicModel())->image_show($image->id_image)); ?>">
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>



                        <?php endif; ?>
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
                    <?php echo $__env->make('admin.product.attribute_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <label>نام مشخصه:</label>
                        <input class="form-control" name="name">
                        <label>مقدار مشخصه:</label>
                        <input class="form-control" name="value">
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
    <!-- Bootstrap WYSIHTML5 -->
    <!--<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
    <!-- TinyMCE Editor -->
    <script src="bower_components/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#mytextarea',
            plugins: 'advlist autolink link lists preview table code pagebreak',
            menubar: false,
            language: 'fa',
            height: 300,
            relative_urls: false,
            toolbar: 'undo redo | removeformat preview code | fontsizeselect bullist numlist | alignleft aligncenter alignright alignjustify | bold italic | pagebreak table link',
        });
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
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <!--<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
    <!-- TinyMCE Editor -->
    <script src="bower_components/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#mytextarea',
            plugins: 'advlist autolink link lists preview table code pagebreak',
            menubar: false,
            language: 'fa',
            height: 300,
            relative_urls: false,
            toolbar: 'undo redo | removeformat preview code | fontsizeselect bullist numlist | alignleft aligncenter alignright alignjustify | bold italic | pagebreak table link',
        });
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkal\resources\views/admin/product/show.blade.php ENDPATH**/ ?>