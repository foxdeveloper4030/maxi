<?php $__env->startSection('title'); ?>
   رنگ محصولات
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        table tr th, table tr td {
            text-align: center;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background-color: rgba(34, 45, 50, 0.8);
        }

        /* Remove IE arrow */
        select::-ms-expand {
            display: none;
        }

        /* Custom Select */
        .select {
            position: relative;
            display: flex;
            width: 20em;
            height: 3em;
            line-height: 3;
            background-color: rgba(34, 45, 50, 0.8);
            overflow: hidden;
            border-radius: .25em;
        }

        select {
            flex: 1;
            padding: 0 .5em;
            color: #b8c7ce;
            cursor: pointer;
        }

        /* Arrow */
        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            left: 0;
            padding: 0 1em;
            background: #4f6a75;
            cursor: pointer;
            pointer-events: none;
            -webkit-transition: .25s all ease;
            -o-transition: .25s all ease;
            transition: .25s all ease;
        }

        /* Transition */
        .select:hover::after {
            color: #b8c7ce;
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
                        <h3 class="box-title">رنک ها</h3>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">افزودن رنگ</button>

                        <img id="loading" style="display: none" src="<?php echo e(url('public')); ?>/loading.gif">...

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">

                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th>نام رنگ</th>
                                <th>رنگ</th>
                                <th>ویرایش رنگ</th>
                                <th>ویرایش نام رنگ</th>

                            </tr>
                            </thead>
                            <tbody id="body_val">

                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($color->id); ?></td>
                                    <td><span class="label label-info"><?php echo e($color->name); ?></span></td>
                                    <td>
                                        <span class="badge" style="background-color: <?php echo e($color->color); ?>">0</span>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('admin.color.edit',['id'=>$color->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="color" name="color">&ensp;<input type="submit" class="btn btn-success btn-sm" value="ویرایش">
                                        </form>

                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('admin.color.edit',['id'=>$color->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="text" value="<?php echo e($color->name); ?>" name="name">&ensp;<input type="submit" class="btn btn-success btn-sm" value="ویرایش">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>




        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">افزودن رنگ</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo e(route('admin.color.add')); ?>">
                            <label>نام رنگ:</label>
                            <?php echo csrf_field(); ?>
                            <input type="text" class="form-control" name="name">
                            <label>مقدار رنگ:</label>
                            <input type="color" class="form-control" name="color">
                            <br>
                            <input type="submit" class="btn btn-info" value="افزودن">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\max\resources\views/admin/color/allcolors.blade.php ENDPATH**/ ?>