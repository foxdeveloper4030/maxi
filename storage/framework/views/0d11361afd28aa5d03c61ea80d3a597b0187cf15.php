<?php $__env->startSection('title'); ?>
  تکمیل محصول
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php
    $product=\App\Product::query()->find(session('product_store_id'));

    ?>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-10">
            <div class="box">
                <div class="box-header with-border">



                        <h3 class="box-title">تکمیل فرایند افزودن محصول</h3>

                        <button class="btn btn-success" id="snk" onclick="Tost_show('<?php echo e($product->name); ?>')">نام محصول؟</button>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>

                        </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="box box-primary">
                        دسته بندی مرتبط (اختیاری)
                        <div class="box-header with-border" id="catss" style="height: 200px;overflow: scroll">
                            <?php echo $__env->make('admin.product.relationCats',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>


                <!-- ./box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer -->
            </div>

            <div id="attribute">
                <?php echo $__env->make('admin.product.ProductAttribute',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <br>
            <br>
            <div class="box">
                <div class="box-header with-border">



                    <h3 class="box-title">تصاویر محصولات</h3>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add-image" >افزودن تصویر</button>                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                   <?php echo $__env->make('admin.product.image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>


                <!-- ./box-body -->

                <!-- /.box-footer -->
            </div>


            <!-- /.box -->
        </div>

        <!-- /.col -->

    </div>

    <script>
        function DeleteCat(product,cat) {


            $(document).ready(function () {
                sloader_modal();

                $.get("<?php echo e(url('')); ?>/admin/product/add/store/removecat/" +product+'/'+cat, function (data, status) {
                  //   alert(data);
                    document.getElementById('catss').innerHTML=data;

                    Tost_show("دسته حذف شد!");
                    dloader_modal();
                });

            });
        }
        function AddCat(product,cat) {


            $(document).ready(function () {
                sloader_modal();

                $.get("<?php echo e(url('')); ?>/admin/product/add/store/addcat/" +product+'/'+cat, function (data, status) {
                  //   alert(data);
                    document.getElementById('catss').innerHTML=data;

                    Tost_show("دسته add شد!");
                    dloader_modal();
                });

            });
        }
        function chaneQ() {

              var q=document.getElementById('qvalue').value;
              var product=<?php echo e($product->id); ?>;
            $(document).ready(function () {
                sloader_modal();

                $.get("<?php echo e(url('')); ?>/admin/product/add/store/changeq/" +product+'/'+q, function (data, status) {
                  //   alert(data);
                    document.getElementById('attribute').innerHTML=data;

                    Tost_show("refreshing successful!");
                    dloader_modal();
                });

            });
        }
        function addp() {
            let countgroup=<?php echo e(count(\App\Group::all())); ?>;
            let countselect=0;
            let element1=new Array();
            let element=new Array();
            let price=document.getElementById("price").value;
            let quantity=document.getElementById("count").value;
            let weight=document.getElementById("weight").value;
            <?php $__currentLoopData = \App\Group::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            element.push(document.getElementById("group"+"<?php echo e($group->id); ?>").value);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            for (var i = 0; i <element.length ; i++) {
                if (element[i]!=0)
                {
                    element1.push(element[i]);
                    countselect++;
                }

            }
            if (countselect==0&&price>=0&&quantity>=0&&weight>=0)
                Tost_show("هیچ دسته ای انتخاب نشد");
            else{
                sloader_modal();

                $.get("<?php echo e(url('')); ?>/admin/product/add/store/addAttribute/<?php echo e($product->id); ?>/["+element1.toString()+"]/"+quantity+"/"+price+"/"+weight, function (data, status) {

                    document.getElementById('attribute').innerHTML=data;
                    Tost_show("ویژگی اضافه شد");
                    dloader_modal();
                });
            }
            document.getElementById("closemodal").click();
        }

        function deleteConmbine(combine,attribute) {

            sloader_modal();

            $.get("<?php echo e(url('')); ?>/admin/product/add/store/removeAttribute/<?php echo e($product->id); ?>/"+combine+"/"+attribute, function (data, status) {
                //   alert(data);
                document.getElementById('attribute').innerHTML=data;

                Tost_show("ویژگی حدف شد");
                dloader_modal();
            });




        }


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\arsi\resources\views/admin/product/multi-selection.blade.php ENDPATH**/ ?>