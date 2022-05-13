<?php

	header('Content-Type: application/json; charset=utf-8');

/*
데이터 필드에 코드가 포함 된 경우 새 메시지 호출 트랜잭션 또는 계약 작성을 작성합니다.

매개 변수
Object -거래 객체
from: DATA, 20 바이트-거래가 발송되는 주소입니다.
to: DATA, 20 바이트-(새 계약을 만들 때 선택 사항) 거래가 전달되는 주소입니다.
gas: QUANTITY - (옵션, 기본값 : 90000) 트랜잭션 실행을 위해 제공되는 가스의 정수. 사용하지 않은 가스를 반환합니다.
gasPrice: QUANTITY - (옵션, 기본값은 :로가 되 결정된)을 gasPrice의 정수는 각 지불 가스 사용
value: QUANTITY - 값 (옵션) 정수는이 거래로 전송
data: DATA -계약의 컴파일 된 코드 또는 호출 된 메소드 서명 및 인코딩 된 매개 변수의 해시. 자세한 내용은 이더 리움 계약 ABI 를 참조하십시오.
nonce: QUANTITY - 난스 (옵션) 정수. 이를 통해 동일한 nonce를 사용하는 보류중인 트랜잭션을 덮어 쓸 수 있습니다.
*/

	$data 	  = array();

	$from = @$_POST['from'];//?  @$_POST['address']:"0x804a87d02f1608c3c27b755f4d645bcabab76b14";
	$to = @$_POST['to'];
	$gas = @$_POST['gas'];
	$gasPrice = @$_POST['gasPrice'];
	$value = @$_POST['value'];
	$data_hash_ABI = @$_POST['data_hash_ABI'];
	$nonce = @$_POST['data_hash_ABI'];

	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_sendTransaction";
	$data["params"] = ["from": $from,"to": $to,"value": $value];
	$data["id"] = "1";

 	$json_encoded_data = json_encode($data);

 

	require_once 'rcpapi.php';

?>
