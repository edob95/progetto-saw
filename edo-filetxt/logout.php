<?php
	
	session_start();
	unset($_SESSION);
	session_destroy();
	setcookie('mycookie',"", time()-3600);
	header('location: index.php');
		
?>