<?php
/**
 * Created by PhpStorm.
 * User: Arsi
 * Date: 8/28/2019
 * Time: 10:39 PM
 */

namespace App;


use Illuminate\Http\Request;
use SoapClient;


class PublicModel implements PublicInterface
{
public $public_image_folder="public/img/products/";
public $public_noimage="public/img/products/noimage.png";
public  $mainloader='mainloader.gif';



public static function feature_value($product_id,$feature_id){
    if(Feachers_product::query()->where('product_id','=',$product_id)->where('feature_id','=',$feature_id)->first()!=null)
        return Feachers_product::query()->where('product_id','=',$product_id)->where('feature_id','=',$feature_id)->first()->value;
    else
        return " ";
}



public static function parent($product){
    if ($product->category->parent_id==0)
        return $product->category;
    else
        return Category::query()->find($product->category->parent_id);
}

 public function slug_format($str){
     return str_replace(' ','-',$str);
 }

 public function name_format($str){
        return str_replace('-',' ',$str);
 }


    public function image(Request $request,$path,$name,$fname=null){

        $file=$request->file($name);
        $filename=time().$file->getClientOriginalName();
  if ($fname!=null)
       $filename=$fname.$file->getClientOriginalName();
  else
      $filename=$fname;
        $file->move($path, $filename);

        return $filename;

    }

    public function isImpty($value)
    {
        if (empty($value))
            return true;
        else return false;
    }

    public function image_cover($product,$site=null)
    {

        $image=$product->images->first();
        if ($product->images->where('cover','=',1)!=null)
            $image=$product->images->where('cover','=',1)->first();
        return $this->image_show($image);
    }
    public function image_show($image){
        if ($image!=null)
        return str_replace(' ','',url('').'/'.$this->public_image_folder.$image->url);
        return str_replace(' ','',url('').'/'.$this->public_noimage);
    }

    public function image_Atrbute($id)
    {
        $attr=Product_Attribute::query()->find($id);
        $url=null;
        if ($attr!=null){
            if (!empty(Attribute_Image::query()->where('id_product_attribute','=',$id))){
                $url=Attribute_Image::query()->where('id_product_attribute','=',$id)->first();
                if (isset($url->id_image))
                $url=$this->image_show($url->id_image);
            }

        }
        return $url;
    }
    public  function short_string($string,$lengh=30){
     if (strlen($string)>$lengh)
         return substr($string,0,$lengh).'...';
     else
         return $string;

    }
    public function image_patch($id){
        $str='';
        $string=''.$id;
        for($i=0;$i<strlen($string);$i++){
            $str.=$string[$i].'/';
        }
        return 'public/img/p'.'/'.$str;
    }

    public function sort_attribute($array){
     $arr=array();
     foreach (Attribute_Group::all() as $gr){
         for ($i=0;$i<count($array);$i++){
           if (Attribute::query()->find($array[$i])->id_attribute_group==$gr->id)
               array_push($arr,$array[$i]);
         }

     }
     return $arr;
    }

    public function array_search($search,$array){
     $index=0;
     for ($i=0;$i<count($array);$i++){
         if ($array[$i]==$search)
             $index++;
     }
     return $index;
    }
public function count($product){
     if ($product->attrs!=null){

         $attrs=$product->attrs->where('default_on','=',1)->first();
         if ($attrs!=null)
         if ($attrs->counts!=null)
         return $attrs->counts->quantity;
     }
     else
        return 10;
         return Count::query()->where('id_product')->first()->quantity;
}
public function getType($product){
     if (count($product->attrs)>0)
         foreach ($product->attrs as $attr)
             if(count($attr->combines)>0)
                 return 1;

         return 0;
}
 public static function HasAttribute($data,$product){

    if ((new PublicModel())->getType($product)==1)
        foreach ($product->attrs as $attr){
            $count=count($attr->combines);
            $eq=0;
            if (count($data)==count($attr->combines))
            {
                foreach ($attr->combines as $combine){

                    foreach ($data as $item)
                        if ($combine->attribute_id==$item)
                            $eq++;
                }
                if ($eq==count($data))
                    return 1;
            }
        }
    return 0;
}
public static function hasWarranty($product){
 if (count($product->warranties)>0)
     return 1;
 return 0;
}
public static function hasColor($product){
 if (count($product->colors)>0)
     return 1;
 return 0;
}
public  static function Mainloader(){
     return url('public/gifs').'/mainloader.gif';
}

public static function EnappName(){
     return 'maximorse';
}

public function AllCount($product){
     $count=0;
     if(count($product->colors)>0){
         foreach ($product->colors as $pcolor){
             $count+=$pcolor->count;
         }
     }
     else
         $count=$product->quantity;
     return $count;
}


public static function SendSms1($number,$text){



    try {
   
        file_get_contents('http://maximorse.com/sms/adsfgsdfhjghkjlfhjhjgfgdjhggffddmnbvcxyhgfdshgfdds.php?number='.$number.'&text='.$text);
      //  ini_set("soap.wsdl_cache_sisabled", "0");
      //   new SoapClient('http://maximorse.com/sms/SendSMS.php?number=09162537582&text=your%20id%20is%20:4545', array('encoding'=>'UTF-8'));

    }
    catch (Exception $e)
    {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

}


}
