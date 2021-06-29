

<tr>
    <th>شماره
    </th>
    <th>نام<
    </th>

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

        <td><button type="button" onclick="addspecial('{{$product->name}}','{{$product->id}}','{{$product->price_main}}')"  class="btn btn-success">{{$product->name}}</button></td>

    </tr>
@endforeach

 @else
    <tr>
        <td class="alert alert-danger">محصولی یافت نشد</td>
    </tr>


@endif