
@if(count($product->AllCategory )>0)
    <table class="table">
        <thead>
        <tr>
            <th>نام دسته</th>
            <th>حذف</th>

        </tr>
        </thead>
        <tbody >


        @foreach($product->AllCategory as $cat)

            <tr class="success">
                <td>{{$cat->category->name}}</td>
                <td><button onclick="DeleteCat({{$product->id}},{{$cat->id}})"><i class="fa fa-remove"></i></button></td>
            </tr>



        @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-danger">
        هیچ دسته بندی مرطبتی وجود ندارد
    </div>
@endif
    <br>

<h2>
    افزودن
</h2>
    <table class="table" >
        <thead>
        <tr>
            <th>نام دسته</th>
            <th>افزودن</th>

        </tr>
        </thead>
        <tbody >
          @foreach(\App\Category::all() as $cat)
              <?php $exitt=true;?>
              @foreach($product->AllCategory as $cata)
                  <?php
                  if ($cata->category_id==$cat->id){
                      $exitt=false;

                  }

                  ?>
              @endforeach
              @if($exitt)
              <tr class="success">
                  <td>{{$cat->name}}</td>
                  <td><button onclick="AddCat({{$product->id}},{{$cat->id}})"><i class="fa fa-plus"></i></button></td>
              </tr>
              @endif

          @endforeach
        </tbody>
    </table>
