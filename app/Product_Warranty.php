<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Warranty extends Model
{
    public $timestamps=false;
    protected $table='product_warranty';
    public function product(){
        return $this->belongsTo("App\Product",'product_id');
    }
    public function warranty(){
     return $this->belongsTo('App\Warranty','warranty_id');
    }
}
