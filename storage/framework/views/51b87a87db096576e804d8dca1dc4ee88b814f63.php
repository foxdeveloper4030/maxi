<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo e(url('public/admin')); ?>/" target="_self">
    <title>پنل مدیریت | <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <?php echo $__env->yieldContent('style_link'); ?>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
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
    <?php echo $__env->yieldContent('css'); ?>
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
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.home')); ?>"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li class="active">پنل مدیریت</li>
            </ol>
        </section>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-left">
        <strong>Copyleft &copy;<a href="https://bornaitco.com">BORNAITCO</a> & <a
                href="https://bornaitco.com">BORNAIT COMPANY</a></strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">فعالیت ها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">تولد غلوم</h4>

                                <p>۲۴ مرداد</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">آپدیت پروفایل سجاد</h4>

                                <p>تلفن جدید (800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">نورا به خبرنامه پیوست</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">کرون جابز اجرا شد</h4>

                                <p>۵ ثانیه پیش</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">پیشرفت کارها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                ساخت پوستر های تبلیغاتی
                                <span class="label label-danger pull-left">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                آپدیت رزومه
                                <span class="label label-success pull-left">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                آپدیت لاراول
                                <span class="label label-warning pull-left">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                بخش پشتیبانی سایت
                                <span class="label label-primary pull-left">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">وضعیت</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">تنظیمات عمومی</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            گزارش کنترلر پنل
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            ثبت تمامی فعالیت های مدیران
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            ایمیل مارکتینگ
                            <input type="checkbox" class="pull-left" checked>
                        </label>
                        <p>
                            اجازه به کاربران برای ارسال ایمیل
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            در دست تعمیرات
                            <input type="checkbox" class="pull-left" checked>
                        </label>
                        <p>
                            قرار دادن سایت در حالت در دست تعمیرات
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">تنظیمات گفتگوها</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            آنلاین بودن من را نشان نده
                            <input type="checkbox" class="pull-left" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            اعلان ها
                            <input type="checkbox" class="pull-left">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            حذف تاریخته گفتگوهای من
                            <a href="javascript:void(0)" class="text-red pull-left"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<!-- Modal -->
<div id="modal-load" style="display: none" class="modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">لطفا صبر کنید!</h4>
            </div>
            <div class="modal-body">
                <img src="<?php echo e(url('public')); ?>/loader.gif">
            </div>

        </div>

    </div>
</div>


<style>
    /* The snackbar - position it at the bottom and in the middle of the screen */
    #snackbar {
        visibility: hidden; /* Hidden by default. Visible on click */
        min-width: 250px; /* Set a default minimum width */
        margin-left: -125px; /* Divide value of min-width by 2 */
        background-color: #333; /* Black background color */
        color: #fff; /* White text color */
        text-align: center; /* Centered text */
        border-radius: 2px; /* Rounded borders */
        padding: 16px; /* Padding */
        position: fixed; /* Sit on top of the screen */
        z-index: 100000; /* Add a z-index if needed */
        left: 50%; /* Center the snackbar */
        top: 100px; /* 30px from the bottom */
    }

    /* Show the snackbar when clicking on a button (class added with JavaScript) */
    #snackbar.show {
        visibility: visible; /* Show the snackbar */
        /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
        However, delay the fade out process for 2.5 seconds */
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    /* Animations to fade the snackbar in and out */
    @-webkit-keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 100px; opacity: 1;}
    }

    @keyframes  fadein {
        from {top: 0; opacity: 0;}
        to {top: 100px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {top: 100px; opacity: 1;}
        to {top: 0; opacity: 0;}
    }

    @keyframes  fadeout {
        from {top: 100px; opacity: 1;}
        to {top: 0; opacity: 0;}
    }
</style>
<div id="snackbar">Some text some message..</div>

<script>
    function  myfanc() {
        alert(44);
    }
    function Tost_show(text) {

        var x = document.getElementById("snackbar");
        x.innerHTML=text;
        x.style.background="green";
        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

    }
    function Tost_show_Red(text) {

        var x = document.getElementById("snackbar");
        x.innerHTML=text;
        x.style.background="red";
        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

    }
    function sloader_modal() {
       document.getElementById('modal-load').style.display='block';
    }
    function dloader_modal() {
       document.getElementById('modal-load').style.display='none';
    }
</script>
<!-- Modal -->
<?php echo $__env->make('admin.layouts.errors_model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script>
    function redirect(url) {
        window.location.href = url;
    }

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
<?php echo $__env->yieldContent('js'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/layouts/main.blade.php ENDPATH**/ ?>