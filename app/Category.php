<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name', 'creator', 'parent_id', 'icon',];

   public function childs(){
       return $this->hasMany('App\Category','parent_id');
   }

   public function parent(){
       return $this->hasOne('App\Category','parent_id');
   }
   public function products(){
       return $this->hasMany('App\Product','category_id');
   }

   public function features(){
       return  $this->hasMany('App\Feature','cat_id');
   }
    public function feature_category(){
        return  $this->hasMany('App\Feature_category','category_id');
    }

}
