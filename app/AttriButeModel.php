<?php


namespace App;


class AttriButeModel
{
public $product_Attribute;
 public function __construct(Product_Attribute $product_Attribute)
 {
     $this->product_Attribute=$product_Attribute;


 }
 public function Add($attribute){
     $insert=true;
     foreach ($this->product_Attribute->combines as $combine){
         if($combine->attribute_id==$attribute)
             $insert=false;
     }
     if ($insert)
     {
         $c=new Combine();
         $c->attribute_id=$attribute;
         $c->product_attribute_id=$this->product_Attribute->id;
         if ($c->save())
             return true;
     }
     return false;
 }
 public function remove($combine){
     if ($this->hascombine($combine)){
         Combine::query()->find($combine)->delete();
     }
     if ($this->product_Attribute->combines<=0)
         $this->product_Attribute->delete();

 }
public function hascombine($combine_id){
    foreach ($this->product_Attribute->combines as $combine){
        if($combine->id==$combine_id)
           return true;
    }
    return false;
}
}
