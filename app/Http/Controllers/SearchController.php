<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($name){
        $cats=[];
        $categories=Category::query()->orWhere('name', 'like', '%' . $name . '%');
        foreach ($categories->get() as $category){

            if ($category->parent_id==0){
                foreach ($category->childs as $child){
                    array_push($cats,$child->id);
                }
            }
            else
                array_push($cats,$category->id);
        }

        $products=Product::query()->orWhere('name', 'like', '%' . $name . '%')->orWhereIn('category_id',$cats)->Where('price_main','>',1000);


       // $products->addBinding(Product::query()->orWhere('name', 'like', '%موبایل%')->Where('price_main','>',1000));
       $count=count($products->get());

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

    public function ajax_search($q){
        $products=Product::query()->orWhere('name', 'like', '%' . $q . '%')->orWhere('title', 'like', '%' . $q . '%')->orWhere('id', 'like', '%' . $q . '%');
       $arr=[];
        return view('search',['products'=>$products->get()]);
    }
}
