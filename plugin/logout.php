<?php
	session_start();
	require 'config.php';
	require 'sdk/facebook.php';
	
	$facebook = new Facebook(array(
	    'appId' => APP_ID,
	    'secret' => APP_SECRET
	));

	$facebook->destroySession();
	//$_SESSION['sharePost'] = array();
?>