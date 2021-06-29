



<div class="modal modal-info fade" id="search_user" style="height: 100%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">جستجوی کاربر</h4>
            </div>
            <form action="<?php echo e(route('admin.users.search')); ?>" enctype="multipart/form-data" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <label> نام یا نام خانوادگی کاربر:</label>
                    <input type="text" class="form-control" name="name">

                    <button class="btn btn-success" id="sub" type="submit" >جستجو</button>

                </div>

            </form>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>

                <input type="hidden" id="attrs_id" name="attrs">

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php /**PATH /home2/maximors/public_html/resources/views/admin/users/search_user_modal.blade.php ENDPATH**/ ?>