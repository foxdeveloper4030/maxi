<table class="table">
    <thead>
    <tr>
        <td>تصویر</td>
        <td>افزودن به کاور</td>
        <td>حذف</td>
    </tr>
    </thead>
    <tbody>
    @foreach($product->images as $img)
       <tr>
           <td><img height="100" width="100" src="{{(new \App\PublicModel())->image_show($img)}}"></td>
           @if($img->cover!=1)
               <td><button class="btn btn-success"><i class="fa fa-plus"></i></button></td>
           @else
               <td><button class="btn btn-success">not available</button></td>
           @endif
           <td><button class="btn btn-danger"><i class="fa fa-remove"></i></button></td>
       </tr>
    @endforeach
    </tbody>
</table>
<div class="modal modal-info fade" id="modal-add-image" style="height: 100%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    افزودن تصویر
                </h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>
                <form enctype="multipart/form-data" action="{{url('admin')}}/product/add/store/AddImg/{{$product->id}}" method="post">
                    @csrf
                    <input type="file" name="image">
                    <br>
                    <label>متن جایگزین تصویر</label>
                    <input type="text" name="alt" value=" ">
                    <button class="btn btn-success" id="sub" type="submit" >اعمال تغییرات</button>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
