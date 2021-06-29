

<tr>
    <th>شماره
    </th>
    <th>نام
    </th>

    <th>تصویر</th>
    <th>تعداد</th>
    <th>قیمت</th>
    <th>نوع محصول</th>
    <th>مشاهده</th>
</tr>

<?php
if ($products!=null)
    if (count($products->get())>1)
        $products=$products->paginate(200);
    else
        $products=$products->get();


?>
@if($products!=null)
@foreach($products as $product)

    <tr>
        <td>{{$product->id}}</td>

        <td>{{$product->name}}</td>
        <td><img width="50" src="{{(new \App\PublicModel())->image_cover($product)}}"></td>
        <td>{{(new \App\PublicModel())->count($product)}}</td>
        <td>{{number_format($product->price_main)}}</td>
        <td>
            @if(count($product->attrs)>0)
                محصولات با ترکیبات
            @else
                محصول بدون ترکیب
            @endif
        </td>
        <td>
            <a href="{{route('products.show',['id'=>$product->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
        </td>
    </tr>
@endforeach

 @else
    <tr>
        <td class="alert alert-danger">محصولی یافت نشد</td>
    </tr>


@endif