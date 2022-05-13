<?php
	@session_start();
	header('Content-Type: application/json; charset=utf-8');

	require_once $_SERVER['DOCUMENT_ROOT']."/lib/init_omcDB.php";  
	$result_array = array(); // 결과 값을 담을 변수 생성
	$params = array(); // 결과 값을 담을 변수 생성

	$table = " omc_transaction ";  
	 
	@$start_row = (empty(@$_POST['setBlock'])) ? 0 : @$_POST['setBlock'] - 1; 
	@$limit_row = (empty(@$_POST['BlockPages'])) ? 10 : @$_POST['BlockPages'];   

	$query = " SELECT * FROM $table ";//LIMIT $start_row, $limit_row ";  
	$results = $database->get_results( $query );

	foreach( $results as $row )
	{
		$result_array[] = $row['transaction_hash'];
		//echo $row['transaction_hash']."<br/>";
	}

	/* close connection */

	//$database->disconnect();
	//echo @$_GET['callback'].json_encode($result_array);
	 // /$_GET['callback'].

	 


	$data 	  = array();
for ($i=0; $i < count($result_array) ; $i++) { 
	

//$hhh ="0xa15b0ccbc18fa128d3280098702a26ead1973445278bbf2c2b3d210203ede61c";
	//$hash  = @$_POST['hash'];
 $hash  = @$result_array[$i];

 //echo $i." ".$hash."<br/>";
 
	$data["jsonrpc"] = "2.0";
	$data["method"] = "eth_getTransactionByHash";
	$data["params"] = [$hash];
	$data["id"] = "1";
 
	$json_encoded_data = json_encode($data);




	$url = "http://localhost:3334";
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($json_encoded_data))
	);

	$result = curl_exec($ch);//json_decode(curl_exec($ch), true);
	curl_close($ch);

	echo $result;
 
}

	?>
