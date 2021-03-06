

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
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">  {{$product->name}}  </span>
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
                        <span class="info-box-text">??????????????</span>
                        <span class="info-box-number"><button class="btn btn-success">?????????? ??????????????</button></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><img src="https://image.flaticon.com/icons/svg/3014/3014802.svg"></span>

                    <div class="info-box-content">
                        <span class="info-box-text">?????????? ??????????????</span>
                        <span class="info-box-number"><a href="" class="btn btn-success">?????????? ?????????? ??????????????</a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

        </div>

        <!-- /.row -->


        <!-- /.row -->

        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> ?????????? </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#excel-edite">???????????? ???? ???????? ????????</button>
                        <a class="btn btn-primary" href="{{route('main.product.show',['slug'=>$product->slug])}}" target="_blank">???????????? ?????????? ???????? ????????</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" enctype="multipart/form-data" method="post" action="{{route('products.update',['id'=>$product->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????? ??????????</label>
                                    <input value="{{$product->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="?????? ??????????">
                                </div>

                                <!-- Trigger the modal with a button -->
                                <div class="form-group">
                                    <span class="badge badge-info">{{\App\Category::query()->find($product->category_id)->name}}</span>
                                    <label for="exampleInputEmail1">???????? ???????? ????????????</label>
                                    <select id="category_id_select" onchange="document.getElementById('category_id').value=document.getElementById('category_id_select').value"  type="text" class="form-control" id="exampleInputEmail1" >
                                        @foreach(\App\Category::query()->where('home','=',1)->get() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                        @endforeach
                                    </select>
                                    <input type="hidden" name="category_id" value="{{$product->category_id}}" id="category_id">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????????? ?????????? ????</label>


                                    <div class="box box-success">
                                        <div class="box-header">

                                            <!-- tools box -->
                                            <div class="pull-right box-tools">

                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">

                  <textarea  id="editor1" name="details" rows="10"
                             cols="80">{{$product->details}}</textarea>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">???????? ???????? (??????????????)</label>
                                    <input value="{{$product->price_main}}" name="price_main" type="text" class="form-control" id="exampleInputEmail1" placeholder="???????? ??????????">
                                </div>
                               @if(count($product->colors)<1)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">??????????</label>
                                    <input value="{{$product->quantity}}" name="quantity" type="text" class="form-control" id="exampleInputEmail1" placeholder="???????? ??????????">
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">???????? ???? ???????????? (??????????????)</label>
                                    <input value="{{$product->wholesale_price}}" name="wholesale_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="???????? ???? ???????????? ??????????">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????????? ?????? (??????????????)</label>
                                    <input value="{{$product->meta_title}}" name="meta_title" type="text" class="form-control" id="exampleInputEmail1" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????????? ?????? (??????????????)</label>
                                    <input value="{{$product->meta_keyword}}" name="meta_keyword" type="text" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????????????? ?????? (??????????????)</label>
                                    <input value="{{$product->meta_description}}" name="meta_description" type="text" class="form-control" id="exampleInputEmail1" >
                                </div>





                                <input type="hidden" name="cats" id="cats_id">


                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                            </div>
                                            <div class="modal-body" style="overflow: scroll;height: 90%">
                                                @include('admin.product.category_select')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">????????????</button>
                            </div>
                        </form>


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
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> ?????????? ???? </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->

                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            ???????????? ?? ????????????  </h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addColors">???????????? ??????</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody><tr>

                                <th>?????? ??????</th>
                                <th>??????</th>
                                <th>???????? ????????????</th>
                                <th>?????????? ?????????? ???? ?????? ?????? </th>
                                <th>????????????</th>

                            </tr>
                            @foreach($product->colors as $color)
                                <tr>
                                    <td>{{$color->color->name}}</td>
                                    <td><span style="width: 20px;height: 20px;background-color: {{$color->color->color}}">0</span></td>
                                    <td>{{$color->price}}</td>
                                    <td>{{$color->count}}</td>
                                    <td>
                                        <button type="button" onclick="setColor('{{$color->id}}','{{$color->price}}','{{$color->count}}')" class="btn btn-info" data-toggle="modal" data-target="#modal-color">????????????</button>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.product.color.delete',['id'=>$color->id])}}" class="btn btn-danger" >??????</a>
                                    </td>
                                </tr>



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

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            ???????????? ?? ????????????  </h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-w">???????????? ??????????????</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tbody><tr>

                                <th>?????? </th>
                                <th>???????? ????????????</th>
                                <th>??????</th>

                            </tr>
                            @foreach($product->warranties as $w)
                                <tr>
                                    <td>{{$w->warranty->name}}</td>

                                    <td>{{$w->price}}</td>


                                    <td>
                                        <a href="{{route('admin.product.warranty.delete',['id'=>$w->id])}}" class="btn btn-danger" >??????</a>
                                    </td>
                                </tr>



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

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            ?????????? ??????????????</h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">???????????? ??????????</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>??????????</th>

                                <th>?????? ??????????</th>
                                <th>??????????</th>
                                <th>??????</th>

                            </tr>
                            </thead>
                            <tbody>
                              <?php  $category=\App\PublicModel::parent($product);  ?>
                              @foreach($category->features as $feature)

                                        <tr>
                                            <td>{{$feature->id}}</td>


                                            <td>{{$feature->feature}}</td>
                                            <td><input type="text" id="fid{{$feature->id}}" class="form-control" value="{{\App\PublicModel::feature_value($product->id,$feature->id)}}"></td>
                                            <td>
                                                <button onclick="edite_feature('{{$product->id}}','{{$feature->id}}',document.getElementById('fid{{$feature->id}}').value)" class="btn btn-danger" >????????????</button>

                                            </td>
                                        </tr>
                              @endforeach
                            <script>
                                function edite_feature(pid,fid,value) {
                                    if(value!=" "){
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {


                                                alert('???????????? ????????');
                                            }
                                        };
                                        xhttp.open("GET", "{{route('admin.feature.add.product')}}/"+pid+"/"+fid+"/"+value, true);
                                        xhttp.send();
                                    }
                                }
                            </script>
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
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            ???????????? ??????????????</h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add-image" >???????????? ??????????</button>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>??????????</th>
                                <th>??????????</th>
                                <th>?????? ??????????????</th>
                                <th>??????</th>
                                <th>?????????? ???? ?????????? ????????</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->images as $image)

                                <tr>
                                    <td>{{$image->id}}</td>
                                    <td> <img class="img-thumbnail" height="100" width="200" src="{{(new \App\PublicModel())->image_show($image)}}"></td>
                                    <td>{{$image->alt}}</td>
                                    @if($image->cover==0)
                                    <td>
                                     <a class="btn btn-danger" href="{{route('admin.product.image.delete',['id'=>$image->id])}}">??????</a>
                                    </td>
                                        <td><a href="{{route('admin.product.image.set',['id'=>$image->id,'product'=>$product->id])}}" class="btn btn-info">????????</a></td>
                                      @else
                                        <td>????????</td>
                                        <td></td>

                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


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

    <div class="modal modal-info fade" id="modal-add-image" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        ???????????? ??????????
                    </h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">????????</button>
                    <form enctype="multipart/form-data" action="{{route('admin.product.image.add',['product_id'=>$product->id])}}" method="post">
                        @csrf
                        <label>???????????? ?????? 600*600:</label>
                        <input type="file" id="attrs_id" name="image">
                        <br>
                        <label>?????? ?????????????? ??????????</label>
                        <input type="text" name="alt" class="form-control">
                        <br>
                        <label>?????????? ???? ?????????? ????????:</label>
                        <input class="checkbox" type="checkbox" name="cover">
                        <br>
                        <button class="btn btn-success" id="sub" type="submit" >?????????? ??????????????</button>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal modal-info fade" id="addColors" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">

                    </h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.product.color.add',['id'=>$product->id])}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <label>????????:</label>
                            <input type="hidden" id="color_id" name="color_id">
                            <input type="text" id="color_price" class="form-control" name="color_price">
                            <label> ??????????:</label>
                            <input type="text" id="color_count" class="form-control" name="color_count">
                            <label> ??????:</label>
                            <select name="color" class="form-control">

                                @foreach(\App\Color::all() as $color)

                                    <option value="{{$color->id}}">{{$color->name}}</option>

                                @endforeach
                            </select>
                            <br>
                            <button class="btn btn-success" id="sub" type="submit" >?????????? ??????????????</button>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">????????</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
    <div class="modal modal-info fade" id="modal-info" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">???????????? ?????????? ?? ?????????????? ???? ??????????</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">????????</button>
                    <form action="{{route('product.add.atribute',['product'=>$product->id])}}" method="post">
                        @csrf
                        <input type="hidden" id="attrs_id" name="attrs">
                        <button class="btn btn-success" id="sub" type="submit" style="display: none">?????????? ??????????????</button>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal modal-info fade" id="modal-add" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">???????????? ?????????? ?? ?????????????? ???? ??????????</h4>
                </div>
                <form action="{{route('admin.feature.add',['product'=>$product->id])}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label>?????????? ??????????:</label>
                        <input type="text" id="id_feature_value" name="id_feature_value" class="form-control" >
                        <br>
                        <label>???????????? ??????????:</label>
                        <select name="feature_id" class="form-control">
                           @foreach(\App\Feature_Lang::all() as $f)
                               <option value="{{$f->id}}">
                                   {{$f->name}}
                               </option>
                           @endforeach
                        </select>

                        <br>
???? ???????? ?????? ?????????? ???????? ?? ?????? ???? ???????????? ?????? ?????? ???? ???????????? ????????
                        <input type="text" class="form-control" onkeyup="showFeature(this.value)">
                        <div id="feature_result" style="overflow: scroll;height: 100px;background-color: black">

                        </div>

                        <br>
                        <button style="display: none" class="btn btn-success" id="submiting" type="submit" >?????????? ??????????????</button>

                    </div>

                </form>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">????????</button>

                    <input type="hidden" id="attrs_id" name="attrs">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        function setColor(id,price,count) {
                  document.getElementById('color_id1').value=id;
                  document.getElementById('color_price').value=price;
                  document.getElementById('color_count').value=count;

        }
    </script>
    <div class="modal modal-info fade" id="modal-w" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">????????????
                    </h4>
                </div>
                <form action="{{route('admin.product.warranty.add',['product'=>$product->id])}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label>???????? ???????????? ??????????????:</label>
                        <input type="text" class="form-control" name="warranty_price">

                        <label> ???????????? ????????????:</label>
                        <select name="warranty_id" class="form-control">
                            @foreach(\App\Warranty::all() as $w)

                                <option value="{{$w->id}}">{{$w->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-success" id="sub" type="submit" >?????????? ??????????????</button>

                    </div>

                </form>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">????????</button>

                    <input type="hidden" id="attrs_id" name="attrs">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal modal-info fade" id="modal-color" style="height: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">????????????
                    </h4>
                </div>
                <form action="{{route('admin.product.color.edit',['product'=>$product->id])}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label>????????:</label>
                        <input type="hidden" id="color_id1" name="color_id">
                        <input type="text" id="color_price" class="form-control" name="color_price">
                        <label> ??????????:</label>
                        <input type="text" id="color_count" class="form-control" name="color_count">
                        <br>
                        <button class="btn btn-success" id="sub" type="submit" >?????????? ??????????????</button>

                    </div>

                </form>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">????????</button>

                    <input type="hidden" id="attrs_id" name="attrs">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




    <!-- /.modal -->
    @include('admin.product.excelform')
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script>

        function select_cat(checkbox,id) {
            var arr=[];
            var exist=false;
            if (checkbox.checked) {
                for (var i = 0; i < cats.length; i++) {
                    if (id == cats[i])
                        exist = true;
                    else arr.push(cats[i]);
                }
                if (!exist) {
                    arr.push(id);
                }
            }
            else {
                for (var i = 0; i < cats.length; i++) {
                    var ex=-1;
                    if (id != cats[i])
                        arr.push(cats[i]);
                }

            }
            cats=arr;
            var textcat="["
            document.getElementById('cats_id').value=textcat+cats.toString()+"]";


        }

    </script>
    <script src="bower_components/ckeditor/ckeditor.js"></script>

    <script>

        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    <script>
        var attributes=[];
        function select_attr(checkbox,id) {
            var arr=[];
            var exist=false;
            if (checkbox.checked) {
                for (var i = 0; i < attributes.length; i++) {
                    if (id == attributes[i])
                        exist = true;
                    else arr.push(attributes[i]);
                }
                if (!exist) {
                    arr.push(id);
                }
            }
            else {
                for (var i = 0; i < attributes.length; i++) {
                    var ex=-1;
                    if (id != attributes[i])
                        arr.push(attributes[i]);
                }

            }
            attributes=arr;

            document.getElementById('attrs_id').value=attributes.toString();
            if (attributes.length>0)
                document.getElementById('sub').style.display='block';
            else
                document.getElementById('sub').style.display='none';
        }

    </script>
    <!-- jQuery 3 -->
    {{--    --}}
    {{--    <!-- Bootstrap 3.3.7 -->--}}
    {{--    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>--}}
    {{--    <!-- FastClick -->--}}
    {{--    <script src="bower_components/fastclick/lib/fastclick.js"></script>--}}
    {{--    <!-- AdminLTE App -->--}}
    {{--    <script src="dist/js/adminlte.min.js"></script>--}}
    {{--    <!-- AdminLTE for demo purposes -->--}}

    {{--    <!-- CK Editor -->--}}
    {{--    <script src="bower_components/ckeditor/ckeditor.js"></script>--}}
    {{--    <!-- Bootstrap WYSIHTML5 -->--}}
    {{--    <!--<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->--}}
    {{--    <!-- TinyMCE Editor -->--}}

    <script>


        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor

        })
    </script>

    <script>
        function showFeature(str) {

            if (str.length == 0) {
                document.getElementById("feature_result").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("feature_result").innerHTML = this.responseText;

                    }
                };
                xmlhttp.open("GET", "{{route('admin.search.features')}}/" + str, true);
                xmlhttp.send();
            }
        }

        function setFeature(id) {
            document.getElementById('id_feature_value').value=id;
            document.getElementById('submiting').style.display='block';
        }
    </script>
@endsection
