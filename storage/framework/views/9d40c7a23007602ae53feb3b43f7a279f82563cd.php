
<?php $__env->startSection('title'); ?>
    سفارش
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        table tr th, table tr td {
            text-align: center;
            vertical-align: middle;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background-color: #b8c7ce;
        }

        /* Remove IE arrow */
        select::-ms-expand {
            display: none;
        }

        /* Custom Select */
        .select {
            position: relative;
            display: flex;
            width: 21em;
            height: 3em;
            line-height: 3;
            background-color: rgba(34, 45, 50, 0.8);
            overflow: hidden;
            border-radius: .25em;
        }

        select {
            flex: 1;
            padding: 0 .5em;
            color: rgba(34, 45, 50, 0.8);
            cursor: pointer;
        }

        /* Arrow */
        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            left: 0;
            padding: 0 1em;
            background: #4f6a75;
            cursor: pointer;
            pointer-events: none;
            -webkit-transition: .25s all ease;
            -o-transition: .25s all ease;
            transition: .25s all ease;
        }

        /* Transition */
        .select:hover::after {
            color: #b8c7ce;
        }

        .btnSet {
            width: 60%;
            padding: 4% 5%;
        }

        .postingCodeClass {
            margin-top: 3%;
            width: 65%;
            height: 50px;
            text-align: center;
            font-size: 20px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <script>
        var cats = [];
    </script>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">سفارش:</span>
                        <span style="padding: 7% 2%; margin-top: 10%"
                              class="label label-info info-box-text"><?php echo e($order->refrens); ?></span>
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
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover table-responsive">
                            <col width="15%">
                            <col width="30%">
                            <col width="55%">
                            <tr valign="middle">
                                <th scope="row">وضعیت جاری:</th>
                                <td>
                                    <?php echo (new \App\OrderModul($order))->state(); ?>

                                </td>
                                <td style="text-align: center"><?php echo e((new \App\OrderModul($order))->text()); ?></td>
                            </tr>
                            <tr valign="middle">
                                <th scope="row">تاریخ سفارش:</th>
                                <td>
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'l')); ?>

                                    _<?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'d')); ?>

                                    _<?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'F')); ?>

                                    _<?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'y')); ?>

                                </td>
                                <td>
                                    ساعت:
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'i')); ?>:
                                    <?php echo e((new \App\Model\JalaliDate())->datetodate($order->created_at,'G')); ?>


                                </td>
                            </tr>
                            <tr height="120" valign="middle">
                                <th scope="row">انجام عملیات</th>
                                <td>
                                    <div class="select" style=" margin-bottom: 5%">
                                        <select id="" onchange="changeOrderState(this)" <?php if($order->state_id == 5): ?>
                                        disabled title="مرحله به پایان رسیده است." <?php endif; ?>
                                                onchange="window.location.href='<?php echo e(route('admin.order.index')); ?>?state='+this.value"
                                                name="state" style="text-align: center;">
                                            <?php $__currentLoopData = $stateAllOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option style="text-align: center"
                                                        <?php if($order->state_id == $a->id): ?> selected
                                                        <?php endif; ?> value="<?php echo e($a->id); ?>"><?php echo e($a->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <?php if($order->state_id != 5): ?>
                                        <a id="stateAllOrders" class="label label-default disabled">یکی از موارد را،
                                            انتخاب
                                            نمایید.</a>
                                    <?php endif; ?>
                                </td>
                                <td id="postingCodeParent">
                                    <?php if($order->state_id != 5): ?>
                                        <div class="label label-info">راهنمایی: از لیست، یکی از وضعیتها را، انتخاب
                                            نمایید و
                                            توسط دکمه ای ک ایجاد می شود، آن را به ثبت برسانید.
                                        </div>
                                    <?php endif; ?>
                                    <?php if($order->state_id == 5): ?>
                                        <div style="margin-top: 15px;" id="postingCode">
                                            کد ارسال مرسوله پستی
                                            <span style="font-size: 15px" type="text" class="label label-info"
                                            ><?php echo e($order->postUUID); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr valign="middle">
                                <th scope="row">پرداختی:</th>
                                <td colspan="2" style="font-size: 20px">
                                    <?php switch($order->state_id):
                                        case (1): ?>
                                        <div style="padding: 0.7% 6%" class="label label-danger">
                                            0 تومان
                                        </div>
                                        <?php break; ?>

                                        <?php case (3): ?>
                                        <div style="padding: 0.7% 6%" class="label label-danger">
                                            0 تومان
                                        </div>
                                        <?php break; ?>

                                        <?php default: ?>
                                        <div style="padding: 0.7% 6%" class="label label-success">
                                            <?php echo e(number_format($order->price)); ?>

                                            تومان
                                        </div>
                                    <?php endswitch; ?>
                                </td>
                            </tr>
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
            <div class="col-md-4">
            </div>
        </div>
        <!-- /.row -->
        
        
        
        
        

        
        
        
        


        
        
        
        

        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        

        
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> کاربر </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
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
                                        <?php echo e(\App\User::query()->find($order->id_user)->fullName); ?>

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
                            <tr>
                                <th>
                                    <label>موبایل:</label>
                                </th>
                                <th>
                                    <?php echo e(\App\User::query()->find($order->id_user)->mobile); ?>&ensp;
                                </th>
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
            <div class="col-md-4">

            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> اطلاعات سفارش دهنده </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
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
                            <tr>
                                <th>نوع ارسال</th>
                                <th><?php echo e(App\Cariar::find($order->post_id)->name); ?></th>
                            </tr>
                            <tr>
                                <th>هزینه ارسال</th>
                                <th><?php echo e(App\Cariar::find($order->post_id)->price); ?></th>
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
                        <h3 class="box-title"> سبد خرید</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
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


                                    <td><?php echo e(number_format($cart->price)); ?></td>

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
        function select_cat(checkbox, id) {
            var arr = [];
            var exist = false;
            if (checkbox.checked) {
                for (var i = 0; i < cats.length; i++) {
                    if (id == cats[i])
                        exist = true;
                    else arr.push(cats[i]);
                }
                if (!exist) {
                    arr.push(id);
                }
            } else {
                for (var i = 0; i < cats.length; i++) {
                    var ex = -1;
                    if (id != cats[i])
                        arr.push(cats[i]);
                }
            }
            cats = arr;
            var textcat = "["
            document.getElementById('cats_id').value = textcat + cats.toString() + "]";
        }

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

        function deleteElement(id) {
            let elem = document.getElementById("postingCode");
            if (typeof (elem) != 'undefined' && elem != null)
                elem.parentNode.removeChild(elem);
        }

        function createElement() {
            // debugger;
            let elem;
            deleteElement('postingCode');
            elem = document.getElementById("postingCode");
            if (typeof (elem) != 'undefined' && elem != null)
                return;

            let elemParent = document.getElementById('postingCodeParent');
            let newelem = document.createElement('input');
            newelem.type = "text";
            newelem.className = "postingCodeClass";
            newelem.setAttribute("placeholder", "کد ارسال مرسولات پستی");
            newelem.id = "postingCode";
            newelem.maxLength = 25
            newelem.onkeyup = function () {
                if (this.value.length == 25) {
                    console.log('shod');
                    let btn = document.getElementById('stateAllOrders');
                    btn.href = "<?php echo e(route('admin.order.change.state',['id'=>$order->id,'state'=>5])); ?>?trackPost=" + this.value;
                }
            };
            newelem.onkeypress = function (evt) {
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            };
            elemParent.appendChild(newelem);
        }

        function changeOrderState(selectElement) {
            let btn = document.getElementById('stateAllOrders');
            let valueSelected = selectElement.options[selectElement.selectedIndex].value;

            if (valueSelected == "<?php echo e($order->state_id); ?>") {
                btn.innerText = "یکی از موارد را، انتخاب نمایید.";
                btn.className = "label label-default disabled";
                if (valueSelected == 5)
                    createElement();
                else {
                    deleteElement('postingCode');
                }
            } else if (valueSelected == 2) {
                btn.innerText = "ثبت و در انتظار پردازش";
                <?php if($order->state_id != 1): ?>
                    btn.className = "btn btn-warning btnSet";
                btn.href = "<?php echo e(route('admin.order.change.state',['id'=>$order->id,'state'=>2])); ?>";
                <?php else: ?>
                    btn.className = "btn btn-warning disabled btnSet";
                <?php endif; ?>
                deleteElement('postingCode');
            } else if (valueSelected == 3) {
                btn.className = "btn btn-danger btnSet";
                btn.href = "<?php echo e(route('admin.order.change.state',['id'=>$order->id,'state'=>3])); ?>";
                btn.innerText = "عدم پرداخت";
                deleteElement('postingCode');
            } else if (valueSelected == 4) {
                // debugger;
                btn.className = "btn btn-info btnSet";
                btn.href = "<?php echo e(route('admin.order.change.state',['id'=>$order->id,'state'=>4])); ?>";
                btn.innerText = "انجام بررسی";
                deleteElement('postingCode');
            } else if (valueSelected == 5) {
                // debugger;
                btn.className = "btn btn-success btnSet";
                //  add text field
                createElement();
                btn.removeAttribute('href')
                btn.innerText = "ارسال کردن";
            } else {
                btn.className = "btn btn-link disabled";
                btn.href = "<?php echo e(route('admin.order.change.state',['id'=>$order->id,'state'=>5])); ?>";
                deleteElement('postingCode');
            }

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/admin/order/show.blade.php ENDPATH**/ ?>