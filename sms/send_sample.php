<?php
$sms_username	= 'rahimi1996';
$sms_password	= 'NBUh248f';
$sms_number		= '30007650002585';

include_once("nusoap.php");

$client = new nusoap_client('http://mihansmscenter.com/webservice/?wsdl', 'wsdl');
$client->decodeUTF8(false);

//send a message to a number
$res = $client->call('send', array(
	'username'	=> $sms_username,
	'password'	=> $sms_password,
	'to'		=> '+989364951185',
	'from'		=> $sms_number,
	'message'	=> 'from arsalan maximorse.com',
	'send_time'	=> strtotime(null) // set this parameter to null if you dont want to schedule message
	));

if (is_array($res) && isset($res['status']) && $res['status'] === 0) {
	echo "message successfully sent.";
} else echo "Error :".@$res['status_message'];

//send a message to several numbers
$res = $client->call('multiSend', array(
	'username'	=> $sms_username,
	'password'	=> $sms_password,
	'to'		=> array('09162537582'), //array of numbers
	'from'		=> $sms_number,
	'message'	=> 'MESSAGE CONTENT GOES HERE'
	));

if (is_array($res) && isset($res['status']) && $res['status'] === 0) {
	echo "message successfully sent.";
} else echo "Error :".@$res['status_message'];

?>
