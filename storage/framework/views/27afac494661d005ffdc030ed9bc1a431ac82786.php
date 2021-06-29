<?php $__env->startSection('title'); ?>
   طرح های شگفت انگیز
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">



            <div class="col-md-12">
                <div class="box">

                    <div class="box-header">
                        <h3 class="box-title"> طرح های شگفت انگیز</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>نام محصول</th>
                                <th>پیشرفت</th>
                                <th style="width: 40px">زمان باقی مانده</th>

                                <th>
                                    حذف
                                </th>
                            </tr>

                            <?php $__currentLoopData = \App\Special::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($special->id); ?></td>
                                    <td> <?php echo e($special->product->name); ?></td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <?php
                                            $time = new \Carbon\Carbon($special->expire);
                                            $time_c = new \Carbon\Carbon($special->created_at);
                                            $now = new \Carbon\Carbon();
                                            $time = $time->timestamp;
                                            $now = $now->timestamp;
                                            $time_c = $time_c->timestamp;
                                            ?>
                                            <?php if($now<$time): ?>
                                                <div class="progress-bar progress-bar-success"
                                                     style="width:<?php echo e(round(100*($now-$time_c)/($time-$time_c))); ?>%"></div>
                                            <?php else: ?>
                                                <div class="progress-bar progress-bar-danger"
                                                     style="width: 100%"></div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <?php if($now<$time): ?>
                                        <td><span class="badge bg-green"><?php echo e(round(100*($now-$time_c)/($time-$time_c))); ?>%</span>
                                        </td>
                                    <?php else: ?>
                                        <td><span class="badge bg-red">پایان یافت</span></td>
                                    <?php endif; ?>

                                    <td>

                                        <a class="btn-danger btn" href="<?php echo e(route('specialdelete',['id'=>$special->id])); ?>">
                                            حذف
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
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
        $(document).ready(function(){
            $('#id_name').onchange(alert(11));
        });

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
    <?php echo $__env->make('admin.product.excelform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/product/specials.blade.php ENDPATH**/ ?>