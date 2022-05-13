<?php

header('Content-Type: application/json; charset=utf-8');
$state ="";
// CURL를 활용하여 JSON데이터를 POST방식으로 요청하여 JSON데이터로 받기 
//요청 서버 URL 셋팅 
$url = "http://175.126.82.110:3334";
 //추가할 헤더값이 있을시 추가하면 됨   
 
 $data = array();

	$data["jsonrpc"] = "2.0";
	$data["method"] = "personal_listAccounts";
	$data["params"] = [];
	$data["id"] = "1";
 
$json_encoded_data = json_encode($data);

////  var_dump($json_encoded_data);

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

 
	/* close connection */

	//if($state =="M")
	 //	echo @$_GET['callback'].$result;
	//else
	 //	echo @$_GET['callback'].'('.$result.')';


	//else
	 	echo $result;
	
	?>
