<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\PublicModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use soapclient;

class AlakiController extends Controller
{
    public function convertMyTableToAddress()
    {
        $myAddr = \DB::table('ps_address')->get();

        $i = 0;
        $result = [];
        foreach ($myAddr as $item) {

            $result[$i] =
                "DB::table('address')->
                insert(['id' => $item->id_address, 'province_id' => $item->id_state, 
                'user_id' => $item->id_customer,'type'=>'$item->alias','lastname'=>'$item->lastname',
                'firstname'=>'$item->firstname', 'address'=>'$item->address1','postcode'=>'$item->postcode',
                'city'=>'$item->city','phone_mobile'=>'$item->phone_mobile', 'phone'=>'$item->phone','created_at'=>'$item->date_add','updated_at'=>'$item->date_upd','active'=>$item->active,'deleted'=>$item->deleted]);";


            $i++;
        }
        return response()->json($result,200);

    }


    public function convertMyTableToProducts()
    {

        set_time_limit(3600);
        $myTable = \DB::table('mytable')->get();
//        dd(Category::count());
        if (Category::count() > 0) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Product::truncate();
            Category::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
//        dd("s");
        $i = 0;
        foreach ($myTable as $item) {

            $category = Category::create([
                'name' => $item->category,
                'parent_id' => 0,
            ]);

            $slugName = (new PublicModel())->slug_format($item->slug);
            $product = Product::create([
                'category_id' => $category->id,
                'name' => $item->name,
                'image' => $item->image,
                'price_main' => $item->price_main,
                'price_off' => $item->price_off,
                'position' => $item->position,
                'number' => $item->number,
                'slug' => $slugName,
            ]);

            $i++;
        }
        return "Done";

    }


    public function ss($number,$text){
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new SoapClient('http://payamak-service.ir/SendService.svc?wsdl', array('encoding'=>'UTF-8'));


        try {
            $parameters['userName'] = "mt.09140793198";
            $parameters['password'] = "86129";
            $parameters['fromNumber']="10009611";
            $parameters['messageContent']  =$text;
            $parameters['toNumbers'] = array($number);

            $parameters['isFlash'] = false;
            $recId = array();
            $status = array();
            $parameters['recId'] = &$recId ;
            $parameters['status'] = &$status ;


            return $sms_client->SendSMS($parameters)->SendSMSResult;
        }
        catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
