<?php

	header('Content-Type: application/json; charset=utf-8');
 
	$data 	  = array();
	$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "web3_sha3";
	$data["params"] = [$SHA3_hash];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
