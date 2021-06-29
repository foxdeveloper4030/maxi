<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'title2', 'body', 'locationName', 'locationValue', 'imgUrl', 'row', 'col'
    ];
    
    public function getRouteKeyName()
    {
        return 'title';
    }
}
