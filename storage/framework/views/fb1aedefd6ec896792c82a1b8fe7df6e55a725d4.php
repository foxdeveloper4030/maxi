<?php $__env->startSection('title'); ?>
    محصولات
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style_link'); ?>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        .on-off-toggle {
            width: 56px;
            height: 24px;
            position: relative;
            display: inline-block;
        }

        .on-off-toggle__slider {
            width: 56px;
            height: 24px;
            display: block;
            border-radius: 34px;
            background-color: #d8d8d8;
            -webkit-transition: background-color 0.4s;
            transition: background-color 0.4s

        }

        .on-off-toggle__slider:before {
            content: '';
            display: block;
            background-color: #fff;
            box-shadow: 0 0 0 1px #949494;
            bottom: 3px;
            height: 18px;
            left: 3px;
            position: absolute;
            -webkit-transition: .4s;
            transition: .4s;
            width: 18px;
            z-index: 5;
            border-radius: 100%;
        }

        .on-off-toggle__slider:after {
            display: block;
            line-height: 24px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            content: 'off';
            color: #484848;
            padding-left: 26px;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
        }

        .on-off-toggle__input {
            /*
              This way of hiding the default input is better
              for accessibility than using display: none;
            */
            position: absolute;
            opacity: 0;
        }

        .on-off-toggle__input:checked +
        .on-off-toggle__slider {
            background-color: #1a2226
        }

        .on-off-toggle__input:checked +
        .on-off-toggle__slider:before {
            -webkit-transform: translateX(32px);
            transform: translateX(32px);
        }

        .on-off-toggle__input:checked +
        .on-off-toggle__slider:after {
            content: 'on';
            color: #FFFFFF;
            padding-right: 15px !important;
            right: 15px !important;
            margin-right: 15px !important;
        }

        .on-off-toggle label {
            margin-bottom: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <table class="table table-bordered table-hover table-responsive">
                        <col width="15%">
                        <col width="30%">
                        <col width="55%">
                        <tr valign="middle">
                            <th scope="row">ویرایش توسط فایل اکسل:</th>
                            <td colspan="2">
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#excel-edite">فایل اکسل
                                </button>
                            </td>
                        </tr>
                        <tr valign="middle">
                            <th scope="row">فعال کردن حالت نمایشگاهی:</th>
                            <td style="text-align: center">
                                <div class="on-off-toggle">
                                    <input class="on-off-toggle__input" <?php if($exhibition->isActive): ?> checked <?php endif; ?>
                                    data-url="<?php echo e(route('admin.product.exhibit')); ?>"
                                           type="checkbox" id="bopis"/>
                                    <label for="bopis" class="on-off-toggle__slider"></label>
                                </div>
                            </td>
                            <td style="text-align: center">
                                <?php echo e($exhibition->description); ?>

                            </td>
                        </tr>
                        <tr valign="middle">
                            <th scope="row">شماره:</th>
                            <td style="text-align: center">
                                <input id="id_val"
                                       style="width:90%;font-size: 1em;color: #888;padding: 0.25em;margin-top: 0.25em;"
                                       type="text">
                            </td>
                            <td style="text-align: center">
                                <input type="button" onclick="ajax_id(document.getElementById('id_val').value)"
                                       value="بگرد" class="btn btn-sm btn-success">
                            </td>
                        </tr>
                        <tr valign="middle">
                            <th scope="row">نام:</th>
                            <td style="text-align: center">
                                <input id="id_val1"
                                       style="width:90%;font-size: 1em;color: #888;padding: 0.25em;margin-top: 0.25em;"
                                       type="text">
                            </td>
                            <td style="text-align: center">
                                <input type="button" onclick="ajax_id(document.getElementById('id_val1').value)"
                                       value="بگرد" class="btn btn-sm btn-success">
                            </td>
                        </tr>
                    </table>
                    <!-- /.box-header -->
                    <div class="box-header">

                        <h3 class="box-title">همه محصولات</h3>
                        <img id="loading" style="display: none" src="<?php echo e(url('public')); ?>/loading.gif">...
                        <div class="box-tools">

                        </div>
                    </div>
                   
                        <div class="container-table100">
                            <div class="wrap-table100">



                                <div class="table100 ver3 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                            <tr class="row100 head">
                                                <th class="cell100 column1">Class nam2222e</th>
                                                <th class="cell100 column2">Type</th>
                                                <th class="cell100 column3">Hours</th>
                                                <th class="cell100 column4">Trainer</th>
                                                <th class="cell100 column5">Spots</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>

                                    <div class="table100-body js-pscroll">
                                        <table>
                                            <tbody>
                                            <tr class="row100 body">
                                                <td class="cell100 column1">Like a butterfly222</td>
                                                <td class="cell100 column2">Boxing</td>
                                                <td class="cell100 column3">9:00 AM - 11:00 AM</td>
                                                <td class="cell100 column4">Aaron Chapman</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Mind & Body</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                                <td class="cell100 column4">Adam Stewart</td>
                                                <td class="cell100 column5">15</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Crit Cardio</td>
                                                <td class="cell100 column2">Gym</td>
                                                <td class="cell100 column3">9:00 AM - 10:00 AM</td>
                                                <td class="cell100 column4">Aaron Chapman</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Wheel Pose Full Posture</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">7:00 AM - 8:30 AM</td>
                                                <td class="cell100 column4">Donna Wilson</td>
                                                <td class="cell100 column5">15</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Playful Dancer's Flow</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                                <td class="cell100 column4">Donna Wilson</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Zumba Dance</td>
                                                <td class="cell100 column2">Dance</td>
                                                <td class="cell100 column3">5:00 PM - 7:00 PM</td>
                                                <td class="cell100 column4">Donna Wilson</td>
                                                <td class="cell100 column5">20</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Cardio Blast</td>
                                                <td class="cell100 column2">Gym</td>
                                                <td class="cell100 column3">5:00 PM - 7:00 PM</td>
                                                <td class="cell100 column4">Randy Porter</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Pilates Reformer</td>
                                                <td class="cell100 column2">Gym</td>
                                                <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                                <td class="cell100 column4">Randy Porter</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Supple Spine and Shoulders</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">6:30 AM - 8:00 AM</td>
                                                <td class="cell100 column4">Randy Porter</td>
                                                <td class="cell100 column5">15</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Yoga for Divas</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">9:00 AM - 11:00 AM</td>
                                                <td class="cell100 column4">Donna Wilson</td>
                                                <td class="cell100 column5">20</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Virtual Cycle</td>
                                                <td class="cell100 column2">Gym</td>
                                                <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                                <td class="cell100 column4">Randy Porter</td>
                                                <td class="cell100 column5">20</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Like a butterfly</td>
                                                <td class="cell100 column2">Boxing</td>
                                                <td class="cell100 column3">9:00 AM - 11:00 AM</td>
                                                <td class="cell100 column4">Aaron Chapman</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Mind & Body</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                                <td class="cell100 column4">Adam Stewart</td>
                                                <td class="cell100 column5">15</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Crit Cardio</td>
                                                <td class="cell100 column2">Gym</td>
                                                <td class="cell100 column3">9:00 AM - 10:00 AM</td>
                                                <td class="cell100 column4">Aaron Chapman</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Wheel Pose Full Posture</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">7:00 AM - 8:30 AM</td>
                                                <td class="cell100 column4">Donna Wilson</td>
                                                <td class="cell100 column5">15</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Playful Dancer's Flow</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                                <td class="cell100 column4">Donna Wilson</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Zumba Dance</td>
                                                <td class="cell100 column2">Dance</td>
                                                <td class="cell100 column3">5:00 PM - 7:00 PM</td>
                                                <td class="cell100 column4">Donna Wilson</td>
                                                <td class="cell100 column5">20</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Cardio Blast</td>
                                                <td class="cell100 column2">Gym</td>
                                                <td class="cell100 column3">5:00 PM - 7:00 PM</td>
                                                <td class="cell100 column4">Randy Porter</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Pilates Reformer</td>
                                                <td class="cell100 column2">Gym</td>
                                                <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                                <td class="cell100 column4">Randy Porter</td>
                                                <td class="cell100 column5">10</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Supple Spine and Shoulders</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">6:30 AM - 8:00 AM</td>
                                                <td class="cell100 column4">Randy Porter</td>
                                                <td class="cell100 column5">15</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Yoga for Divas</td>
                                                <td class="cell100 column2">Yoga</td>
                                                <td class="cell100 column3">9:00 AM - 11:00 AM</td>
                                                <td class="cell100 column4">Donna Wilson</td>
                                                <td class="cell100 column5">20</td>
                                            </tr>

                                            <tr class="row100 body">
                                                <td class="cell100 column1">Virtual Cycle</td>
                                                <td class="cell100 column2">Gym</td>
                                                <td class="cell100 column3">8:00 AM - 9:00 AM</td>
                                                <td class="cell100 column4">Randy Porter</td>
                                                <td class="cell100 column5">20</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody id="body_val">


                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>
                                    <td><?php echo e($product->name); ?></td>
                                    <td><img width="50" src="<?php echo e((new \App\PublicModel())->image_cover($product)); ?>"></td>
                                    <td><?php echo e((new \App\PublicModel())->count($product)); ?></td>
                                    <td><?php echo e(number_format($product->price_main)); ?></td>
                                    <td>
                                        <?php if(count($product->attrs)>0): ?>
                                            محصولات با ترکیبات
                                        <?php else: ?>
                                            محصول بدون ترکیب
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('products.show',['id'=>$product->id])); ?>"
                                           class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                        <?php echo e($products->links()); ?>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>

        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->
    </section>
    <!-- /.content -->
    <?php echo $__env->make('admin.product.excelform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        function ajax_id(id) {

            $(document).ready(function () {
                document.getElementById('loading').style.display = 'block';
                $.get("<?php echo e(url('')); ?>/admin/product/ajax/" + id, function (data, status) {

                    document.getElementById('body_val').innerHTML = data;
                    document.getElementById('loading').style.display = 'none';
                });

            });
        }

        function ajax_name(name) {

            $(document).ready(function () {
                document.getElementById('loading').style.display = 'block';
                $.get("<?php echo e(url('')); ?>/admin/product/ajax/name/" + name, function (data, status) {

                    document.getElementById('body_val').innerHTML = data;
                    document.getElementById('loading').style.display = 'none';
                });

            });
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

        $("#bopis").on('change', function (e) {
            e.preventDefault();
            let value = $(this).prop('checked');
            let url = $(this).attr('data-url');
            // console.log(url + "  " + value);

            $.ajax({
                method: 'POST',
                url: url,
                headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                data: {
                    "chk": value,
                },
                success: function (data) {
                    if (data.data.success == true) {
                        if (data.data.status == true) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'حالت نمایشگاهی، فعال شد.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else if (data.data.status == false) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'حالت نمایشگاهی، غیرفعال شد.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                }
            })
        });             //  end of ajax submit
    </script>
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function(){
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function(){
                ps.update();
            })
        });


    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/product/index.blade.php ENDPATH**/ ?>