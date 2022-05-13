<?php

	header('Content-Type: application/json; charset=utf-8');
 
 /*블록 번호로 블록에 대한 정보를 반환합니다.

매개 변수
QUANTITY|TAG- 블록 번호 또는 문자열의 정수 "earliest", "latest"또는 "pending"에서와 같이, 기본 블록 매개 변수 .
Boolean- true트랜잭션 false의 해시 만 전체 트랜잭션 개체를 반환하는 경우
*/
	$data 	  = array();

	$_blockNumber  = @$_POST['blockNumber']? @$_POST['blockNumber']: @$_GET['blockNumber'];

	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getBlockByNumber";
	$data["params"] = [$_blockNumber , true];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
