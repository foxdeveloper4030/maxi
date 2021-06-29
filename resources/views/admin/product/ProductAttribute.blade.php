
<?php

$public=new \App\PublicModel();
?>

@if($public->getType($product)==0)
    <div class="box">
        <div class="box-header with-border">





            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="box box-primary">
                افزودن ویژگی یا تعداد
                <div class="box-header with-border" id="catss" style="height: 200px;overflow: scroll">
                  <div class="alert-info">محصول بدون ویژگی</div>
                    <br>
                    <form action="" method="get">
                       @csrf

                        <label>تعداد:</label>
                        <input id="qvalue" type="number" value="{{$product->quantity}}">

                    </form>
                    <br>
                    <button  class="btn btn-success" onclick="chaneQ()">
                        refresh
                    </button>
                </div>
                <br>
                <br>
                <div class="alert alert-danger">با کلیک روی دکمه زیر نوع محصول را عوض کنید !!!!</div>
                <br>
                <br>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AttributeModal">افزودن ویژگی</button>


            </div>
            <!-- /.row -->
        </div>


        <!-- ./box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>

    @else

    <div class="box">
        <div class="box-header with-border">





            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="box box-primary">
                افزودن ویژگی یا تعداد
                <div class="box-header with-border" id="catss" style="height: 200px;overflow: scroll">
                    <div class="alert-info">محصول  دارای وژگی</div>
                    <br>
                    <h3>لیست ویژگی ها</h3>
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AttributeModal">افزودن ویژگی</button>
                     <table class="table">
                         <thead>
                         <tr>
                             <td>شماره ویژگی</td>
                             <td>ویرایش و مشاهد</td>
                             <td>لیست خصوصیات</td>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($product->attrs as $atr)
                          @if(count($atr->combines)>0)
                          <tr  class="alert alert-info">
                              <td>
                                  {{$atr->id}}
                              </td>
                              <td>
                                  <button class="btn btn-success"><i class="fa fa-eye"></i></button>
                              </td>
                              <td>
                                 @foreach($atr->combines as $combine)
                                     <span>
                                       <button  class="btn  btn-danger">
                                          {{$combine->attribute->name}}
                                         <span class="fa fa-remove" onclick="deleteConmbine({{$combine->id}},{{$atr->id}})"></span>
                                        </button>
                                     </span>
                                 @endforeach
                              </td>

                          </tr>
                          @endif
                          @endforeach
                         </tbody>
                     </table>

                </div>

            </div>
            <!-- /.row -->
        </div>


        <!-- ./box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->
    </div>

    <script>

    </script>
@endif
<div id="AttributeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">افزودن ویژگی جدید</h4>
            </div>
            <div class="modal-body">
                @foreach(\App\Group::all() as $group)
                    <label>{{$group->name}}:</label>
                    <select id="group{{$group->id}}">
                        <option value="0">ا----انتخاب  {{$group->name}} ----</option>
                        @foreach($group->Attributes as $atr)
                            <option value="{{$atr->id}}">{{$atr->name}}</option>
                        @endforeach
                    </select>


                @endforeach

                <br>
                <br>
                <label>تعداد محصول با این مشخصات:</label>
                <input id="count" value="0" type="text" class="form-control">
                <br>
                <br>
                <label>قیمت اضاف بر محصول با این مشخصات:</label>
                <input id="price" value="0" type="text" class="form-control">
                <br>
                <br>
                <label>وزن اضاف بر محصول بر حسب گرم:</label>
                <input id="weight" value="0" type="text" class="form-control">
                <br>
                <br>
                <button onclick="addp()" class="btn btn-success">add</button>
            </div>
            <div class="modal-footer">
                <button id="closemodal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


