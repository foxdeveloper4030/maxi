


<?php $__env->startSection('title'); ?>
   حامل های مرسوله
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">جدول روش های ارسال</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>شهرهای ارایه خدمات</th>
                            <th>مشاهده و ویرایش</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = \App\Cariar::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cariar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cariar->name); ?></td>
                            <td>
                                <?php $__currentLoopData = $cariar->cyties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e(\App\Province::query()->find($city->province_id)->name); ?>-

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><a href="<?php echo e(route('admin.cariar.show',['id'=>$cariar->id])); ?>" class="btn btn-primary">مشاهده</a></td>
                            <td>
                                <?php if($cariar->active==1): ?>
                                    <button class="btn btn-success">فعال</button>
                                <?php else: ?>
                                    <button class="btn btn-danger"> غیر فعال</button>
                                <?php endif; ?>
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>

        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->
    </section>
    <!-- /.content -->

    <script>

        function ajax_id(id) {

            $(document).ready(function(){
                document.getElementById('loading').style.display='block';
                $.get("<?php echo e(url('')); ?>/admin/product/ajax/"+id, function(data, status){

                    document.getElementById('body_val').innerHTML=data;
                    document.getElementById('loading').style.display='none';
                });

            });
        }
        function ajax_name(name) {

            $(document).ready(function(){
                document.getElementById('loading').style.display='block';
                $.get("<?php echo e(url('')); ?>/admin/product/ajax/name/"+name, function(data, status){

                    document.getElementById('body_val').innerHTML=data;
                    document.getElementById('loading').style.display='none';
                });

            });
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
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/admin/cariar/index.blade.php ENDPATH**/ ?>