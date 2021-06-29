<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    protected $table='product_image';
    public $timestamps=false;
    public function alt(){
        return $this->hasOne('Alt_Image','id_image');
    }
}
