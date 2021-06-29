@extends('admin.layouts.main')
@section('title')
    سبد خرید ناتمام
@endsection
@section('css')
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
    </style>
@endsection
@section('content')
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
                        <span class="info-box-text">سبد خرید ناتمام:</span>
                        <span style="padding: 7% 2%; margin-top: 10%"
                              class="label label-info info-box-text">{{$order->refrens}}</span>
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
                            <col width="20%">
                            <col width="30%">
                            <col width="50%">
                            <tr valign="middle">
                                <th scope="row">وضعیت جاری:</th>
                                <td>
                                    {!! (new \App\OrderModul($order))->state()!!}
                                </td>
                                <td style="text-align: center">{{(new \App\OrderModul($order))->text()}}</td>
                            </tr>
                            <tr valign="middle">
                                <th scope="row">تاریخ افزودن به سبد خرید:</th>
                                <td>
                                    {{(new \App\Model\JalaliDate())->datetodate($order->created_at,'l')}}
                                    _{{(new \App\Model\JalaliDate())->datetodate($order->created_at,'d')}}
                                    _{{(new \App\Model\JalaliDate())->datetodate($order->created_at,'F')}}
                                    _{{(new \App\Model\JalaliDate())->datetodate($order->created_at,'y')}}
                                </td>
                                <td>
                                    ساعت:
                                    {{(new \App\Model\JalaliDate())->datetodate($order->created_at,'i')}}:
                                    {{(new \App\Model\JalaliDate())->datetodate($order->created_at,'G')}}

                                </td>
                            </tr>
                            <tr height="40" valign="middle">
                                <th scope="row">حذف سفارش</th>
                                <td colspan="2">
                                    <a href="{{route('admin.order.delete',$order->id)}}" style="border: 2px solid red;
                                                border-radius: 50%; padding: 5px 10px">
                                        <i style="color: darkred;font-weight: bold" class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr valign="middle">
                                <th scope="row">پرداختی:</th>
                                <td colspan="2" style="font-size: 20px">
                                    @switch($order->state_id)
                                        @case(1)
                                        <div style="padding: 0.7% 6%" class="label label-danger">
                                            0 تومان
                                        </div>
                                        @break

                                        @case(3)
                                        <div style="padding: 0.7% 6%" class="label label-danger">
                                            0 تومان
                                        </div>
                                        @break

                                        @default
                                        <div style="padding: 0.7% 6%" class="label label-success">
                                            {{number_format($order->price)}}
                                            تومان
                                        </div>
                                    @endswitch
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
                                    <a href="{{route('admin.users.showuser',['id'=>$order->id_user])}}">
                                        {{\App\User::query()->find($order->id_user)->fullName}}
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>ایمیل:</label>
                                </th>
                                <th>
                                    {{\App\User::query()->find($order->id_user)->email}}&ensp;
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>موبایل:</label>
                                </th>
                                <th>
                                    {{\App\User::query()->find($order->id_user)->mobile}}&ensp;
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
                                <th>{{$order->name}}-{{$order->lastname}}</th>
                            </tr>
                            <tr>
                                <th>تلفن</th>
                                <th>{{$order->tel}}</th>
                            </tr>
                            <tr>
                                <th>کد پستی</th>
                                <th>{{$order->postal_code}}</th>
                            </tr>
                            <tr>
                                <th>شهر</th>
                                <th>فارس-شیراز</th>
                            </tr>
                            <tr>
                                <th>آدرس</th>
                                <th>{{$order->addres}}</th>
                            </tr>
                            <tr>
                                <th>پیام کاربر</th>
                                <th>{{$order->message}}</th>
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

                            @foreach($order->carts as $cart)
                                <tr>
                                    <td>
                                        <a href="{{route('products.show',['id'=>\App\Product::query()->find($cart->product_id)->id])}}">
                                            {{\App\Product::query()->find($cart->product_id)->name}}
                                        </a>
                                    </td>

                                    <td>{{$cart->count}}</td>


                                    <td>{{number_format($cart->price)}}</td>

                                    @if($cart->attribute_id==0)

                                        <td>فاقد ویژگی</td>
                                        <td>0</td>
                                        <td>{{(\App\Product::query()->find($cart->product_id)->price_main)*$cart->count }}</td>
                                    @else

                                        <td>
                                            @foreach((new \App\Attribute_Model($cart->attribute_id))->getAttributeValue() as $attr)
                                                {{$attr}}-
                                            @endforeach

                                        </td>
                                        <td>{{\App\Product_Attribute::query()->find($cart->attribute_id)->price}}</td>
                                        <td>{{(\App\Product_Attribute::query()->find($cart->attribute_id)->price+\App\Product::query()->find($cart->product_id)->price_main)*$cart->count}}</td>

                                @endif

                            @endforeach


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
    </script>
@endsection