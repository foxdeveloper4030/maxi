<?php
/**
 * Created by PhpStorm.
 * User: Arsi
 * Date: 10/21/2019
 * Time: 2:04 AM
 */

namespace App;


class Attribute_Model
{
  public $attribute_id;
  public $attribute;
  public function __construct($attribute)
  {
   $this->attribute_id=$attribute;
   $this->attribute=Product_Attribute::query()->find($attribute);
  }
  public function getAttributeCount(){
      if (isset($this->attribute->counts))
      return $this->attribute->counts->count;
      else
          return 0;
  }
  public function getAttributeValue(){
      $attr=array();
      foreach ($this->attribute->combines as $combine){
          array_push($attr,$combine->atrr->value->name);
      }
      return $attr;
  }
}