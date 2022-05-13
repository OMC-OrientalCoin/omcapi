<?php

	header('Content-Type: application/json; charset=utf-8');
 
 /* 
블록 해시 및 트랜잭션 인덱스 위치별로 트랜잭션에 대한 정보를 반환합니다.

매개 변수
DATA, 32 바이트-블록의 해시.
QUANTITY -트랜잭션 인덱스 위치의 정수

*/
	$data 	  = array();

	$hash  	= $_POST['hash'];
	$index  = @$_POST['index']?$_POST['index']:"0x0";

	//$SHA3_hash  = $_POST['SHA3_hash'];0x0
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getTransactionByBlockHashAndIndex";
	$data["params"] = [$hash, $index];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
