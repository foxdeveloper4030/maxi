<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Attribute_Combination extends Model
{
    public $timestamps=false;
    protected $table='ps_product_attribute_combination';
    public function atrr(){
        return $this->belongsTo('App\Attribute','id_attribute');
    }
    public function product_attr(){
        return $this->belongsTo('App\Product_Attribute','id_product_attribute');
    }
}
