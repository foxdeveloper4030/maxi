<?php

namespace App\Http\Controllers;

use App\Product;
use App\PublicModel;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function add($product_id){

        if (!session()->has('compare'))
            session(['compare'=>array()]);
            $copmares=session('compare');
            $items=array();
        $product=Product::query()->find($product_id);
        $isset=false;
        if (count($copmares)>0)
        {
            if (PublicModel::parent(Product::query()->find($copmares[0]))->id!=PublicModel::parent(Product::query()->find($product_id))->id)
                return ['state'=>false,'count'=>count($copmares),'message'=>'no'];
        }
        if (count($copmares)>0)
        foreach ($copmares as $copmare){
            if ($copmare!=$product_id)
                array_push($items,$copmare);
            else $isset=true;
        }
        if (!$isset)
            array_push($items,$product->id);
        session(['compare'=>$items]);
        session(['count_id'=>array()]);
        $count=0;
        $count_id=array();
        foreach ($items as $item){
            if (count(Product::query()->find($item)->features)>$count){
                $count_id=Product::query()->find($item)->features;
                $count=count(Product::query()->find($item)->features);
            }
        }
        session(['count_id'=>$count_id]);
        return ['state'=>true,'count'=>count($items)];
    }
    public function show(){
        if(session()->has('compare'))
            if(count(session('compare'))>0)
        return view('layouts.compare');

            return redirect(url(''));
    }
    public function delete($product_id){
        if (!session()->has('compare'))
            session(['compare'=>array()]);
        $copmares=session('compare');
        $items=array();
        session()->remove('compare');
        $isset=false;
        foreach ($copmares as $copmare){
            if ($copmare!=$product_id)
                array_push($items,$copmare);
            else $isset=true;
        }
        session(['compare'=>$items]);
        session(['count_id'=>array()]);
        $count=0;
        $count_id=array();
        foreach ($items as $item){
            if (count(Product::query()->find($item)->features)>$count){
                $count_id=Product::query()->find($item)->features;
                $count=count(Product::query()->find($item)->features);
            }
        }

        session(['count_id'=>$count_id]);

      return back();
    }
}
