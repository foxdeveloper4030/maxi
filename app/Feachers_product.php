<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feachers_product extends Model
{
    protected $table='feachers_product';
    public $timestamps=false;

    public function feature(){
        return $this->hasOne('App\Feature','id','feature_id');
    }

}
