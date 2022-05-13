<?php

	header('Content-Type: application/json; charset=utf-8'); 
	$data 	  = array();
	//$SHA3_hash  = $_POST['SHA3_hash'];
	//$signature  = $_POST['signature'];
	 $password = @$_POST['password']; // 씽크비젼@
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "personal_newAccount";
	$data["params"] = [$password];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);
 	
 	require_once 'rcpapi.php';

?>
