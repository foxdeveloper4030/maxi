<?php if(count($errors)>0): ?>
    <div id="errormodal" class="modal" style="display: block" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('errormodal').style.display='none'">&times;</button>
                    <h4 class="modal-title">لطفا خطا های زیر را برطرف کنید!</h4>
                </div>
                <div class="modal-body">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger"><?php echo e($error); ?></div>
                        <div class="alert alert-danger"><?php echo e($error); ?></div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php if(session()->has('alert')): ?>
    <div id="alertmodal" class="modal" style="display: block" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('alertmodal').style.display='none'">&times;</button>
                    <h4 class="modal-title">پیام سیستم</h4>
                </div>
                <div class="modal-body">
                    <?php echo session('alert'); ?>

                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\khanehkal\resources\views/admin/layouts/errors_model.blade.php ENDPATH**/ ?>