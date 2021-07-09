@extends('admin.layouts.main')
@section('title')
    سفارشات
@endsection
@section('css')
    <style>
        table tr th, table tr td {
            text-align: center;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background-color: rgba(34, 45, 50, 0.8);
        }

        /* Remove IE arrow */
        select::-ms-expand {
            display: none;
        }

        /* Custom Select */
        .select {
            position: relative;
            display: flex;
            width: 20em;
            height: 3em;
            line-height: 3;
            background-color: rgba(34, 45, 50, 0.8);
            overflow: hidden;
            border-radius: .25em;
        }

        select {
            flex: 1;
            padding: 0 .5em;
            color: #b8c7ce;
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

    </style>
@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">سفارشات</h3>
                        <img id="loading" style="display: none" src="{{url('public')}}/loading.gif">...
                        <form action="{{route('admin.order.search')}}" method="post">
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 40%;">
                                    @csrf
                                    <input type="text" name="search" class="form-control pull-right"
                                           placeholder="جستجو - براساس نام و نام خانوادگی خریدار یا شماره سفارش">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <label style="margin: 1%; display: inline-block; float: right">نوع نمایش</label>
                        <div class="select" style="float: right; margin-left: 1%; margin-bottom: 1%">
                            <select id=""
                                    onchange="window.location.href='{{route('admin.order.index')}}?state='+this.value"
                                    name="state" style="margin-bottom: 1%; text-align: center;">
                                <option style="text-align: center" @if($state == '0') selected @endif value="0">همه
                                </option>
                                @foreach(\App\OrderState::all() as $order)

                                    <option style="text-align: center" @if($state == $order->id) selected
                                            @endif value="{{$order->id}}">{{$order->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th> شماره سفارش</th>
                                <th>کاربر</th>
                                <th>نام خریدار</th>
                                <th>مجموع پرداخت</th>
                                <th>تاریخ خرید</th>
                                <th>وضعیت</th>
                                <th>نوع ارسال</th>
                                <th>مشاهده</th>
                            </tr>
                            </thead>
                            <tbody id="body_val">
                            @php($counter = 0)
                            @foreach($orders as $order)
                                @php($counter++)
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td><span class="label label-info">{{$order->refrens}}</span></td>
                                    <td>
                                        <a class="btn btn-info"
                                           href="{{route('admin.users.showuser',['id'=>$order->id_user])}}">
                                            {{(new \App\PublicModel())->short_string(\App\User::find($order->id_user)->fullName)}}
                                        </a>
                                    </td>
                                    @if(auth()->user()->fullName == ($order->name." ".$order->lastname))
                                        <td>خرید توسط کاربر</td>
                                    @else
                                        <td>{{$order->name." ".$order->lastname}}</td>
                                    @endif
                                    <td>{{$order->price}}</td>
                                    <td>{{(new \App\Model\Date())->jdate('j_F_Y', $order->created_at->timestamp, $tr_nam='fa')}}</td>
                                    <td>{!! (new \App\OrderModul($order))->state() !!}</td>
                                    <td>@if(\App\Cariar::find($order->post_id)) {{\App\Cariar::find($order->post_id)->icon}} @endif</td>
                                    <td>
                                        <a href="{{route('admin.order.show',['id'=>$order->id])}}"
                                           class="btn btn-sm btn-default"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        {{$orders->links()}}
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
