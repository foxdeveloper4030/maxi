



<div class="modal modal-info fade" id="excel-edite" style="height: 100%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">افزودن ویژگی و ترکیبات به محصول</h4>
            </div>
            <form action="<?php echo e(route('product.edite.excel')); ?>" enctype="multipart/form-data" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <label>فایل اکسل:</label>
                    <input type="file" class="form-control" name="excel_file">

                    <button class="btn btn-success" id="sub" type="submit" >اعمال تغییرات</button>

                </div>

            </form>
            <label>فایل مانند فایل زیر باشد حتما</label>
            <a class="btn btn-success" href="<?php echo e(url('public')); ?>/excel.xlsx"> دانلود فایل نمونه</a>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>

                <input type="hidden" id="attrs_id" name="attrs">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php /**PATH C:\xampp\htdocs\max\resources\views/admin/product/excelform.blade.php ENDPATH**/ ?>