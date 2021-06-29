<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Color extends Model
{
   protected $table='product_color';
   public $timestamps=false;
   public function product(){
       return $this->belongsTo('App\Product','product_id');
   }
   public function color(){
       return $this->belongsTo('App\Color','color_id');
   }
}
