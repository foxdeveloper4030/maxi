<?php $__env->startSection('title'); ?>
    <?php echo e($product->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                        <span class="info-box-text">  <?php echo e($product->name); ?>  </span>
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
                        <a class="btn btn-primary" href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>" target="_blank">???????????? ?????????? ???????? ????????</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('products.update',['id'=>$product->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????? ??????????</label>
                                    <input value="<?php echo e($product->name); ?>" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="?????? ??????????">
                                </div>

                                <!-- Trigger the modal with a button -->
                                <div class="form-group">
                                    <span class="badge badge-info"><?php echo e(\App\Category::query()->find($product->category_id)->name); ?></span>
                                    <label for="exampleInputEmail1">???????? ???????? ????????????</label>
                                    <select id="category_id_select" onchange="document.getElementById('category_id').value=document.getElementById('category_id_select').value"  type="text" class="form-control" id="exampleInputEmail1" >
                                        <?php $__currentLoopData = \App\Category::query()->where('home','=',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="hidden" name="category_id" value="<?php echo e($product->category_id); ?>" id="category_id">
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

                  <textarea  id="details" name="editor1" rows="10"
                             cols="80"><?php echo e($product->details); ?></textarea>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">???????? ???????? (??????????????)</label>
                                    <input value="<?php echo e($product->price_main); ?>" name="price_main" type="text" class="form-control" id="exampleInputEmail1" placeholder="???????? ??????????">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">???????? ???? ???????????? (??????????????)</label>
                                    <input value="<?php echo e($product->wholesale_price); ?>" name="wholesale_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="???????? ???? ???????????? ??????????">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????????? ?????? (??????????????)</label>
                                    <input value="<?php echo e($product->meta_title); ?>" name="meta_title" type="text" class="form-control" id="exampleInputEmail1" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????????? ?????? (??????????????)</label>
                                    <input value="<?php echo e($product->meta_keyword); ?>" name="meta_keyword" type="text" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">?????????????? ?????? (??????????????)</label>
                                    <input value="<?php echo e($product->meta_description); ?>" name="meta_description" type="text" class="form-control" id="exampleInputEmail1" >
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
                                                <?php echo $__env->make('admin.product.category_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                            <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($color->color->name); ?></td>
                                    <td><span style="width: 20px;height: 20px;background-color: <?php echo e($color->color->color); ?>">0</span></td>
                                    <td><?php echo e($color->price); ?></td>
                                    <td><?php echo e($color->count); ?></td>
                                    <td>
                                        <button type="button" onclick="setColor('<?php echo e($color->id); ?>','<?php echo e($color->price); ?>','<?php echo e($color->count); ?>')" class="btn btn-info" data-toggle="modal" data-target="#modal-color">????????????</button>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.product.color.delete',['id'=>$color->id])); ?>" class="btn btn-danger" >??????</a>
                                    </td>
                                </tr>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                            <?php $__currentLoopData = $product->warranties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($w->warranty->name); ?></td>

                                    <td><?php echo e($w->price); ?></td>


                                    <td>
                                        <a href="<?php echo e(route('admin.product.warranty.delete',['id'=>$w->id])); ?>" class="btn btn-danger" >??????</a>
                                    </td>
                                </tr>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                            <?php $__currentLoopData = $product->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td><?php echo e($feature->id); ?></td>
                                            <td><?php echo e($feature->feature); ?></td>
                                            <td><?php echo e($feature->value); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.product.feature.delete',['id'=>$feature->id])); ?>" class="btn btn-danger" >??????</a>

                                            </td>
                                        </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php $__empty_1 = true; $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-1">
                                <div class="card">
                                    <img class="img-thumbnail" height="100" width="200" src="<?php echo e((new \App\PublicModel())->image_show($image)); ?>">
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>



                        <?php endif; ?>
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
                    <form enctype="application/x-www-form-urlencoded" action="" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="file" id="attrs_id" name="image">
                        <button class="btn btn-success" id="sub" type="submit" style="display: none">?????????? ??????????????</button>

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
                    <form action="<?php echo e(route('admin.product.color.add',['id'=>$product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <label>????????:</label>
                            <input type="hidden" id="color_id" name="color_id">
                            <input type="text" id="color_price" class="form-control" name="color_price">
                            <label> ??????????:</label>
                            <input type="text" id="color_count" class="form-control" name="color_count">
                            <label> ??????:</label>
                            <select name="color" class="form-control">

                                <?php $__currentLoopData = \App\Color::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <form action="<?php echo e(route('product.add.atribute',['product'=>$product->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
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
                <form action="<?php echo e(route('admin.feature.add',['product'=>$product->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <label>?????? ??????????:</label>
                        <input class="form-control" name="name">
                        <label>?????????? ??????????:</label>
                        <input class="form-control" name="value">
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
                <form action="<?php echo e(route('admin.product.warranty.add',['product'=>$product->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <label>???????? ???????????? ??????????????:</label>
                        <input type="text" class="form-control" name="warranty_price">

                        <label> ???????????? ????????????:</label>
                        <select name="warranty_id" class="form-control">
                            <?php $__currentLoopData = \App\Warranty::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($w->id); ?>"><?php echo e($w->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <form action="<?php echo e(route('admin.product.color.edit',['product'=>$product->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
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
    <?php echo $__env->make('admin.product.excelform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    
    
    
    
    
    
    
    

    
    
    
    
    

    <script>


        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\arsi\resources\views/admin/product/show.blade.php ENDPATH**/ ?>