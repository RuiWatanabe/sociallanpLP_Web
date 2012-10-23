<?php

session_start();
require 'system/config.php';	
require 'system/sdk/facebook.php';	

	$facebook = new Facebook(array(
	    'appId' => APP_ID,
	    'secret' => APP_SECRET,
	));

//ログインをキャンセルした場合の処理
if($_REQUEST['error']){
	$facebook->destroySession();
	$login = false;
}
else{
	
	$user = $facebook->getUser();
	
	if(isset($_REQUEST['code'])&&isset($_REQUEST['state'])){
		$login = $facebook->getAccessToken();
	}
	else{
		$login = false;	
	}
}


//facebookにシェアする
  $user = $facebook->getUser();
  if($user && $login != false){
  		try{
  		 	$return = "true";
  		 	//$return =  $facebook->api('/me/feed', 'POST', array('message' => "SocialLanpをシェアしました。" , 'link' => "http://sociallanp.lastlanp.jp"));
  		 	//echo $req;
	 	}
  		 catch(Exception $e){
	  		 $return = "error";	  		 	
  		 	}
  }
	 else{
	 	 $return= "error";
	 }

//header("Location: http://hirayamaru.info/wp_sociallanp/complete");
	 

//print_r($facebook->api("/me&locale=ja_JP"));
//print_r($facebook->api("/me&locale=ja_JP"));
//$u = json_encode($u);
//echo "<pre>";
//print_r($u);
//echo "</pre>";

/*

//エキスパートメールのDBに情報を格納する
$url = 'http://lanp.biz/ad/do';
$data = array(
	'mid' => 'soci',
	'fid' => 'rlA2pZ',
	'charcode' => "auto",
	'd[0]' => $u['email'],
	'd[1]' => $u['name'],
	'd[2]' => "wp",
	'd[3]' => md5($u['email']),
	'd[4]' => $u['username'],
	'd[5]' => $u['gender'],
	'd[6]' => $u['location']['name'],
	'd[7]' => $u['name'],
);
$options = array('http' => array(
	'method' => 'POST',
	'content' => http_build_query($data),
));
$contents = file_get_contents($url, false, stream_context_create($options));

//print_r($contents);





//ソーシャルランプのDBに情報を格納する
$url = 'http://sociallanp.lastlanp.jp/plugin/addUser.php';
$data = array(
	'mail' => $u['email'],
	'name' => $u['name'],
	'code' => md5($u['email']),
	'username' => $u['username'],
	'gender' => $u['gender'],
	'location' => $u['location']['name'],
	'realname' => $u['name'],
);
$options = array('http' => array(
	'method' => 'POST',
	'content' => http_build_query($data),
));
$contents = file_get_contents($url, false, stream_context_create($options));




//Facebookメッセージを送信する
$user = $u['username'];
$name = $u['name'];
$mail = $u['email'];
$code = md5($u['email']);

$body= 
"$name 様

ソーシャルランプへのユーザー登録、ありがとうございます。

あなたの認証用メールアドレス
$mail
※システムを利用する際に必要になります。

こちらのURLからダウンロードすることができます。
http://sociallanp.lastlanp.jp/download.php?type=wp&code=".$code."
※上記のダウンロードURLは24時間で失効となりますので、
お早めのダウンロードをお願いいたします。";


mb_language("Ja") ;
mb_internal_encoding("UTF-8");
$mailto=$user."@facebook.com";
$subject="WpSocialLanp: ダウンロードURLの送付";
$mailfrom="From:" .mb_encode_mimeheader("ラストランプ運営チーム") ."< $mail >";
$re = mb_send_mail($mailto,$subject,$body,$mailfrom);

//print_r("$mailto : $body : $re");

/*
//ソーシャルランプのDBに情報を格納する
$mail = $u['email'];
$name = $u['name'];
$screen_name = $u['username'];
$fbname = $u['name'];
$location = $u['location']['name'];
$gender = $u['gender'];
$code = md5($u['email']);
$timeStamp = time();

require_once "database.php";
	
//データベースにユーザー情報を格納
$sql = "INSERT INTO ".DB_NAME.".User (ID, Code, Mail,Name,ScreenName,FBName,Location,Gender,TimeStamp) VALUES (NULL, '$code','$mail','$name', '$screen_name','$fbname','$location','$gender','$timeStamp');";
//$sql = "INSERT INTO ".DB_NAME.".AuthTable (`AuthCode`,`Name`) VALUES (`$auth`,`$name`);";


$result = mysql_query($sql);
/*	if($result)
		echo "True";
	else
		echo '【DB挿入エラー】: ' . mysql_error().":".$sql;
*/

	 
?>
<html>
<head>

	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>WP SocialLanp -ソーシャルランプ- | あなたのサイトを新しく、面白くするWordPressプラグイン</title>

	<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="system/system.js"></script>

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="bootstrap/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="bootstrap/ico/apple-touch-icon-57-precomposed.png">
  </head>

<script type="text/javascript">
	//document.location = "http://hirayamaru.info/sociallanpLP_WP/#!/m=complete";
	$(document).ready(function(){
			callback();
	});
</script>

</head>


<body>



</body>
</html>


