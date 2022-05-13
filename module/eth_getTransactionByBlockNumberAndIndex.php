<?php

	header('Content-Type: application/json; charset=utf-8');
 
 /* 
블록 번호 및 트랜잭션 인덱스 위치별로 트랜잭션에 대한 정보를 리턴합니다

QUANTITY|TAG- 블록 번호, 문자열 "earliest", "latest"또는 "pending"에서와 같이, 기본 블록 매개 변수 .
QUANTITY -거래 인덱스 위치.

*/
	$data 	  = array();

	$hash  = $_POST['hash '];
	$index = @$_POST['index']?$_POST['index']:"0x0";

	//$SHA3_hash  = $_POST['SHA3_hash'];0x0
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getTransactionByBlockNumberAndIndex";
	$data["params"] = [$hash , $index];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
