<?php

namespace App\Http\Controllers\admin;

use App\Count;
use App\Product_Attribute;
use App\Product_Attribute_Combination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AtributeController extends Controller
{
    public function edite($attr,$price,$quantity,$default){

        $attribute=Product_Attribute::query()->find($attr);
        $attributes=Product_Attribute::query()->where('id_product','=',$attribute->id_product)->get();
        if ($default==1)
           foreach ($attributes as $attribute1){
               if ($attribute1->id!=$attr)
                   $attribute1->default_on=null;
               $attribute1->save();
           }
        $attribute->price=$price;
        $count=$attribute->counts;
        $count->quantity=$quantity;
        $attribute->default_on=$default;
         $attribute->save();
        $count->save();
        if($attribute->save()){

            session()->flash('alert','<div class="alert alert-success">تغییرات اعمال شد</div>');
          return back();
        }else{
            session()->flash('alert','<div class="alert alert-danger">خطای صورت گرفت!!</div>');
            return back();
        }
    }
    public function add($product,Request $request){

        $attrs_id=explode(',',$request->attrs);

       if (count($attrs_id)>0){

           $attribute=new Product_Attribute();
           $attribute->id_product=$product;
           $count=new Count();
           $attribute->save();
           $count->id_product=$product;
           $count->quantity=0;
           $count->physical_quantity=0;
           $count->id_product_attribute=$attribute->id;
           $count->save();

         if (1){
             for($i=0;$i<count($attrs_id);$i++){
                 if ($attrs_id[$i]!=null){
                     $combine=new Product_Attribute_Combination();
                     $combine->id_attribute=$attrs_id[$i];
                     $combine->id_product_attribute=$attribute->id;
                     $combine->product_id=$product;
                     $combine->save();
                 }
             }
             session()->flash('alert','<div class="alert alert-success">تغییرات اعمال شد</div>');
             return back();
         }

       }
        session()->flash('alert','<div class="alert alert-danger">خطای صورت گرفت!!</div>');
        return back();
    }
    public function delete($id){
        $attribute=Product_Attribute::query()->find($id);
        foreach ($attribute->combines as $combine)
            $combine->delete();
        $attribute->delete();
        session()->flash('alert','<div class="alert alert-success">تغییرات اعمال شد</div>');
        return back();

    }

}
