<?php
	session_start();
	session_destroy();
	if(isset($_COOKIE["cookieName"])){
		unset($_COOKIE["cookieName"]);
		setcookie('cookieName', null, -1, '/');
	}

	header('Location: login.php');
exit;
?>