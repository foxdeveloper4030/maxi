<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    protected $table='product_category';
    public $timestamps=false;
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function products(){
        return $this->hasMany('App\Product','product_id');
    }
}
