<?php
ini_set("soap.wsdl_cache_enabled", "0");
$sms_client = new SoapClient('http://payamak-service.ir/SendService.svc?wsdl', array('encoding'=>'UTF-8'));


try {
$parameters['userName'] = "mt.09140793198";
$parameters['password'] = "86129";
$parameters['fromNumber']="10009611";
$parameters['messageContent']  = $_GET['text'];
$parameters['toNumbers'] = array($_GET['number']);

$parameters['isFlash'] = false;
$recId = array();
$status = array();
$parameters['recId'] = &$recId ;
$parameters['status'] = &$status ;


 $sms_client->SendSMS($parameters)->SendSMSResult;
} 
catch (Exception $e) 
{
 echo 'Caught exception: ',  $e->getMessage(), "\n";
}

return 44;
?>