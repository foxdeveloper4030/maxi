<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table='groups';
    public function Attributes(){
       return $this->hasMany('App\Attribute','group_id');
    }
}
