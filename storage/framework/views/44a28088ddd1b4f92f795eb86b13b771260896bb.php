
<?php

$public=new \App\PublicModel();
?>

<?php if($public->getType($product)==0): ?>
    <div class="box">
        <div class="box-header with-border">





            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="box box-primary">
                افزودن ویژگی یا تعداد
                <div class="box-header with-border" id="catss" style="height: 200px;overflow: scroll">
                  <div class="alert-info">محصول بدون ویژگی</div>
                    <br>
                    <form action="" method="get">
                       <?php echo csrf_field(); ?>

                        <label>تعداد:</label>
                        <input id="qvalue" type="number" value="<?php echo e($product->quantity); ?>">

                    </form>
                    <br>
                    <button  class="btn btn-success" onclick="chaneQ()">
                        refresh
                    </button>
                </div>
                <br>
                <br>
                <div class="alert alert-danger">با کلیک روی دکمه زیر نوع محصول را عوض کنید !!!!</div>
                <br>
                <br>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AttributeModal">افزودن ویژگی</button>


            </div>
            <!-- /.row -->
        </div>


        <!-- ./box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>

    <?php else: ?>

    <div class="box">
        <div class="box-header with-border">





            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="box box-primary">
                افزودن ویژگی یا تعداد
                <div class="box-header with-border" id="catss" style="height: 200px;overflow: scroll">
                    <div class="alert-info">محصول  دارای وژگی</div>
                    <br>
                    <h3>لیست ویژگی ها</h3>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AttributeModal">افزودن ویژگی</button>
                     <table class="table">
                         <thead>
                         <tr>
                             <td>شماره ویژگی</td>
                             <td>ویرایش و مشاهد</td>
                             <td>لیست خصوصیات</td>
                         </tr>
                         </thead>
                         <tbody>
                         <?php $__currentLoopData = $product->attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if(count($atr->combines)>0): ?>
                          <tr  class="alert alert-info">
                              <td>
                                  <?php echo e($atr->id); ?>

                              </td>
                              <td>
                                  <button class="btn btn-success"><i class="fa fa-eye"></i></button>
                              </td>
                              <td>
                                 <?php $__currentLoopData = $atr->combines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <span>
                                       <button  class="btn  btn-danger">
                                          <?php echo e($combine->attribute->name); ?>

                                         <span class="fa fa-remove" onclick="deleteConmbine(<?php echo e($combine->id); ?>,<?php echo e($atr->id); ?>)"></span>
                                        </button>
                                     </span>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </td>

                          </tr>
                          <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>
                     </table>

                </div>

            </div>
            <!-- /.row -->
        </div>


        <!-- ./box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>

    <script>

    </script>
<?php endif; ?>
<div id="AttributeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">افزودن ویژگی جدید</h4>
            </div>
            <div class="modal-body">
                <?php $__currentLoopData = \App\Group::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label><?php echo e($group->name); ?>:</label>
                    <select id="group<?php echo e($group->id); ?>">
                        <option value="0">ا----انتخاب  <?php echo e($group->name); ?> ----</option>
                        <?php $__currentLoopData = $group->Attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($atr->id); ?>"><?php echo e($atr->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <br>
                <br>
                <label>تعداد محصول با این مشخصات:</label>
                <input id="count" value="0" type="text" class="form-control">
                <br>
                <br>
                <label>قیمت اضاف بر محصول با این مشخصات:</label>
                <input id="price" value="0" type="text" class="form-control">
                <br>
                <br>
                <label>وزن اضاف بر محصول بر حسب گرم:</label>
                <input id="weight" value="0" type="text" class="form-control">
                <br>
                <br>
                <button onclick="addp()" class="btn btn-success">add</button>
            </div>
            <div class="modal-footer">
                <button id="closemodal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/product/ProductAttribute.blade.php ENDPATH**/ ?>