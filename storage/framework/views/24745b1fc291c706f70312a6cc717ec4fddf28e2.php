<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo e(url('public/admin')); ?>/" target="_self">
    <title><?php echo e($cariar->name); ?> | کنترل پنل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/rtl.css">
    <!-- babakhani datepicker -->
    <link rel="stylesheet" href="dist/css/persian-datepicker-0.4.5.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- customize adminlte -->
    <link rel="stylesheet" href="dist/css/customize-adminlte.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ویرایشگرها
                <small>افزودن روشهای ارسال مرسوله</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li><a href="#">فرم</a></li>
                <li class="active">ویرایشگر</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">

                            </h3>
                            <!-- tools box -->
                            <!--<div class="pull-right box-tools">-->
                            <!--    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"-->
                            <!--            title="Collapse">-->
                            <!--        <i class="fa fa-minus"></i></button>-->
                            <!--    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"-->
                            <!--            title="Remove">-->
                            <!--        <i class="fa fa-times"></i></button>-->
                            <!--</div>-->
                            <?php if($cariar->active==1): ?>
                                <a href="<?php echo e(route('admin.cariar.active',['id'=>$cariar->id])); ?>" class="btn btn-danger">غیر فعال کردن</a>
                               <?php else: ?>
                                <a href="<?php echo e(route('admin.cariar.active',['id'=>$cariar->id])); ?>" class="btn btn-success"> فعال کردن</a>

                        <?php endif; ?>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">

                            <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?php echo e(route('admin.cariar.edite',['id'=>$cariar->id])); ?>" method="post"  enctype="multipart/form-data">
                                <div class="box-body">
                                    <input name="citys" type="hidden">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان حامل</label>
                                        <input value="<?php echo e($cariar->name); ?>" required="required" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="عنوان">
                                    </div>
                                    <div class="form-group">
                                        <?php if($cariar->icon!=null): ?>
                                            <img src="<?php echo e($cariar->icon); ?>">
                                        <?php endif; ?>
                                        <label for="exampleInputFile">تصویر آیکن حامل اختیاری</label>
                                        <input name="icon"  type="file" id="exampleInputFile">

                                    </div>
                                    <div class="input-group"00 >


                                        <label>زمان شروع سرویس</label>

                                        <div class="input-group clockpicker" data-placement="top" data-align="left" data-donetext="تایید" >

                                            <input required="required" type="text" class="form-control" id="stop" name="time_start" value="<?php echo e($cariar->start_time); ?>:<?php echo e((new \App\Model\CariarModel($cariar->id))->time_start()); ?>">
                                            <span class="input-group-addon">
				                                    <span class="fa fa-time"></span>
			                                </span>

                                        </div>
                                        <p>به صورت 8:45 وارد کنید</p>
                                        <!-- /.input group -->


                                    </div>
                                    <div class="input-group" >


                                        <label>زمان پایان سرویس</label>

                                        <div class="input-group clockpicker" data-placement="top" data-align="left" data-donetext="تایید" >

                                            <input value="<?php echo e($cariar->end_time); ?>:<?php echo e((new \App\Model\CariarModel($cariar->id))->time_end()); ?>" required="required" type="text" class="form-control" id="stop" name="time_end" >
                                            <span class="input-group-addon">
				                                    <span class="fa fa-time"></span>
			                                </span>

                                        </div>
                                        <p>به صورت 8:45 وارد کنید</p>
                                        <!-- /.input group -->


                                    </div>
                                    <div class="input-group" >


                                        <label>هزینه سرویس</label>

                                        <div class="input-group clockpicker" data-placement="top" data-align="left" data-donetext="تایید" >

                                            <input value="<?php echo e($cariar->price); ?>" required="required" type="text" class="form-control" id="stop" name="price" >
                                            <span class="input-group-addon">
				                                    <span class="fa fa-time"></span>
			                                </span>

                                        </div>
                                        <p>تومان</p>
                                        <!-- /.input group -->


                                    </div>
                                    <div class="input-group" >


                                        <label> برای خرید های بیشتر از این هزینه سرویس رایگان شود (اختیاری)</label>

                                        <div class="input-group clockpicker" data-placement="top" data-align="left" data-donetext="تایید" >

                                            <input value="<?php echo e($cariar->free); ?>" required="required" type="text" class="form-control" id="stop" name="off" >
                                            <span class="input-group-addon">
				                                    <span class="fa fa-time"></span>
			                                </span>

                                        </div>
                                        <p>تومان</p>
                                        <!-- /.input group -->


                                    </div>
                                    <div class="input-group" >


                                        <label>حداکثر زمانی که طول میکشد تا مرسوله ارسال شود</label>

                                        <div class="input-group clockpicker" data-placement="top" data-align="left" data-donetext="تایید" >

                                            <input value="<?php echo e($cariar->time_hi); ?>" required="required" type="text" class="form-control" id="stop" name="time_hi" >
                                            <span class="input-group-addon">
				                                    <span class="fa fa-time"></span>
			                                </span>

                                        </div>
                                        <p>ساعت</p>
                                        <!-- /.input group -->


                                    </div>
                                    <div class="input-group" >


                                        <label>حداقل زمانی که طول میکشد تا مرسوله ارسال شود</label>

                                        <div class="input-group clockpicker" data-placement="top" data-align="left" data-donetext="تایید" >

                                            <input value="<?php echo e($cariar->time_low); ?>" required="required" type="text" class="form-control" id="stop" name="time_low" >
                                            <span class="input-group-addon">
				                                    <span class="fa fa-time"></span>
			                                </span>

                                        </div>
                                        <p>ساعت</p>
                                        <!-- /.input group -->


                                    </div>
                                    <div class="col-md-12">
                                        <label>
                                            شهرهایی که پوشش میدهد.
                                        </label>
                                        <?php $__currentLoopData = \App\Province::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <span class="badge">
                                             <label><?php echo e($province->name); ?></label>
                                          <input name="city<?php echo e($province->id); ?>"
                                                 <?php if(!empty(\Illuminate\Support\Facades\DB::select('SELECT * FROM `province__cariars` WHERE `province_id`='.$province->id.' AND `cariar_id`='.$cariar->id))): ?>
                                                 checked="checked"
                                                 <?php endif; ?>
                                                 type="checkbox">
                                          </span>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php echo csrf_field(); ?>
                                </div>
                                <!-- /.box-body -->


                                <div class="form-group">
                                    <label for="exampleInputFile">توضیحات </label>
                                    <textarea required="required" id="editor1" name="text" rows="10"
                                              cols="80"><?php echo e($cariar->text); ?></textarea>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">ویرایش</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

</div>
<!-- ./wrapper -->
<?php echo $__env->make('admin.layouts.errors_model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
<!-- TinyMCE Editor -->
<script src="bower_components/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#mytextarea',
        plugins: 'advlist autolink link lists preview table code pagebreak',
        menubar: false,
        language: 'fa',
        height: 300,
        relative_urls: false,
        toolbar: 'undo redo | removeformat preview code | fontsizeselect bullist numlist | alignleft aligncenter alignright alignjustify | bold italic | pagebreak table link',
    });
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- babakhani datepicker -->
<script src="dist/js/persian-date-0.1.8.min.js"></script>
<script src="dist/js/persian-datepicker-0.4.5.min.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function () {
        $('#tarikh').persianDatepicker({
            altField: '#tarikhAlt',
            altFormat: 'X',
            format: 'D MMMM YYYY HH:mm a',
            observer: true,
            timePicker: {
                enabled: true
            },
        });
    });
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>

</body>

</html><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/cariar/show.blade.php ENDPATH**/ ?>