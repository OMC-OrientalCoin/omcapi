<?php

	header('Content-Type: application/json; charset=utf-8');

/*
서명 된 트랜잭션에 대한 새 메시지 호출 트랜잭션 또는 계약 작성을 작성합니다.
DATA서명 된 트랜잭션 데이터
*/

	$data 	  = array();

	/*
	$from = @$_POST['from'];//?  @$_POST['address']:"0x804a87d02f1608c3c27b755f4d645bcabab76b14";
	$to = @$_POST['to'];
	$gas = @$_POST['gas'];
	$gasPrice = @$_POST['gasPrice'];
	$value = @$_POST['value'];
	$data_hash_ABI = @$_POST['data_hash_ABI'];
	$nonce = @$_POST['data_hash_ABI'];
"from": $from,"to": $to,"value": $value

	*/

	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_sendRawTransaction ";
	$data["params"] = [];
	$data["id"] = "1";

 	$json_encoded_data = json_encode($data);

 

	require_once 'rcpapi.php';

?>
