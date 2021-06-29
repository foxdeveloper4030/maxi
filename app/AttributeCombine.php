<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeCombine extends Model
{
   protected $table='attribute_combine';
   public $timestamps=false;
   public function Attribute_Product(){
       return $this->belongsTo('App\Product_Attribute','product_attribute_id');
   }
   public function Attribute(){
       return $this->belongsTo('App\Attribute','attribute_id');

   }
}
