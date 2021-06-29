<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(){
        return view('front.seeCart');
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
