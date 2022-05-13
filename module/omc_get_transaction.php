<?php
	@session_start();
	require_once $_SERVER['DOCUMENT_ROOT']."/lib/init_omcDB.php";  
	$result_array = array(); // 결과 값을 담을 변수 생성
	$params = array(); // 결과 값을 담을 변수 생성

	$table = " omc_transaction "; 

	 
	@$start_row = (empty(@$_POST['setBlock'])) ? 0 : @$_POST['setBlock'] - 1; 
	@$limit_row = (empty(@$_POST['BlockPages'])) ? 10 : @$_POST['BlockPages'];   

	$query = " SELECT * FROM $table  ORDER BY idx DESC LIMIT 30";//LIMIT $start_row, $limit_row ";  
	$results = $database->get_results( $query );

	foreach( $results as $row )
	{
		$result_array[] = $row;
	}

	/* close connection */

	//$database->disconnect();
	echo @$_GET['callback'].json_encode($result_array);
	 // /$_GET['callback'].

	 
	?>
