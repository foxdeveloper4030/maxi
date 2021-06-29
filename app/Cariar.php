<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cariar extends Model
{
       public function cyties(){
           return $this->hasMany('App\Province_Cariar','cariar_id');
       }
}
