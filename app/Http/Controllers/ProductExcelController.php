<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class ProductExcelController extends Controller
{
    public function edite(Request $request){
     $rows=\Maatwebsite\Excel\Facades\Excel::toArray(new \App\Imports\UsersImport(),request()->file('excel_file'));
     for ($i=1;$i<2;$i++){
         $row=$rows[0][$i];
         $product=Product::query()->find($row[0]);
         $product->category_id=$row[8];
         $product->name=$row[1];
         $product->details=$row[2];
         $product->price_main=$row[3];
         $product->wholesale_price=$row[4];
         $product->meta_title=$row[5];
         $product->meta_keyword=$row[6];
         $product->meta_description=$row[7];
         $product->meta_description=$row[7];
         $product->slug=str_replace(' ','_',$row[1]);
         $product->save();
        // return $product;
     }


     return back();

    }
}
