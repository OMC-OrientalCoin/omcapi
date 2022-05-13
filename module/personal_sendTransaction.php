<?php

	header('Content-Type: application/json; charset=utf-8');
 
	$data 	= array();
	$tx 	= $_POST['tx'];
	$string = $_POST['string'];
//{"method": "personal_sendTransaction",
// "params": [tx, string]}
	$data["jsonrpc"] = "2.0";
	$data["method"] = "personal_sendTransaction";
	$data["params"] = [$tx,$string];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
