<?php

	header('Content-Type: application/json; charset=utf-8');
 
	$data 	  = array();
	$message  = $_POST['message'];
	$account  = $_POST['account'];
	$password = $_POST['password'];
//{"method": "personal_sign",
// "params": [message, account, password]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "personal_sign";
	$data["params"] = [$message,$account,$password];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
