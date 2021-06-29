<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Feature extends Model
{
    public $timestamps=false;
    protected $table='feachers_product';
    public function feature(){
        return $this->hasOne('App\Feature','id','feature_id');
    }

}













