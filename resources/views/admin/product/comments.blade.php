

@extends('admin.layouts.main')
@section('title')
    {{$product->name}}
@endsection

@section('content')
    <script>
        var cats=[];
    </script>
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
     Main content -->
    <section class="content">
        <!-- Info boxes -->


        <!-- /.row -->


        <!-- /.row -->

        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> نظرات برای {{$product->name}} </h3>

                    </div>
                    <!-- /.box-header -->

                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <table class="table table-hover">
                <thead>
                <th>
                    شماره نظر
                </th>
                <th>
                    کاربر
                </th>
                <th>
                    تاریخ ارسال
                </th>
                <th>
                    حذف
                </th>
                </thead>
                <tbody id="body_val">


                @foreach($comments as $comment)
                    <tr>
                        <?php  $user=\App\User::query()->find($comment->user_id)  ?>
                        <td>{{$comment->id}}</td>
                        <td><a href="{{route('admin.users.showuser',['id'=>$comment->user_id])}}">{{$user->fullName}}</a></td>
                        <td>{{$comment->created_at}}</td>
                        <td>حذف</td>

                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>



        <!-- /.row -->
    </section>

@endsection
