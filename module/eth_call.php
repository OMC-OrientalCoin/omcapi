<?php

	header('Content-Type: application/json; charset=utf-8');

/*
블록 체인에서 트랜잭션을 생성하지 않고 새 메시지 호출을 즉시 실행합니다.

매개 변수
Object -트랜잭션 호출 객체
from: DATA, 20 바이트-(선택 사항) 트랜잭션이 전송 된 주소입니다.
to: DATA, 20 바이트-거래가 전달되는 주소입니다.
gas: QUANTITY - 트랜잭션 실행을 위해 제공되는 가스 (옵션) 정수. eth_call은 제로 가스를 소비하지만이 매개 변수는 일부 실행에 필요할 수 있습니다.
gasPrice: QUANTITY - gasPrice (옵션) 정수는 각 지불 가스 사용
value: QUANTITY - 값 (옵션) 정수는이 거래로 전송

"from": $from,"to": $to,"value": $value


data: DATA - 메소드 서명과 암호화 매개 변수 (선택 사항) 해시. 자세한 내용은 이더 리움 계약 ABI 를 참조하십시오.
QUANTITY|TAG- 정수 블록 번호, 문자열 "latest", "earliest"또는 "pending"의 참조 기본 블록 매개 변수를
보고
DATA -체결 된 계약의 반환 가치.
*/

	$data 	  = array();

	 
	$from = @$_POST['from'];//?  @$_POST['address']:"0x804a87d02f1608c3c27b755f4d645bcabab76b14";
	$to = @$_POST['to'];
	$gas = @$_POST['gas'];
	$gasPrice = @$_POST['gasPrice'];
	$value = @$_POST['value'];
	/*$data_hash_ABI = @$_POST['data_hash_ABI'];
	$nonce = @$_POST['data_hash_ABI'];

*/
 

	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_call";
	$data["params"] = ["from": $from,"to": $to,"value": $value];
	$data["id"] = "1";

 	$json_encoded_data = json_encode($data);

 

	require_once 'rcpapi.php';

?>
