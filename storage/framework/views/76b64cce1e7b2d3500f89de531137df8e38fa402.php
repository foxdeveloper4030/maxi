<table class="table">
    <thead>
    <tr>
        <td>تصویر</td>
        <td>افزودن به کاور</td>
        <td>حذف</td>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
           <td><img height="100" width="100" src="<?php echo e((new \App\PublicModel())->image_show($img)); ?>"></td>
           <?php if($img->cover!=1): ?>
               <td><button class="btn btn-success"><i class="fa fa-plus"></i></button></td>
           <?php else: ?>
               <td><button class="btn btn-success">not available</button></td>
           <?php endif; ?>
           <td><button class="btn btn-danger"><i class="fa fa-remove"></i></button></td>
       </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="modal modal-info fade" id="modal-add-image" style="height: 100%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    افزودن تصویر
                </h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>
                <form enctype="multipart/form-data" action="<?php echo e(url('admin')); ?>/product/add/store/AddImg/<?php echo e($product->id); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="file" name="image">
                    <br>
                    <label>متن جایگزین تصویر</label>
                    <input type="text" name="alt" value=" ">
                    <button class="btn btn-success" id="sub" type="submit" >اعمال تغییرات</button>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php /**PATH /home2/maximors/public_html/resources/views/admin/product/image.blade.php ENDPATH**/ ?>