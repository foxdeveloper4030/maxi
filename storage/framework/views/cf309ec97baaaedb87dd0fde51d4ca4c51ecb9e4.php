<?php $__env->startSection('title'); ?>
سفارش
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
                        <span class="info-box-text">  سفارش:<?php echo e($order->refrens); ?>  </span>
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
        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> عملیات </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody>

                            <tr>
                                <th>
                                    <label>وضعیت</label>:
                                </th>
                                <th>
                                    <?php echo (new \App\OrderModul($order))->state(); ?>

                                </th>
                                <th><?php echo e((new \App\OrderModul($order))->text()); ?></th>
                            </tr>
                            <tr>
                                <th>
                                    <label>تاریخ سفارش:</label>
                                </th>
                                <th>
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'l')); ?>&ensp;
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'d')); ?>&ensp;
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'F')); ?>&ensp;
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'V')); ?>&ensp;


                                </th>
                                <th>
                                    ساعت:
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'i')); ?>:
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'G')); ?>


                                </th>
                            </tr>
                            <tr>
                                <th>
                                    انجام عملیات
                                </th>
                                <th>
                                    <?php switch($order->state_id):
                                        case (2): ?>
                                           <a href="<?php echo e(route('admin.order.change.state',['id'=>$order->id,'state'=>4])); ?>" class="btn btn-primary">
                                               بررسی شد
                                           </a>
                                        <?php break; ?>

                                        <?php case (4): ?>
                                        <a href="<?php echo e(route('admin.order.change.state',['id'=>$order->id,'state'=>5])); ?>" class="btn btn-primary">
                                            ارسال شد
                                        </a>
                                        <?php break; ?>

                                        <?php default: ?>
                                        <div class="alert alert-danger">
                                            عملیاتی وجود ندارد.
                                        </div>
                                    <?php endswitch; ?>
                                </th>
                                <th>
                                    راهنمایی:
                                    با کلیک بروی دکمه سفارش به مرحله بعد و اگر عدم تایید کلیک شد سفارش تایید نخواهد شد.
                                    توجه شود که اگر مرسوله ارسال و یا پرداخت نشود عملیاتی وجود ندارد!
                                </th>

                            </tr>
                            <tr>
                                <th>
                                    پرداختی:
                                </th>
                                <th>
                                    <?php switch($order->state_id):
                                        case (1): ?>
                                        <div class="alert alert-danger">
                                            0 تومان
                                        </div>
                                        <?php break; ?>

                                        <?php case (3): ?>
                                        <div class="alert alert-danger">
                                            0 تومان
                                        </div>
                                        <?php break; ?>

                                        <?php default: ?>
                                        <div class="alert alert-success">
                                            <?php echo e(number_format($order->price)); ?>

                                            تومان
                                        </div>
                                    <?php endswitch; ?>

                                </th>
                            </tr>

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
            <div class="col-md-4">

            </div>
        </div>

        <!-- /.row -->

        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> سفارش </h3>

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
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> کاربر </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody>

                            <tr>
                                <th>
                                    <label>نام</label>:
                                </th>
                                <th>
                                 <a href="<?php echo e(route('admin.users.showuser',['id'=>$order->id_user])); ?>">
                                     <?php echo e(\App\User::query()->find($order->id_user)->firstname); ?>&ensp;
                                     <?php echo e(\App\User::query()->find($order->id_user)->lastname); ?>&ensp;
                                 </a>

                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>ایمیل:</label>
                                </th>
                                <th>
                                    <?php echo e(\App\User::query()->find($order->id_user)->email); ?>&ensp;

                                </th>
                            </tr>


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
            <div class="col-md-4">

            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">  اطلاعات سفارش دهنده </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody>
                             <tr>
                                 <th>نام و نام خانوادگی</th>
                                 <th><?php echo e($order->name); ?>-<?php echo e($order->lastname); ?></th>
                             </tr>
                             <tr>
                                 <th>تلفن</th>
                                 <th><?php echo e($order->tel); ?></th>
                             </tr>
                             <tr>
                                 <th>کد پستی</th>
                                 <th><?php echo e($order->postal_code); ?></th>
                             </tr>
                             <tr>
                                 <th>شهر</th>
                                 <th>فارس-شیراز</th>
                             </tr>
                             <tr>
                                 <th>آدرس</th>
                                 <th><?php echo e($order->addres); ?></th>
                             </tr>
                             <tr>
                                 <th>پیام کاربر</th>
                                 <th><?php echo e($order->message); ?></th>
                             </tr>


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
            <div class="col-md-11">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">  سبد خرید</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody>
                             <tr>
                                 <th>محصول</th>
                                 <th>تعداد</th>
                                 <th>قیمت واحد</th>
                                 <th>ویژگی</th>
                                 <th>قیمت افزوده با توجه به ویژگی</th>
                                 <th>قیمت کل</th>
                             </tr>

                             <?php $__currentLoopData = $order->carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                     <td>
                                         <a href="<?php echo e(route('products.show',['id'=>\App\Product::query()->find($cart->product_id)->id])); ?>">
                                             <?php echo e(\App\Product::query()->find($cart->product_id)->name); ?>

                                         </a>
                                     </td>

                                     <td><?php echo e($cart->count); ?></td>


                                     <td><?php echo e(\App\Product::query()->find($cart->product_id)->price_main); ?></td>

                                 <?php if($cart->attribute_id==0): ?>

                                     <td>فاقد ویژگی</td>
                                     <td>0</td>
                                         <td><?php echo e((\App\Product::query()->find($cart->product_id)->price_main)*$cart->count); ?></td>
                                 <?php else: ?>

                                         <td>
                                             <?php $__currentLoopData = (new \App\Attribute_Model($cart->attribute_id))->getAttributeValue(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php echo e($attr); ?>-
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                         </td>
                                         <td><?php echo e(\App\Product_Attribute::query()->find($cart->attribute_id)->price); ?></td>
                                         <td><?php echo e((\App\Product_Attribute::query()->find($cart->attribute_id)->price+\App\Product::query()->find($cart->product_id)->price_main)*$cart->count); ?></td>

                                 <?php endif; ?>

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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkal\resources\views/admin/order/show.blade.php ENDPATH**/ ?>