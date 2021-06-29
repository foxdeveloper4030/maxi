<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature_Product extends Model
{
    public $timestamps=false;
    protected $table='ps_feature_product';
    public function feature(){
        return $this->hasOne('App\Feature_Lang','id','feature_id');
    }
    public function value(){
        return $this->hasOne('App\Feature_value','id','id_feature_value');
    }
}
