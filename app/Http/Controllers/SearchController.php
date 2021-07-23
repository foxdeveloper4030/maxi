<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($name){
        $products=Product::query()->orWhere('name', 'like', '%' . $name . '%')->Where('price_main','>',1000);
       $count=count(Product::query()->orWhere('name', 'like', '%' . $name . '%')->Where('price_main','>',1000)->get());
       $categories=Category::query()->orWhere('name', 'like', '%' . $name . '%');
        foreach ($categories->get() as $category){
            $products->addSelect($category->products);
        }
      if (isset($_GET['result'])){
          $products=$products->where('name','like','%'.$_GET['result'].'%');

          $count=count($products->get());

      }
      $select='off';
        if (isset($_GET['select'])){
         if ($_GET['select']=='on')
             $select='on';
        }

        return view('front.search',['select'=>$select,'products'=>$products->paginate(20),'count'=>$count,'text'=>$name]);

    }
}
