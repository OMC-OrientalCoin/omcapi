<?php

header('Content-Type: application/json; charset=utf-8');
$state ="";
// CURL를 활용하여 JSON데이터를 POST방식으로 요청하여 JSON데이터로 받기 
//요청 서버 URL 셋팅 
//$url = "http://175.126.82.110:3334"; 
//$url = "http://omcapi.net:8545";
$url = "http://175.126.82.110:3334";
 //추가할 헤더값이 있을시 추가하면 됨 
$address = @$_POST['address']?@$_POST['address']:@$_GET['address'] ;
$data = array();

$data["jsonrpc"] = "2.0";
$data["method"] = "eth_getBalance";
$data["params"] = [$address,"latest"];
$data["id"] = "2";

$json_encoded_data = json_encode($data);


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length: ' . strlen($json_encoded_data))
);
 
$result = curl_exec($ch);//json_decode(curl_exec($ch), true);
curl_close($ch);

echo $result;

?>
