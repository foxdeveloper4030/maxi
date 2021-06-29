<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_Image extends Model
{
    protected $table='ps_product_attribute_image';
    public function alt(){
        return $this->hasOne('Alt_Image','id_image');
    }
}
