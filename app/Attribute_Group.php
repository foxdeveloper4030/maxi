<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_Group extends Model
{
    protected $table='ps_attribute_group_lang';
    public function attrs(){
        return $this->hasMany('App\Attribute','id_attribute_group');
    }
}
