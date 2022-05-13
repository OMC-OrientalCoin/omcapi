<?php 
@session_start(); 
require_once $_SERVER['DOCUMENT_ROOT']."/lib/init_omcDB.php";   
 
 
 
 $userID  = @$_SESSION['userID'] ;
 
 $userWallet  =  @$result;

$table = " omc_member ";  
$regState = 0;

$update_params = array(); 
$update_where = array();  

$check_userID['userID'] = $userID;
 
$exists = $database->exists($table, 'userID', $check_userID );

if($exists)
{  
	$update_params['userWallet'] = $userWallet;  
	$update_where['userID'] = $userID;  
	$add_query = $database->update( $table, $update_params, $update_where, 1 );

	if( $add_query )
	{
	//  echo '<p>Successfully inserted &quot;'. $params['subject']. '&quot; into the database.</p>';
		@$regState = $database->lastid();   
	} 

}else{
	$userWallet = ""; 
}
 
echo $userWallet;   

?>
