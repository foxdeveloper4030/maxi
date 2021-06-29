<?php
/**
 * Created by PhpStorm.
 * User: Arsi
 * Date: 10/29/2019
 * Time: 7:47 PM
 */

namespace App\Model;


class GetRoutes
{
    public $routes;
  public function __construct()
  {
      $this->routes=array('home'=>'admin','category'=>'admincategory');
  }
  public function get($name=null){
      if ($name==null)
          return $this->routes;
      else
          return $this->routes[$name];
  }
  public function getpach($name){
      return url('').'/'.$this->routes[$name];
  }
}