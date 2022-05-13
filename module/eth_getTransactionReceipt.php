<?php

	header('Content-Type: application/json; charset=utf-8');
 
 /* 
트랜잭션 해시에 의한 트랜잭션 수령을 리턴합니다.

참고 영수증 거래 보류에 사용할 수없는 경우를 뜻합니다.

매개 변수
DATA, 32 바이트-트랜잭션 해시

*/
	$data 	  = array();

	$hash  	= $_POST['hash'];
	//$index  = @$_POST['index']?$_POST['index']:"0x0"; 
	//$SHA3_hash  = $_POST['SHA3_hash'];0x0
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getTransactionReceipt";
	$data["params"] = [$hash];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
