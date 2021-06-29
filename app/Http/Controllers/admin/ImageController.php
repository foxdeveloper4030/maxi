<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\Product_Image;
use App\PublicModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
   public function add_image($product_id,Request $request){
       $product=Product::query()->find($product_id);
       if (isset($request->cover))
       foreach ($product->images as $img){
           $img->cover=0;
           $img->save();
       }

       $image = new Product_Image();
       $image->id_product = $product->id;
       if (isset($request->cover))
       $image->cover = 1;

       if (isset($request->alt))
           $image->alt=$request->alt;
       $model = new PublicModel();
       $file = $request->file('image');
       $filename = time().rand(0,100000). '.' . $file->getClientOriginalExtension();
       $image->url=$filename;
       $image->save();
       $file->move((new PublicModel())->public_image_folder, $filename);
       return back();
   }
   public function delete($id){

       $imge=Product_Image::query()->find($id);

       if(file_exists((new PublicModel())->public_image_folder.$imge->url))
           unlink((new PublicModel())->public_image_folder.$imge->url);
       $imge->delete();
    return back();


   }

   public function set($id,$product){
       $p=Product::query()->find($product);
       $image=Product_Image::query()->find($id);
       foreach ($p->images as $img){
           $img->cover=0;
           $img->save();
       }
       $image->cover=1;
       $image->save();
       return back();

   }
}
