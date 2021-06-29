<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo e(url('public/admin')); ?>/" target="_self">
    <title> پنل مدیریت | <?php echo e(\App\PublicModel::EnappName()); ?> </title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <base href="<?php echo e(url('public')); ?>" target="_self">
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/rtl.css">
    <!-- persian Date Picker -->
    <link rel="stylesheet" href="dist/css/persian-datepicker-0.4.5.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- customize adminlte -->
    <link rel="stylesheet" href="dist/css/customize-adminlte.css">
    <style>
        /*for tooltip*/

        /* Add this attribute to the element that needs a tooltip */
        [data-tooltip] {
            position: relative;
            z-index: 2;
            cursor: pointer;
        }

        /* Hide the tooltip content by default */
        [data-tooltip]:before,
        [data-tooltip]:after {
            visibility: hidden;
            opacity: 0;
            pointer-events: none;
        }

        /* Position tooltip above the element */
        [data-tooltip]:before {
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-bottom: 5px;
            margin-left: -80px;
            padding: 7px;
            width: 160px;
            border-radius: 3px;
            background-color: rgba(192, 230, 236, 0.6);
            color: #071380;
            content: attr(data-tooltip);
            text-align: center;
            font-size: 14px;
            line-height: 1.2;
        }

        /* Triangle */
        [data-tooltip]:after {
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-left: -5px;
            width: 0;
            border-top: 5px solid rgba(0, 0, 0, 0.5);
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;
            content: '';
            font-size: 0;
            line-height: 0;
        }

        /* Show tooltip content on hover */
        [data-tooltip]:hover:before,
        [data-tooltip]:hover:after {
            visibility: visible;
            opacity: 1;
        }


        [data-tooltip-text]:hover {
            transition: all 500ms ease;
            position: relative;
        }

        [data-tooltip-text]:hover:after {
            background-color: rgba(192, 230, 236, 0.6);
            width: auto;
            min-width: 150px;
            max-width: 300px;
            word-wrap: break-word;
            -webkit-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            -moz-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            color: #515151;
            font-size: 12px;
            content: attr(data-tooltip-text);
            margin-bottom: 5px;
            top: 130%;
            left: 0;
            padding: 5px 12px;
            position: absolute;
            z-index: 9999;
        }


        /*end of tooltip*/


        /*all col row page*/

        #all-cols-rows {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-around;
            align-items: stretch;
            text-align: center !important;
        }

        .editCol {
            flex-basis: 30%;
            border: 2px solid #37bbd0;
            border-radius: 5px;
            text-align: center !important;
            padding: 1% 4%;

            /*=======*/
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: center;
        }

        .colEditRow {
            /*flex-basis: 28%;*/
            padding: 5% 5%;
            margin-top: 4%;
            margin-bottom: 7%;
            border-radius: 5px;
            background-color: #d1ecf1;
            border: 1px dashed #7d93a5;
        }

        .editCol > div:first-child {
            padding: 5% 25%;
            margin-bottom: 7%;
            background-color: #00bfd6;
            border-radius: 5px;
            color: #ffffff;
        }

        /*===========================================*/

        .input-group {
            width: 50%;
            margin: 0 auto;
            border-radius: 0 !important;
        }

        .top-group {
            border-radius: 0 !important;
        }

        .bottom-group {
            margin-top: -1px;
            border-radius: 0 !important;
        }

        /*[data-type="minus"] {
          border: 1px solid #ccc;
        }*/

        [data-type="save"] {
            /*min-width: 70px;    */
            border-radius: 0 !important;
        }

        .input-number {
            width: 50px !important;
            height: 30px !important;
            text-align: center;
            text-shadow: none;
            border-radius: 0 !important;
        }

        .btn-number {
            width: 40px !important;
            height: 30px !important;
            border-radius: 0 !important;
            text-align: center !important;
        }

        /*end of all col row page*/
    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                پنل مدیریت
                <small>کنترل پنل</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li class="active">داشبورد</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">


                            <h3><?php
                                $weekorder = \App\Order::query()->orWhere('created_at', '>', (new \Carbon\Carbon())->week(-1)->format('Y-m-d H:M:S'))->where('state_id', '!=', 1)
                                    ->where('state_id', '!=', 3)->get();
                                ?><?php echo e(count($weekorder)); ?></h3>

                            <p>سفارش جدید</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('admin.order.index')); ?>" class="small-box-footer">اطلاعات بیشتر <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo e(request()->ip()); ?><sup style="font-size: 20px"></sup></h3>

                            <p>IP شما</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-settings"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php  $weekuser = \App\User::query()->orWhere('created_at', '>', (new \Carbon\Carbon())->week(-1)->format('Y-m-d H:M:S'))->get();
                                ?><?php echo e(count($weekuser)); ?> </h3>

                            <p>کاربران ثبت شده</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h4><?php
                                $priceweek = 0;
                                $index = 1;
                                foreach ($weekorder as $item) {
                                    $priceweek += $item->price;
                                    $index++;
                                }
                                ?><?php echo e(number_format(round($priceweek)/$index)); ?>

                                تومان
                            </h4>

                            <p>میانگین فروش هفته جاری</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo e(route('admin.order.index')); ?>" class="small-box-footer">اطلاعات بیشتر <i
                                class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="box">

                        <div class="box-header">
                            <h3 class="box-title"> طرح های شگفت انگیز</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>نام محصول</th>
                                    <th>پیشرفت</th>
                                    <th style="width: 40px">زمان باقی مانده</th>
                                    <th>
                                        مشاهده
                                    </th>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">سفارشات اخیر</h3>
                            <img id="loading" style="display: none" src="<?php echo e(url('public')); ?>/loading.gif">...
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right"
                                           placeholder="جستجو">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره
                                    </th>
                                    <th>کاربر

                                    </th>
                                    <th>
                                        پرداختی
                                    </th>
                                    <th>
                                        وضعیت
                                    </th>

                                    <th>
                                        مشاهده
                                    </th>

                                </tr>

                                </tbody>
                            </table>
                            <table class="table table-hover">
                                <tbody id="body_val">

                                <?php $__currentLoopData = $weekorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($order->id); ?></td>
                                        <td><?php echo e(\App\User::query()->find($order->id_user)->firstname); ?>

                                            .<?php echo e((new \App\PublicModel())->short_string(\App\User::query()->find($order->id_user)->lastname)); ?></td>
                                        <td><?php echo e($order->price); ?></td>

                                        <td>
                                            <a href="<?php echo e(route('admin.order.show',['id'=>$order->id])); ?>"
                                               class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <script>

                        function ajax_id(id) {

                            $(document).ready(function () {
                                document.getElementById('loading').style.display = 'block';
                                $.get("<?php echo e(url('')); ?>product/ajax/" + id, function (data, status) {

                                    document.getElementById('body_val').innerHTML = data;
                                    document.getElementById('loading').style.display = 'none';
                                });
                            });
                        }

                        function ajax_name(name) {

                            $(document).ready(function () {
                                document.getElementById('loading').style.display = 'block';
                                $.get("<?php echo e(url('')); ?>product/ajax/name/" + name, function (data, status) {

                                    document.getElementById('body_val').innerHTML = data;
                                    document.getElementById('loading').style.display = 'none';
                                });

                            });
                        }

                    </script>
                </div>
            </div>


        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">


    function createViewAllRowAndColOfPages(cols) {
        let numbersWord = [
            'یک', 'دو', 'سه', 'چهار', 'پنج',
            'شش', 'هفت', 'هشت', 'نه',
        ];
        $('#all-cols-rows').children().remove();

        for (let col = 0; col < cols.length; col++) {
            if (Object.keys(cols[col]).length != 0) {   //  col is Exists


                let appendRows = ' <div class="editCol" id="editCol' + col + '">\n' +
                    '<div>ستون ' + numbersWord[col] + '</div>';
                for (let row = 0; row < Object.keys(cols[col]).length; row++) {
                    appendRows +=
                        '<div class="colEditRow" id="col' + col + 'EditRow' + row + '" title="' + cols[col][row]['title'] + '" data-tooltip="' + cols[col][row]['title'] + '">\n' +
                        '    <div class="input-group top-group">\n' +
                        '          <span class="input-group-btn">\n' +
                        '                <button type="button" data-col="' + (col + 1) + '" data-row="' + (row + 1) + '"\n' +
                        '                        class="btn btn-default btn-number" data-url="<?php echo e(url('admin/page/delete/')); ?>"\n' +
                        '                        data-type="bin" data-page="' + cols[col][row]['title'] + '">\n' +
                        '                    <i class="fa fa-trash" style="margin-right: -3px;"></i>\n' +
                        '                </button>\n' +
                        '           </span>\n' +
                        '        <input type="text" name="col' + col + 'EditRow' + cols[col][row]['row'] + 'col"\n' +
                        '               class="form-control input-number"\n' +
                        '               min="1" max="9" value="' + (col + 1) + '"\n' +
                        '               title="ستون" id="idColRow' + (col + 1) + (row + 1) + '" \n' +
                        '               style="color:#00bfd6;background-color: #e0f8fd">\n' +
                        '        <span class="input-group-btn">\n' +
                        '                <button type="button" data-col="' + (col + 1) + '" data-row="' + (row + 1) + '"\n' +
                        '                        class="btn btn-default btn-number" id="save' + (col + 1) + (row + 1) + '"\n' +
                        '                        data-type="save" data-page="' + cols[col][row]['title'] + '"\n' +
                        '                        data-field="quant[1]" data-inputColNew="idColRow' + (col + 1) + (row + 1) + '" data-inputRowNew="idRowCol' + (col + 1) + (row + 1) + '" data-url="<?php echo e(url('admin/page/update')); ?>">\n' +
                        '                    <i class="fa fa-save" style="margin-right: -3px;"></i>\n' +
                        '                </button>\n' +
                        '            </span>\n' +
                        '    </div>\n' +
                        '    <div class="input-group bottom-group">\n' +
                        '            <span class="input-group-btn">\n' +
                        '                <button type="button" data-id="' + col + row + '"\n' +
                        '                        class="btn btn-default btn-number addSubtract"\n' +
                        '                        data-type="minus"\n' +
                        '                        data-field="col' + (col + 1) + 'EditRow' + (row + 1) + 'Row">\n' +
                        '                    <i class="fa fa-minus" style="margin-right: -3px;"></i>\n' +
                        '                </button>\n' +
                        '            </span>\n' +
                        '        <input type="text" id="idRowCol' + (col + 1) + (row + 1) + '" name="col' + (col + 1) + 'EditRow' + (row + 1) + 'Row"\n' +
                        '               class="form-control input-number"\n' +
                        '               min="1" max="9" value="' + cols[col][row]['row'] + '"\n' +
                        '               title="سطر">\n' +
                        '        <span class="input-group-btn"\n' +
                        '              style="text-align: center">\n' +
                        '                <button type="button"\n data-id="' + col + row + '"' +
                        '                        class="btn btn-default btn-number addSubtract"\n' +
                        '                        data-type="plus"\n' +
                        '                        data-field="col' + (col + 1) + 'EditRow' + (row + 1) + 'Row">\n' +
                        '                    <i class="fa fa-plus" style="margin-right: -3px;"></i>\n' +
                        '                </button>\n' +
                        '            </span>\n' +
                        '    </div>\n' +
                        '</div>'
                }
                appendRows += '</div>';
                $('#all-cols-rows').append(appendRows);
            } else {
                $('#all-cols-rows')
                    .append('<div class="editCol" id="editCol' + col + '">\n' +
                        '<div>فاقد سطر</div>\n' +
                        '</div>');
            }
        }
    }


    $(document).ready(function () {

        $('.get-all-col-row').on('click', function (e) {
            e.preventDefault();
            let url_ = $(this).attr('data-url');
            console.log(url_);
            // console.log(url_);
            $.ajax({
                type: "GET",
                url: url_,
                success: function (data) {

                    let cols = [data['col11'], data['col22'], data['col33']];
                    createViewAllRowAndColOfPages(cols);


                }, error: function (error) {
                    console.log('ERROR 1');
                }
            });
        });             //  end of get-all-col-row class

        /*all col row page*/

        $('#all-cols-rows').on('click', '.addSubtract[data-id]', function (e) {
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('#all-cols-rows').on('focusin', '.input-number[name]', function () {
            $(this).data('oldValue', $(this).val());
            let name = $(this).attr('name');
            console.log(name);
        });

        $('#all-cols-rows').on('change', '.input-number[name]', function () {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            let name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire('به کمترین مقدار رسیده اید!');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire('به بیشترین مقدار رسیده اید!');
                $(this).val($(this).data('oldValue'));
            }


        });

        $("#all-cols-rows").on('click', '.btn-number[data-type="bin"]', function (e) {
            // این پیج باید حذف گردد و پیج های جدید، دوباره از همین ایجکس ریترن شوند

            let titlePage = $(this).attr('data-page');
            let url_ = $(this).attr('data-url');
            let col = $(this).attr('data-col');
            let row = $(this).attr('data-row');

            let urlMe = url_ + '/' + titlePage + '/' + col + '/' + row;

            console.log(col, row, titlePage, urlMe);

            $.ajax({
                type: "GET",
                url: urlMe,
                success: function (data) {
                    // console.table(data);
                    let cols = [data['col11'], data['col22'], data['col33']];
                    createViewAllRowAndColOfPages(cols);
                }, error: function (error) {
                    console.log('ERROR 1');
                }
            });
        });

        $("#all-cols-rows").on('click', '.btn-number[data-type="save"]', function (e) {

            let titlePage = $(this).attr('data-page');
            let url_ = $(this).attr('data-url');
            let col = $(this).attr('data-col');
            let row = $(this).attr('data-row');

            let row_id_new_in_input = $(this).attr('data-inputRowNew');
            let row_new = $('#' + row_id_new_in_input).val();

            let col_id_new_in_input = $(this).attr('data-inputColNew');
            let col_new = $('#' + col_id_new_in_input).val();

            let urlMe = url_ + '/' + titlePage + '/' + col + '/' + row + '/' + col_new + '/' + row_new;

            console.log(col, row, row, titlePage, col_new);

            if (row == row_new && col == col_new) {
                Swal.fire('مقدار سطر یا ستون را، تغییر بدهید!');
                return;
            }

            if (col_new > 3) {
                Swal.fire('حداکثر مقدار ستون، 3 می‌تواند باشد!');
                $('#' + col_id_new_in_input).val(col);  //  قرار گرفتن مقدار قبلی در input مربوط به ستون
                return;
            }

            $.ajax({
                type: "GET",
                url: urlMe,
                success: function (data) {
                    // console.table(data);
                    let cols = [data['col11'], data['col22'], data['col33']];
                    let elementNewIdAlert = data['elementNewIdAlert'];
                    let elementOldIdAlert = data['elementOldIdAlert'];

                    createViewAllRowAndColOfPages(cols);

                    if (data['errRow'] == true) {
                        Swal.fire('مقدار سطر وارد شده، اشتباه می باشد!');
                        return;
                    }

                    if (data['exceedsLimitRow'] == true) {
                        Swal.fire('حداکثر مقدار سطر، ' + data['numberOfMaxRow'] + ' می‌تواند باشد!');
                        return;
                    }

                    $('#' + elementNewIdAlert).css({
                        'color': '#00a65a',
                        'font-weight': 'bolder',
                    });
                    $('#' + elementOldIdAlert).css({
                        'color': '#808080c7',
                        'font-weight': 'bolder',
                    });


                }, error: function (error) {
                    console.log('ERROR 1');
                }
            });
        });

        /*end of all col row page*/

    });                 //  end of jquery

</script>
</body>
</html>
<?php /**PATH /home2/maximors/public_html/resources/views/admin/home.blade.php ENDPATH**/ ?>