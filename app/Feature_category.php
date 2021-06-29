<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature_category extends Model
{
    public $timestamps=false;
    protected $table='feature_category';
    public function features(){
        return $this->hasMany('App\Feature','feature_category_id')->orderBy('id');
    }

       public function category(){
        return $this->hasOne('App\Category','category_id');
    }
}













