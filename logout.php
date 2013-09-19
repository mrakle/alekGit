<?php
    
    session_start();
	session_destroy();
	
	session_start();
	$_SESSION['logout_message'] = "<p>DU ÄR UTLOGGAD!<p/>";
	//if(isset)
	header('Location: index.php');
	
	
	
	