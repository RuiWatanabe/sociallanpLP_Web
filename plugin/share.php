<?php
session_start();
$body = $_POST['body'];
$url = $_POST['url'];
require 'sdk/facebook.php';
require 'config.php';
	
	$facebook = new Facebook(array(
	    'appId' => APP_ID,
	    'secret' => APP_SECRET
	));
	
  //echo $facebook->api('/me/feed', 'POST', array('message' => 'テスト'));
  $user = $facebook->getUser();
  if($user){
  		try{
  		 	$facebook->api('/me/feed', 'POST', array('message' => "SocialLanpをダウンロードしました。" , 'link' => $url));
  		 	//if($_SESSION['postSlug']!='' && $_SESSION['postSlug']!='undefined')
  		 	//	array_push($_SESSION['sharePost'], $_SESSION['postSlug']);
  			//$_SESSION['nextShareTime'] = strtotime("+15 hour"); //次のシェアタイムを1時間後に設定]
  		 	echo "true";
	 	}
  		 catch(Exception $e){
	  		 echo "false";	  		 	
  		 	}
	 }
	 else{
	 	 echo "false";
	 }
	 
	 
?>