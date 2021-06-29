<?php


use App\Product;
use App\Product_Image;
use App\PublicModel;

Route::get('product/add/store/changeq/{product}/{q}',function ($product, $q){



    $product=Product::query()->find($product);
    if ($q>=0)
        $product->quantity=$q;
    $product->save();
    return view('admin.product.ProductAttribute',['product'=>$product]);
});
Route::get('product/add/store/addAttribute/{product}/{data}/{quantity}/{price}/{weight}',function ($product,$data,$quantity,$price,$weight){
    $product=\App\Product::query()->find($product);
    $data=json_decode($data);
    if (\App\PublicModel::HasAttribute($data,$product)==0)
    {
        $productAttribute=new \App\Product_Attribute();
        $productAttribute->id_product=$product->id;
        $productAttribute->quantity=$quantity;
        $productAttribute->weight=$weight;
        $productAttribute->price=$price;
        $productAttribute->save();

        foreach ($data as $item){
            $combine=new \App\Combine();
            $combine->product_attribute_id=$productAttribute->id;
            $combine->attribute_id=$item;
            $combine->save();
        }


    }
    $product=Product::query()->find($product->id);
     return view('admin.product.ProductAttribute',['product'=>$product]);
});

Route::get('product/add/store/removeAttribute/{product}/{combine}/{attribute}',function ($product,$combine,$attribute){
    $combine=\App\Combine::query()->find($combine);

    if ($combine!=null)
        $combine->delete();
    $product=Product::query()->find($product);
    $attribute=\App\Product_Attribute::query()->find($attribute);
    $array=array();

    foreach ($attribute->combines as $combine){
       array_push($array,$combine->attribute->id);
    }
    if (\App\PublicModel::HasAttribute($array,$product))
        foreach ($attribute->combines as $combine)
            $combine->delete();
    $product=Product::query()->find($product->id);

    return view('admin.product.ProductAttribute',['product'=>$product]);

});
Route::get('product/add/store/AddImg/{product}',function ($product){
    $product=Product::query()->find($product);
    return view('admin.product.DropImage',['product'=>$product]);
});
Route::post('product/add/store/AddImg/{product}/',function (\Illuminate\Http\Request $request,$product){
    $image = new Product_Image();
    $product=Product::query()->find($product);
    $image->id_product = $product->id;
    $image->cover = 0;
    $model = new PublicModel();
    $file = $request->file('image');
    $filename = time().rand(0,100000). '.' . $file->getClientOriginalExtension();
    $image->url=$filename;
    $image->alt=$request->alt;
    $image->save();
    $file->move((new PublicModel())->public_image_folder, $filename);

    session()->flash('alert', '<div class="alert alert-success">عکس جدید با موفقیت ثبت شد!</div>');
    session(['product_store_id'=>$product->id]);
    return back();
});
