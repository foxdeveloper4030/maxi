<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps=false;
    protected $table='city';
    public function province(){
        return $this->belongsTo('App\Province','province_id');
    }
}
