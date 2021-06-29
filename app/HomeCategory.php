<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
}
