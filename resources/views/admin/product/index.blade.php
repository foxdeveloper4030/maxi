@extends('admin.layouts.main')
@section('title')
    محصولات
@endsection
@section('style_link')

@endsection
@section('css')
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

    <style>
        /* This is what we are focused on */
.table-wrapper{
  overflow-y: scroll;
  height: 500px;
}

.table-wrapper th{
    position: sticky;
    top: 0;
}

/* A bit more styling to make it look better */
.table-wrapper{
  background: CadetBlue;
}

table{
  border-collapse: collapse;
  width: 100%;
}

th{
    background: #DDD;
}

td,th{
  padding: 10px;
  text-align: center;
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
                                    <input class="on-off-toggle__input" @if($exhibition->isActive) checked @endif
                                    data-url="{{route('admin.product.exhibit')}}"
                                           type="checkbox" id="bopis"/>
                                    <label for="bopis" class="on-off-toggle__slider"></label>
                                </div>
                            </td>
                            <td style="text-align: center">
                                {{$exhibition->description}}
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
                        <img id="loading" style="display: none" src="{{url('public')}}/loading.gif">...
                        <div class="box-tools">

                        </div>
                    </div>



                    <div class="box-body table-responsive no-padding">

                        <div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>شماره</th>
                <th>نام محصول</th>
                <th>تصویر</th>
                <th>تعداد موجودی</th>
                <th>آخرین قیمت</th>
                <th>نوع</th>
                <th>مشاهده</th>
            </tr>
        </thead>
        <tbody>
           @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><img width="50" src="{{(new \App\PublicModel())->image_cover($product)}}"></td>
                                    <td>{{(new \App\PublicModel())->AllCount($product)}}</td>
                                    <td>{{number_format($product->price_main)}}</td>
                                    <td>
                                        @if(count($product->attrs)>0)
                                            محصولات با ترکیبات
                                        @else
                                            محصول بدون ترکیب
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('products.show',['id'=>$product->id])}}"
                                           class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                {{$products->render()}}
            </div>

        </div>

        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->
    </section>
    <!-- /.content -->
    @include('admin.product.excelform')
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
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

@endsection
