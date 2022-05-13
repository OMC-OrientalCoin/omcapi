<?php

	header('Content-Type: application/json; charset=utf-8');
 /*
 sign 메소드는 다음을 사용하여 Ethereum 특정 서명을 계산합니다 sign(keccak256("\x19Ethereum Signed Message:\n" + len(message) + message))).

메시지에 접두사를 추가하면 계산 된 서명을 이더 리움 특정 서명으로 인식 할 수 있습니다. 이는 악의적 인 DApp이 임의의 데이터 (예 : 트랜잭션)에 서명하고 서명을 사용하여 피해자를 사칭 할 수있는 오용을 방지합니다.

참고 잠금을 해제해야합니다에 서명 할 주소를.

DATA, 20 바이트-주소.
DATA, N 바이트-서명 할 메시지.

*/
	$data 	  = array();
	$address = @$_POST['address']?@$_POST['address']:"0x804a87d02f1608c3c27b755f4d645bcabab76b14";
	$message  = $_POST['message'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_sign";
	$data["params"] = [$address,'0x2'];
	$data["id"] = "1";

 	$json_encoded_data = json_encode($data);

 

	require_once 'rcpapi.php';

?>
