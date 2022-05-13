<?php

	header('Content-Type: application/json; charset=utf-8');
 
	$data = array();

	$data["jsonrpc"] = "2.0";
	$data["method"] = "txpool_content";
	$data["params"] = [];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);

	require_once 'rcpapi.php';

?>
