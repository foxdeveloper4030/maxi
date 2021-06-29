<?php

namespace App;

//use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    use Sluggable;



    protected $fillable = ['category_id', 'name', 'image', 'details', 'price_main', 'price_off', 'special', 'slug', 'active', 'position', 'totalSelling', 'latest', 'totalVisited', 'number','view'];

    public function specil(){
        return $this->hasOne('App\Special','product_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function attrs(){
        return $this->hasMany('App\Product_Attribute','id_product');
    }
    public function images(){
      return  $this->hasMany('App\Product_Image','id_product');
    }
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function AllCategory(){
        return $this->hasMany('App\Product_category','product_id');
    }
    public function features(){
        return $this->hasMany('App\Feature_Product','id_product');
    }
    public function special(){
        return $this->hasOne('App\Special','product_id');
    }
    public function comments(){
        return $this->hasMany('App\ProductComment','product_id');
    }

    public function warranties(){
   return $this->hasMany('App\Product_Warranty','product_id');
    }
    public function colors(){
        return $this->hasMany('App\Product_Color','product_id');
    }


}
