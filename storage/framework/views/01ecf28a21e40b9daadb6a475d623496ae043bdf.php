


<?php $__env->startSection('title'); ?>
    افزودن محصول جدید
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script>
    var cats=[];
</script>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> افزودن محصول جدید </span>
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
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">تعداد محصول ها</span>
                        <span class="info-box-number"><?php echo e(count(\App\Product::all())); ?></span>
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
                        <h3 class="box-title">افزودن محصول </h3>

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
                                    <form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('products.store')); ?>">
                                      <?php echo csrf_field(); ?>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نام محصول</label>
                                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام محصول">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">دسته بندی پیشفرض</label>
                                                <select name="category_id" type="text" class="form-control" id="exampleInputEmail1" >
                                                    <?php $__currentLoopData = \App\Category::query()->where('parent_id','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">دسته های مرتبط</button>
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
                            cols="80">این ویرایشگر راست چین و فارسی شده و تنظیمات آن به صورت اختصاصی تنظیم شده است...</textarea>

                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">قیمت اصلی (پرداختی)</label>
                                                <input name="price_main" type="text" class="form-control" id="exampleInputEmail1" placeholder="قیمت محصول">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">قیمت با مالیات (اختیاری)</label>
                                                <input name="wholesale_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="قیمت با مالیات محصول">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">عنوان متا (اختیاری)</label>
                                                <input name="meta_title" type="text" class="form-control" id="exampleInputEmail1" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">کلمات متا (اختیاری)</label>
                                                <input name="meta_keyword" type="text" class="form-control" id="exampleInputEmail1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">توضیحات متا (اختیاری)</label>
                                                <input name="meta_description" type="text" class="form-control" id="exampleInputEmail1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">توضیحات متا (اختیاری)</label>
                                                <input name="meta_description" type="text" class="form-control" id="exampleInputEmail1" >
                                            </div>




                                            <div class="form-group">
                                                <label for="exampleInputEmail1">عکس اصلی محصول</label>
                                                <input name="image" type="file" class="form-control" id="exampleInputEmail1" >
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

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/admin/product/create.blade.php ENDPATH**/ ?>