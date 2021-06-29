

<?php $__currentLoopData = $fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div  style="background-color: #030841;padding: 5px;cursor: pointer" onclick="setFeature('<?php echo e($f->id); ?>')">
        <?php echo e($f->value); ?>

    </div>
    <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home2/maximors/public_html/resources/views/front/select_feature.blade.php ENDPATH**/ ?>