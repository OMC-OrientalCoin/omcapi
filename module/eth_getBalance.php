<?php

	header('Content-Type: application/json; charset=utf-8');
 
	$data 	  = array();
	$address = $_POST['address'] ;
	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getBalance";
	$data["params"] = [$address,"latest"];
	$data["id"] = "1";
	
 	$json_encoded_data = json_encode($data);

 

	require_once 'rcpapi.php';

?>
