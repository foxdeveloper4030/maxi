<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps=false;
    protected $table='province';
    public function citys(){
        return $this->hasMany('App\City','province_id');
    }
}
