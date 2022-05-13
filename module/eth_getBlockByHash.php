<?php

	header('Content-Type: application/json; charset=utf-8');

/*
해시별로 블록에 대한 정보를 반환합니다.

매개 변수
DATA, 32 바이트-블록의 해시.
Boolean- true트랜잭션 false의 해시 만 전체 트랜잭션 개체를 반환하는 경우

number: QUANTITY-블록 번호 null보류중인 블록.
hash: DATA, 32 바이트-블록의 해시. null보류중인 블록.
parentHash: DATA, 32 바이트-부모 블록의 해시.
nonce: DATA, 8 바이트-생성 된 작업 증명의 해시. null보류중인 블록.
sha3Uncles: DATA, 32 바이트-블록에있는 아저씨 데이터의 SHA3.
logsBloom: DATA, 256 바이트-블록의 로그에 대한 블룸 필터. null보류중인 블록.
transactionsRoot: DATA, 32 바이트-블록의 트랜잭션 트리의 루트입니다.
stateRoot: DATA, 32 바이트-블록의 최종 상태 트리의 루트.
receiptsRoot: DATA, 32 바이트-블록의 수령 트리의 근.
miner: DATA, 20 바이트-채굴 보상을받은 수혜자의 주소.
difficulty: QUANTITY-이 블록의 난이도의 정수.
totalDifficulty: QUANTITY-이 블록까지 체인의 전체 난이도의 정수.
extraData: DATA-이 블록의 "추가 데이터"필드.
size: QUANTITY-이 블록의 크기를 바이트 단위로 정수.
gasLimit: QUANTITY-이 블록에서 허용되는 최대 가스.
gasUsed: QUANTITY-이 블록의 모든 거래에서 사용 된 총 가스.
timestamp: QUANTITY-블록이 대조 될 때의 유닉스 타임 스탬프.
transactions: Array-트랜잭션 객체의 배열 또는 마지막 지정된 매개 변수에 따라 32 바이트 트랜잭션 해시.
uncles: Array-삼촌 해시 배열.
*/

	$data 	  = array();

	 
	$hash = @$_POST['hash'];//?  @$_POST['address']:"0x804a87d02f1608c3c27b755f4d645bcabab76b14";
/*	$to = @$_POST['to'];
	$gas = @$_POST['gas'];
	$gasPrice = @$_POST['gasPrice'];
	$value = @$_POST['value'];
	$data_hash_ABI = @$_POST['data_hash_ABI'];
	$nonce = @$_POST['data_hash_ABI'];

*/
 

	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getBlockByHash";
	$data["params"] = ["from": $from,"to": $to,"value": $value];
	$data["id"] = "1";

 	$json_encoded_data = json_encode($data);

 

	require_once 'rcpapi.php';

?>
