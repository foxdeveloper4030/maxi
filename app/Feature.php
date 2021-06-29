<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table='feachers';
    public $timestamps=false;

    public function values(){
        return $this->hasMany('App\Features_product','feature_id');
    }
    public function sub(){
        return $this->belongsTo('App\Feature_category','feature_category_id');
    }



}
