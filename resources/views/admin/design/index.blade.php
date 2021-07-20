<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{url('public/admin')}}/" target="_self">
    <title>sliders | کنترل پنل</title>
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

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- customize adminlte -->
    <link rel="stylesheet" href="dist/css/customize-adminlte.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.header')
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                @foreach(\App\Slider::all() as $slider)
                <div class="col-md-12">



                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">
                                <small>اسلایدر شماره {{$slider->id}}</small>
                            </h3>
                            <!-- tools box -->

                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <form role="form" action="{{route('admin.slider.edite',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">عنوان بنر</label>
                                        <input value="{{$slider->title}}" required="required" name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="عنوان">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">ارسال عکس اسلایدر</label>
                                        <img src="{{url('')}}/{{$slider->url}}">
                                        <input name="url" required="required" type="file" id="exampleInputFile">

                                        <p class="help-block">اندازه تصویر باید با ارتفاع 350 و عرض 960 پیکسل باشد.</p>
                                    </div>
                                    @csrf
                                </div>
                                <!-- /.box-body -->



                                <div class="form-group">
                                    <label for="exampleInputFile">توضیحات اسلایدر</label>
                                    <textarea required="required" id="editor1" name="text" rows="10"
                                              cols="80">{{$slider->text}}</textarea>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                @endforeach
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

</div>

<!-- ./wrapper -->
@include('admin.layouts.errors_model')
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
</body>

</html>
