<?php

header('Content-Type: application/json; charset=utf-8');
$state ="";
// CURL를 활용하여 JSON데이터를 POST방식으로 요청하여 JSON데이터로 받기 
//요청 서버 URL 셋팅 

 //추가할 헤더값이 있을시 추가하면 됨 
/*if(!@$_POST['address'] || !@$_POST['passphrase']  )
	exit();*/

$data  = array();

$_address 	 = @$_POST['address'] ; 
$_passphrase = @$_POST['passphrase'] ; 
$_duration 	 = @$_POST['duration'] ? @$_POST['duration'] : 30  ; 


$data["jsonrpc"] = "2.0";
$data["method"] = "personal_unlockAccount";
$data["params"] = [$_address,$_passphrase,$_duration];
$data["id"] = "1";
 

$json_encoded_data = json_encode($data);
 	
 	require_once 'rcpapi.php';

/*//$url = "http://localhost:8545";
$url = "http://omcapi.net:8545";
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

echo $result;*/

?>
