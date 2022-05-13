<?php

	header('Content-Type: application/json; charset=utf-8');
 
	$data 	  = array();
	//$message  = $_POST['message'];
	//$signature  = $_POST['signature'];
	 
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getStorageAt";
	$data["params"] = [];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
