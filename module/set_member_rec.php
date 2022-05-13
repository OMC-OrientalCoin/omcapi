<?php 
@session_start(); 
require_once $_SERVER['DOCUMENT_ROOT']."/lib/init_omcDB.php";   

$regDate = gmdate("Y-m-d H:i:s", time());  
$params = array(); 
$check_userID = array(); 
$lastid = "";

$table = " omc_member "; 


$userID 	= htmlentities(@$_POST['userID'], ENT_QUOTES | ENT_IGNORE, "UTF-8");
$userName 	= htmlentities(@$_POST['userName'], ENT_QUOTES | ENT_IGNORE, "UTF-8"); 
$userEmail 	= htmlentities(@$_POST['userEMAIL'], ENT_QUOTES | ENT_IGNORE, "UTF-8");
$userPhone 	= htmlentities(@$_POST['userPhone'], ENT_QUOTES | ENT_IGNORE, "UTF-8");
$userNation = htmlentities(@$_POST['userNation'], ENT_QUOTES | ENT_IGNORE, "UTF-8");

if(!@$_POST['userID'])
{
	header('Location: /');
	exit;
}

$check_userID['userID'] =$userID;
$exists = $database->exists($table, 'userID', $check_userID );

if($exists)
{
	$regState = 0;

}else{

	$params['userID']	  = $userID;
	$params['userPW']	  = @$_POST['userPassword']; 
	$params['userName']	  = @$userName;
	$params['userEmail']  = @$userEmail;
	$params['userPhone']  = @$userPhone; 
	$params['userNation'] = @$userNation;
	$params['userWallet'] = ""; 

	$params['usedState']	= 1 ;
	$params['regDate']		= $regDate; 

	$add_query = $database->insert( $table, $params );

	if( $add_query )
	{
	//  echo '<p>Successfully inserted &quot;'. $params['subject']. '&quot; into the database.</p>';
		@$regState = $database->lastid();   
	} 
}
echo $regState;   

?>