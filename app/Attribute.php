<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table='attributes';
    public function value(){
        return $this->hasOne('App\Attribute_Value','id_attribute');
    }
    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }

}
