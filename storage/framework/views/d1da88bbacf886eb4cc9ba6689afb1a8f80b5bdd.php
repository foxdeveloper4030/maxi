<?php $__env->startSection('title'); ?>
    اعبار سنجی محصول
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <script>
        var cats=[];
    </script>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-danger">شما یک محصول نا تمام دارید برای اتمام یا حذف محصول روی گزینه های زیر کلیک کنید!!!</div>
                <br>
                <a href="<?php echo e(route('admin.product.add_store')); ?>" class="btn btn-success">تکمیل مراحل</a>
                <br>
                <br>
                <br>
                <a href="<?php echo e(route('admin.product.delete_store')); ?>" class="btn btn-danger">حذف محصول</a>
            </div>



        </div>


    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/product/stepValidation.blade.php ENDPATH**/ ?>