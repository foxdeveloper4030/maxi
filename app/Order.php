<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['post_id', 'purchaseFactor','state_id'];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function carts(){
        return $this->hasMany('App\Card','order_id');
    }

}
