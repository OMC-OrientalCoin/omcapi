<?php

header('Content-Type: application/json; charset=utf-8');
$state ="";
// CURL를 활용하여 JSON데이터를 POST방식으로 요청하여 JSON데이터로 받기 
//요청 서버 URL 셋팅 
$url = "http://localhost:8545";
 //추가할 헤더값이 있을시 추가하면 됨 
if(!@$_POST['from'] || !@$_POST['to'] || !@$_POST['value'])
	exit();

$data  = array();
$param = array();

$param["from"] 	= $_POST['from'] ;
$param["to"] 	= $_POST['to'] ;
$param["value"] = $_POST['value'] ;
//$param["gas"] 	= $_POST['gas'] ;
//$param["gasPrice"] = $_POST['gasPrice'] ;


$data["jsonrpc"] = "2.0";
$data["method"] = "eth_sendTransaction";
$data["params"] = [$param];
$data["id"] = "1";

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
