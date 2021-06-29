<?php
/**
 * Created by PhpStorm.
 * User: Arsi
 * Date: 10/26/2019
 * Time: 10:49 PM
 */

namespace App\Model;


use App\Cariar;

class CariarModel
{
   public $cariar;
public function __construct($cariar_id)
{
    $this->cariar=Cariar::query()->find($cariar_id);
}
public function time_start(){
    $text='';
    if ($this->cariar->start_time_m<10)
        return '0'.$this->cariar->start_time_m;
    else
      return  $this->cariar->start_time_m;
}
public function time_end(){
    $text='';
    if ($this->cariar->end_time_m<10)
        return '0'.$this->cariar->end_time_m;
    else
       return $this->cariar->end_time_m;
}
}