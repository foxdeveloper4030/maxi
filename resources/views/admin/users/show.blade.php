@extends('admin.layouts.main')
@section('title','مدیریت کاربران')
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    @if (session()->has('statusMsg'))
                        <div class="alert" role="alert" style="color: #155724;background-color: #d4edda;margin-top: 1%">
                            {{session()->pull('statusMsg')}}
                        </div>
                    @endif
                    <div class="box-header">
                        <h3 class="box-title">مدیریت کاربران</h3>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#search_user">
    جستجوی کاربر
    <i class="fa fa-search"></i>
</button>
                        @include('admin.users.search_user_modal')
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="text-align:center">شماره</th>
                                <th style="text-align:center">کاربر</th>
                                <th style="text-align:center">آخرین بازدید</th>
                                <th style="text-align:center">عملیات</th>
                            </tr>
                            </thead>
                            <tbody id="body_val">
                            @foreach($users as $user)
                                <tr>
                                    <td style="text-align:center">{{$user->id}}</td>
                                    <td style="text-align:center">{{$user->fullName}}</td>
                                    <td style="text-align:center">{{(new \App\Model\Date())->jdate('j_F_Y',$user->last_seen,$tr_nam='en')}}</td>
                                    <td style="text-align:center">
                                        <a class="btn btn-success"
                                           href="{{route('admin.users.showuser',['id'=>$user->id])}}">مشاهده</a>
{{--                                        <a class="btn btn-warning"--}}
{{--                                           href="{{route('admin.users.edit',['id'=>$user->id])}}">ویرایش</a>--}}
                                        <div style="display: inline-block">
                                            <a href="{{url('/')}}/admin/users/delete/{{$user->id}}"
                                               class="btn btn-danger" onclick="return confirm('آیا از حذف کاربر مورد نظر اطمینان دارید؟');">حذف</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
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
    <script>
        function ajax_id(id) {

            $(document).ready(function () {
                document.getElementById('loading').style.display = 'block';
                $.get("{{url('')}}/admin/product/ajax/" + id, function (data, status) {

                    document.getElementById('body_val').innerHTML = data;
                    document.getElementById('loading').style.display = 'none';
                });

            });
        }

        function ajax_name(name) {

            $(document).ready(function () {
                document.getElementById('loading').style.display = 'block';
                $.get("{{url('')}}/admin/product/ajax/name/" + name, function (data, status) {

                    document.getElementById('body_val').innerHTML = data;
                    document.getElementById('loading').style.display = 'none';
                });

            });
        }

    </script>
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <!--<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
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
    <script>
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

    </script>
@endsection
