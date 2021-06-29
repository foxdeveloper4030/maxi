@extends('admin.layouts.main')
@section('title')
    صفحات
@endsection
@section('css')
    <style>
        #body_val tr td {
            line-height: 27px;
        }

        /*tooltip*/
        [data-tooltip-text]:hover {
            transition: all 500ms ease;
            position: relative;
        }

        [data-tooltip-text]:hover:after {
            background-color: rgba(192, 230, 236, 0.6);
            width: auto;
            min-width: 100px;
            max-width: 300px;
            word-wrap: break-word;
            -webkit-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            -moz-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            color: #515151;
            font-size: 12px;
            content: attr(data-tooltip-text);
            margin-bottom: 5px;
            top: 10%;
            right: -55%;
            padding: 5px 12px;
            position: absolute;
            z-index: 9999;
        }

        /*end of tooltip*/
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
                        <h3 class="box-title">همه برندهای ایجاد شده</h3>
                        <img id="loading" style="display: none" src="{{url('public')}}/loading.gif">...
                        <div class="box-tools">

                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="جستجو">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" style="margin-top: 1%">

                        <table class="table table-hover">
                            <tbody id="body_val">

                            @php($counter=1)
                            @foreach($brands as $brand)
                                <tr style="text-align: center" id="brand{{$brand->id}}">
                                    <td>{{$counter}}</td>
                                    <td>{{$brand->title}}</td>
                                    <td>{{\Illuminate\Support\Str::limit($brand->siteUrl,90)}}</td>
                                    <td style="color: #001900;font-weight: bold;">{{\Illuminate\Support\Str::limit($brand->alt,20)}}</td>
                                    @if ($brand->imgUrl)
                                        <td data-toggle="modal" data-target="#brandeditModal{{$brand->id}}"
                                            style="cursor: pointer;color: #3c8dbc"><a class="btn btn-sm btn-primary"><i
                                                    class="fa fa-eye"></i></a></i>


                                        </td>
                                        <!-- Modal -->
                                        <div id="brandeditModal{{$brand->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog" id="brandeditModalBorder">
                                                <!-- Modal content-->
                                                <div class="modal-content" style="border-radius: 5px">
                                                    {{--<div class="row">--}}
                                                    {{--<div class="modal-header"--}}
                                                    {{--style="border-bottom-color: transparent">--}}
                                                    {{--<button type="button" class="close" data-dismiss="modal"--}}
                                                    {{--style="top: 4%;font-size: 40px;">&times;--}}
                                                    {{--</button>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}
                                                    <div class="modal-body">
                                                        <div class="form-account-row">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    style="position:relative;z-index: 2!important;top: 4%;font-size: 40px;">
                                                                &times;
                                                            </button>
                                                            <img style="width: 400px;height: auto;position:relative;
                                                            transform:  translate(-15%,0%);;z-index: 0!important;"
                                                                 src="{{asset($brand->imgUrl)}}"
                                                                 alt="{{$brand->title}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End OF Modal -->
                                    @else
                                        <td data-tooltip-text="فاقد تصویر"><a class="btn btn-sm btn-warning"><i
                                                    class="fa fa-eye-slash"></i></a></td>
                                    @endif
                                    <td class="deleteCompleteBrand" data-id="{{$brand->id}}"
                                        data-url="{{route('admin.brand.delete',$brand->id)}}">
                                        <a class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                @php($counter++)
                            @endforeach
                            </tbody>
                        </table>
                        {{--{{$brand->links()}}--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script type="text/javascript">

        function ajax_id(id) {

            $(document).ready(function () {
                document.getElementById('loading').style.display = 'block';
                $.get("{{url('')}}/admin/product/ajax/" + id, function (data, status) {

                    document.getElementById('body_val').innerHTML = data;
                    document.getElementById('loading').style.display = 'none';
                });

            });
        }

        {{--function ajax_name(name) {--}}

        {{--    $(document).ready(function () {--}}
        {{--        document.getElementById('loading').style.display = 'block';--}}
        {{--        $.get("{{url('')}}/admin/product/ajax/name/" + name, function (data, status) {--}}

        {{--            document.getElementById('body_val').innerHTML = data;--}}
        {{--            document.getElementById('loading').style.display = 'none';--}}
        {{--        });--}}

        {{--    });--}}
        {{--}--}}

        $(document).ready(function () {
            // $('#id_name').onchange(alert(11));

            $('#body_val').on('click', '.deleteCompleteBrand[data-id]', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {
                        // console.log(data['messageDelete']);

                        $('#brand' + data['idDelete']).remove();
                        $('.messageDelete').remove();
                        $('.box-body').parent().append('' +
                            '<div  class="alert messageDelete" role="alert" style="background-color: #d4edda;margin-top: 1%;">\n' +
                            '    <span  style="cursor: none;color: #155724" class="alert-link">' + data['messageDelete'] + '.</span >\n' +
                            '</div>');

                        // $('#completeCarts' + data.id + '').fadeOut(300, function () {
                        //     $(this).remove();
                        // });
                        //
                        // $('#countCart').text(data.totalNumberCart);
                        // $("span#cost").fadeOut(200, function () {
                        //     $(this).text(data.totalPriceCart).fadeIn();
                        // });
                        // $("#totalPriceOfProducts").fadeOut(200, function () {
                        //     $(this).text(data.totalPriceCart + 'تومان').fadeIn();
                        // });
                        // swal("موفق", "با موفقیت ثبت گردید", "success");

                    }, error: function (error) {
                        console.log('ERROR');
                        // swal("", "همه موارد را تکمیل نمایید.", "info");
                    }
                })  //  end of AJAX
            })

        });         //  end of jquery


        var attributes = [];

        // function select_attr(checkbox, id) {
        //     var arr = [];
        //     var exist = false;
        //     if (checkbox.checked) {
        //         for (var i = 0; i < attributes.length; i++) {
        //             if (id == attributes[i])
        //                 exist = true;
        //             else arr.push(attributes[i]);
        //         }
        //         if (!exist) {
        //             arr.push(id);
        //         }
        //     } else {
        //         for (var i = 0; i < attributes.length; i++) {
        //             var ex = -1;
        //             if (id != attributes[i])
        //                 arr.push(attributes[i]);
        //         }
        //
        //     }
        //     attributes = arr;
        //
        //     document.getElementById('attrs_id').value = attributes.toString();
        //     if (attributes.length > 0)
        //         document.getElementById('sub').style.display = 'block';
        //     else
        //         document.getElementById('sub').style.display = 'none';
        // }

    </script>
@endsection
