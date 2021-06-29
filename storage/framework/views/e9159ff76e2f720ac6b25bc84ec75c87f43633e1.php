<?php $__env->startSection('title'); ?>
      بنر ها
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Main content -->
    <section class="content">



        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">بنر ها </span>
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
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">بنر شمار - <?php echo e($banner->id); ?> </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img class="image" style="max-width: 300px" src="<?php echo e(url('')); ?>/<?php echo e($banner->url); ?>">
                        <br>
                        <br>
                        <form enctype="multipart/form-data" method="post" action="<?php echo e(route('admin.banner.edite',['id'=>$banner->id])); ?>">
                            <label>عنوان</label>
                            <input name="title" type="text" value="<?php echo e($banner->title); ?>">
                            <br>
                            <br>

                            <label>لینک</label>
                            <input name="link" type="text" value="<?php echo e($banner->link); ?>">
                            <br>
                            <br>
                            <br>
                            <?php echo csrf_field(); ?>
                            <label>تغییر بنر</label>
                            <input type="file" name="url">
                            <br>
                            <br>
                            <button type="submit" class="btn btn-success">ویرایش</button>
                        </form>

                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- /.row -->


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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/design/banner_index.blade.php ENDPATH**/ ?>