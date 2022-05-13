<?php

header('Content-Type: application/json; charset=utf-8');

 /*블록 번호로 블록에 대한 정보를 반환합니다.

매개 변수
QUANTITY|TAG- 블록 번호 또는 문자열의 정수 "earliest", "latest"또는 "pending"에서와 같이, 기본 블록 매개 변수 .
Boolean- true트랜잭션 false의 해시 만 전체 트랜잭션 개체를 반환하는 경우
*/
$data 	  = array();

$_blockNumber  = $_POST['blockNumber']?$_POST['blockNumber']:"latest";

	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];

	//{"method": "personal_sign",
	// "params": [message, account, password]}
$data["jsonrpc"] = "2.0";
$data["method"] = "eth_getBlockByNumber";
$data["params"] = ["latest" , true];
$data["id"] = "1";

$json_encoded_data = json_encode($data);

$url = "http://175.126.82.110:3334";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length: ' . strlen($json_encoded_data))
);

	//$result = curl_exec($ch);//json_decode(curl_exec($ch), true);

$result =  json_decode(curl_exec($ch), true);

$result2 =  $result['result'];
$hex = $result2['number'];
$number = base_convert($hex, 16, 10) ;
echo $hex." | ".$number ;
echo  "\n";

for ($i=0; $i <$number ; $i++) { 
	$aa = "0x".dechex($i);
	$data["method"] = "eth_getBlockTransactionCountByNumber";
	$data["params"] = [$aa];

	$json_encoded_data = json_encode($data);
		
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($json_encoded_data))
	);

	 
 $result11 =  json_decode(curl_exec($ch), true);

 $state = $result11['result'];

 $ssss = base_convert($state, 16, 10) ;

 if($ssss>0)
	echo $aa." | ".print_r($result11)."\n";

	}


	?>