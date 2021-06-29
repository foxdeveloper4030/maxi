<?php

include_once("function.php");
$key="lSpziaoJgjwlqFyeem8YtejNfCO9EWEL";



$servername = "localhost";
$username = "maximors_arsi";
$password = "Arsij@4030";
$dbname = "maximors_shop";

if (!isset($_POST["OrderId"]))
{
    header("Location: https://maximorse.com/404");
    exit();
}


$OrderId=$_POST["OrderId"];
$Token=$_POST["token"];
$ResCode=$_POST["ResCode"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

        header("Location: https://maximorse.com/404");
        exit();

}

$sql = "SELECT * FROM `orders` WHERE `id`=".$OrderId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    if($ResCode==0)
    {
        $verifyData = array('Token'=>$Token,'SignData'=>encrypt_pkcs7($Token,$key));
        $str_data = json_encode($verifyData);
        $res=CallAPI('https://sadad.shaparak.ir/vpg/api/v0/Advice/Verify',$str_data);
        $arrres=json_decode($res);
    }

    if($arrres->ResCode!=-1 && $arrres->ResCode==0)
    {
        $q='UPDATE `orders` SET `state_id`=2 WHERE `id`='.$OrderId;
        if ($conn->query($q)){
            header("");
        }
    }

} else {
    header("Location: https://maximorse.com/404");
    exit();
}
$conn->close();


echo $_POST["token"];
if($ResCode==0)
{
	$verifyData = array('Token'=>$Token,'SignData'=>encrypt_pkcs7($Token,$key));
	$str_data = json_encode($verifyData);
	$res=CallAPI('https://sadad.shaparak.ir/vpg/api/v0/Advice/Verify',$str_data);
	$arrres=json_decode($res);
}
echo $arrres->ResCode;
if($arrres->ResCode!=-1 && $arrres->ResCode==0)
{
	//Save $arrres->RetrivalRefNo,$arrres->SystemTraceNo,$arrres->OrderId to DataBase
	echo "شماره سفارش:".$OrderId."<br>"."شماره پیگیری : ".$arrres->SystemTraceNo."<br>"."شماره مرجع:".
	$arrres->RetrivalRefNo."<br> اطلاعات بالا را جهت پیگیری های بعدی یادداشت نمایید."."<br>";
}
else
	echo "تراکنش نا موفق بود در صورت کسر مبلغ از حساب شما حداکثر پس از 72 ساعت مبلغ به حسابتان برمی گردد.";
?>
