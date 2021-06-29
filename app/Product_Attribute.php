<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Attribute extends Model
{


    protected $table='ps_product_attribute';
public $timestamps=false;
    public function combines(){
        return $this->hasMany('App\Combine','product_attribute_id');
    }
    public function counts(){
        return $this->hasOne('App\Count','id_product_attribute');
    }
    public function images(){
        return $this->hasMany('App\Attribute_Image','id_product_attribute');
    }
}
