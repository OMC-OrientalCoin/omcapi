<?php

	header('Content-Type: application/json; charset=utf-8');
 
	$data 	  = array();
	$BlockHash = @$_POST['BlockHash'];//?  @$_POST['address']:"0x804a87d02f1608c3c27b755f4d645bcabab76b14";
	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getBlockTransactionCountByHash";
	$data["params"] = [$BlockHash];
	$data["id"] = "1";

 	$json_encoded_data = json_encode($data);

 

	require_once 'rcpapi.php';

?>
