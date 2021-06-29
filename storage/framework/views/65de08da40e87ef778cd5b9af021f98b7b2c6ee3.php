<?php $__env->startSection('title'); ?>
    صفحات
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        #body_val tr td {
            line-height: 27px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">همه صفحات ایجاد شده</h3>
                        <img id="loading" style="display: none" src="<?php echo e(url('public')); ?>/loading.gif">...
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="جستجو">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" style="margin-top: 1%">

                        <table class="table table-hover">
                            <tbody id="body_val">

                            <?php ($counter=1); ?>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="text-align: center">
                                    <td><?php echo e($counter); ?></td>
                                    <td><?php echo e($page->title); ?></td>
                                    <td><?php echo e(\Illuminate\Support\Str::limit($page->body,90)); ?></td>
                                    <td style="color: #001900;font-weight: bold;"><?php echo e(\Illuminate\Support\Str::limit($page->locationName,20)); ?></td>
                                    <?php if($page->imgUrl): ?>
                                        <td data-toggle="modal" data-target="#pageeditModal<?php echo e($page->id); ?>"
                                            style="cursor: pointer;color: #3c8dbc">عکس
                                        </td>
                                        <!-- Modal -->
                                        <div id="pageeditModal<?php echo e($page->id); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog" id="pageeditModalBorder">
                                                <!-- Modal content-->
                                                <div class="modal-content" style="border-radius: 5px">
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-account-row">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    style="position:relative;z-index: 2!important;top: 4%;font-size: 40px;">
                                                                &times;
                                                            </button>
                                                            <img style="width: 550px;height: auto;position:relative;
                                                            transform: translate(-1%,-7%);z-index: 0!important;"
                                                                 src="<?php echo e(asset($page->imgUrl)); ?>" alt="<?php echo e($page->title); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End OF Modal -->
                                    <?php else: ?>
                                        <td>فاقد عکس</td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(route('pages.pageCreate',$page->title)); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php ($counter++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <script>

        function ajax_id(id) {

            $(document).ready(function () {
                document.getElementById('loading').style.display = 'block';
                $.get("<?php echo e(url('')); ?>/admin/product/ajax/" + id, function (data, status) {

                    document.getElementById('body_val').innerHTML = data;
                    document.getElementById('loading').style.display = 'none';
                });

            });
        }

        function ajax_name(name) {

            $(document).ready(function () {
                document.getElementById('loading').style.display = 'block';
                $.get("<?php echo e(url('')); ?>/admin/product/ajax/name/" + name, function (data, status) {

                    document.getElementById('body_val').innerHTML = data;
                    document.getElementById('loading').style.display = 'none';
                });

            });
        }

        $(document).ready(function () {
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
        var attributes = [];

        function select_attr(checkbox, id) {
            var arr = [];
            var exist = false;
            if (checkbox.checked) {
                for (var i = 0; i < attributes.length; i++) {
                    if (id == attributes[i])
                        exist = true;
                    else arr.push(attributes[i]);
                }
                if (!exist) {
                    arr.push(id);
                }
            } else {
                for (var i = 0; i < attributes.length; i++) {
                    var ex = -1;
                    if (id != attributes[i])
                        arr.push(attributes[i]);
                }

            }
            attributes = arr;

            document.getElementById('attrs_id').value = attributes.toString();
            if (attributes.length > 0)
                document.getElementById('sub').style.display = 'block';
            else
                document.getElementById('sub').style.display = 'none';
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\max\resources\views/admin/page/index.blade.php ENDPATH**/ ?>