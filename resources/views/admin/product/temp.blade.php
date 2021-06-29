<div class="col-md-10">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">افزودن محصول </h3>


            <!-- The actual snackbar -->


            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>


            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-group" role="form" enctype="multipart/form-data" method="post" action="{{route('products.store')}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام محصول</label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="نام محصول">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">دسته بندی پیشفرض</label>
                            <select name="category_id" type="text" class="form-control" id="exampleInputEmail1" >
                                @foreach(\App\Category::query()->where('active','=',1)->get() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">دسته های مرتبط</button>
                        <div class="form-group">
                            <label for="exampleInputEmail1">خلاصه ویژگی ها</label>


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
                             cols="80"></textarea>

                                </div>
                            </div>

                        </div>
                        <br>

                        <div class="form-group">
                            <label for="exampleInputEmail1">تعداد محصول</label>
                            <input name="quantity" type="text" class="form-control" id="exampleInputEmail1" placeholder="تعداد محصول">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">قیمت اصلی (پرداختی)</label>
                            <input name="price_main" type="text" class="form-control" id="exampleInputEmail1" placeholder="قیمت محصول">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">قیمت با مالیات (اختیاری)</label>
                            <input name="wholesale_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="قیمت با مالیات محصول">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان متا (اختیاری)</label>
                            <input name="meta_title" type="text" class="form-control" id="exampleInputEmail1" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">کلمات متا (اختیاری)</label>
                            <input name="meta_keyword" type="text" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">توضیحات متا (اختیاری)</label>
                            <input name="meta_description" type="text" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">توضیحات متا (اختیاری)</label>
                            <input name="meta_description" type="text" class="form-control" id="exampleInputEmail1" >
                        </div>




                        <div class="form-group">
                            <label for="exampleInputEmail1">عکس اصلی محصول</label>
                            <input name="image" type="file" class="form-control" id="exampleInputEmail1" >
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">نوع محصول</label>
                        <select required="required">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>

                    <input type="hidden" name="cats" id="cats_id">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">افزودن</button>
                    </div>
                </form>
            </div>
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
