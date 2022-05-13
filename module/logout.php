<?php
	@session_start();  

	require_once $_SERVER['DOCUMENT_ROOT']."/lib/init_DB.php";   
		// Session 삭제  
	$recDate = gmdate("Y-m-d H:i:s", time()); 

	unset($_SESSION['userID']); 
	unset($_SESSION['userName']); 

	session_destroy(); 
 
?>
<meta http-equiv='refresh' content='0;url=/khidi/index.html'>