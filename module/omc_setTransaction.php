<?php 
@session_start(); 
require_once $_SERVER['DOCUMENT_ROOT']."/lib/init_omcDB.php";   

$regDate = gmdate("Y-m-d H:i:s", time());  
$params = array(); 
 	$result_array = array(); // 결과 값을 담을 변수 생성
 	$table = " omc_transaction "; 

 	$transaction_hash = @$_POST['tx_hash'];

 	if(@$transaction_hash)
 	{

 		$transaction_hash 	= htmlentities($transaction_hash, ENT_QUOTES | ENT_IGNORE, "UTF-8");  

 		$params['transaction_hash']	= $transaction_hash; 
 		$params['regDate']			= $regDate; 

 		$add_query = $database->insert( $table, $params );

 		if( $add_query )
 		{
	//  echo '<p>Successfully inserted &quot;'. $params['subject']. '&quot; into the database.</p>';
 			@$regState =  $database->lastid();

 		} 

 	}else{
 		$regState = 0 ; 
 	}

	$result_array['result'] = $regState; // 결과 값을 담을 변수 생성
	echo @$_GET['callback'].json_encode($result_array);
?>