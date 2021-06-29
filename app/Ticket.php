<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
public function user(){
    return $this->belongsTo('App\User','user_id');

}
public function tickets(){
    return $this->hasMany('App\Ticket','parent');
}
}
