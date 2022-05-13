<?php

	header('Content-Type: application/json; charset=utf-8');
 
	$data 	  = array();
	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	   $method  =  "eth_accounts" ;//@$_POST['method'];//?  @$_POST['method'] :"eth_accounts" ;
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = $method;
	$data["params"] = [];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
 