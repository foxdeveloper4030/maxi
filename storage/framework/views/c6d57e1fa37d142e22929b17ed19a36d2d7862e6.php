<?php $__env->startSection('title'); ?>
    سفارشات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">سفارشات</h3>
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
                    <div class="box-body table-responsive no-padding">
                        <label>نوع نمایش</label>
                        <select id="" onchange="window.location.href='<?php echo e(route('admin.order.index')); ?>?state='+this.value"
                                name="state">
                            <option selected value="">موفق ها</option>
                            <option selected value="all">همه</option>
                            <?php $__currentLoopData = \App\OrderState::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($order->id); ?>"><?php echo e($order->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>شماره
                                </th>
                                <th>کاربر

                                </th>
                                <th>
                                    پرداختی
                                </th>
                                <th>
                                    وضعیت
                                </th>

                                <th>
                                    مشاهده
                                </th>

                            </tr>

                            </tbody>
                        </table>
                        <table class="table table-hover">
                            <tbody id="body_val">
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->id); ?></td>
                                    <td>
                                        <a class="btn btn-success"
                                           href="<?php echo e(route('admin.users.showuser',['id'=>$order->id_user])); ?>">
                                            <?php echo e(\App\User::query()->find($order->id_user)->firstname); ?>

                                            .<?php echo e((new \App\PublicModel())->short_string(\App\User::query()->find($order->id_user)->lastname)); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($order->price); ?></td>
                                    <td>
                                        <?php echo (new \App\OrderModul($order))->state(); ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.order.show',['id'=>$order->id])); ?>"
                                           class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($orders->links()); ?>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkal\resources\views/admin/order/allorder.blade.php ENDPATH**/ ?>