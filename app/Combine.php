<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combine extends Model
{
    public $timestamps=false;
    protected $table='combines';

    public function Product_Attribute(){
        return $this->belongsTo('App\Product_Attribute','product_attribute_id');
    }
    public function Attribute(){
        return $this->belongsTo('App\Attribute','attribute_id');
    }
}
