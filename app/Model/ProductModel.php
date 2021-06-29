<?php
/**
 * Created by PhpStorm.
 * User: Arsi
 * Date: 10/21/2019
 * Time: 9:41 PM
 */

namespace App\Model;


use App\Card;
use App\Order;
use App\Product;
use App\Product_Attribute;
use App\Product_Attribute_Combination;
use App\PublicModel;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductModel
{
  public $product;

  public function __construct($product_id)
  {
      $this->product=Product::query()->find($product_id);
  }
  public function count(){
     $count=$this->product->quantity;
     if (PublicModel::hasColor($this->product)){
         foreach ($this->product->colors as $color){
             if ($color->count>0)
                 return $color->count;
         }
     }
   return $count;
  }
  public function getattribute($attrs){


      $allattrs=array();
      if (isset($this->product->attrs)){
          $attributes=$this->product->attrs;
          foreach ($attributes as $attribute){
              $allattrs=array();
              foreach ($attribute->combines as $combine){
                  array_push($allattrs,$combine->atrr->id);
              }
              $a=$attrs;
              $b=$allattrs;
              sort($a);
              sort($b);
              if ($a==$b)
                  return $attribute;
          }
      }

      return array();


  }
  public function getdefaultattribute(){
      if (isset($this->product->attrs))
          if ($this->product->attrs->where('default_on','=',1)->first()!=null)
      return $this->product->attrs->where('default_on','=',1)->first();
      return $this->product->attrs->first();
  }
  public function getprice($attribute=null){
      $price=$this->product->price;
     if ($attribute==null)
         if (!empty($this->getdefaultattribute()))
             $price+=$this->getdefaultattribute()->price;
         return $price;
  }
  public function getdefaultcolor(){
      if (empty($this->getdefaultattribute()))
          return 0;
      else
          foreach ($this->getdefaultattribute()->combines as $combine){
              if ($combine->atrr->group->id==17)
                  return $combine->atrr;
          }
          return 0;
  }
public function geta($arr,$pid){
      $comines=Product_Attribute_Combination::query()->where('product_id','=',$pid)->orWhere('id','=',$this->qe($arr,new Builder()));
return $comines->get();
  }
public function qe($attr,Builder $qeury){
      for ($i=0;$i<$this->count($attr);$i++){
          $qeury->where('id_attribute','=',$attr[$i]);
      }
}
public function soecial(){
      $special=array();


}
public function thread($attribute=null){
      $count=0;
      if ($attribute==null){
          $time=((new \Carbon\Carbon(time()-10*60))->format('Y-m-d H:M:S'));
          $orders=Order::query()->orWhere('created_at','>',$time)->get();
          foreach ($orders as $order){
              foreach ($order->carts as $cart){
                  if ($cart->product_id==$this->product->id&&$cart->attribute_id==0)
                      $count+=$cart->count;
              }
          }




      }
      else{
          $time=((new \Carbon\Carbon(time()))->format('Y-m-d h:m:s'));
          $orders=Order::query()->orWhere('created_at','>',$time)->get();
          foreach ($orders as $order){
              foreach ($order->carts as $cart){
                  if ($cart->product_id==$this->product->id&&$cart->attribute_id==$attribute)
                      $count+=$cart->count;
              }
          }


          return $count;

      }
      return $count;
}
public function specialcost(){
      if (isset($this->product->special)){
         if ($this->product->special->expire>time()){
             return $this->product->price_main-$this->product->special->price_off;
         }
      }
      return 0;
}
public function AttrributeDefult($product){
      if (count($product->attrs)>=1)
          return $product->attrs->where('default_on','=',1);
      else
          return array();
}
}
