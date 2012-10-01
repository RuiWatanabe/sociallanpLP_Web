<?php
session_start();
require 'sdk/facebook.php';	
require 'config.php';	

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
  		 	//$return =  $facebook->api('/me/feed', 'POST', array('message' => "この無料ツール、かなり凄いです！何がすごいって、こんな感じでfacebookで口コミがどんどん広がるんです！【ブログを拡散したい】とか【お店にお客さんをたくさん呼びたい】とか【商品をもっと認知させたい】とか【リスト命！】という方は、このツールを使えば一瞬です。一気にお客さんが集まります。これからのマーケティングに新しい風を巻き起こしそうな予感です。ツールの設置自体も簡単なのでとりあえずダウンロードしておくことをお勧めします！無料配布期間は今だけみたいなのでお早めに♪" , 'link' => "http://sociallanp.lastlanp.jp"));
  		 	//echo $req;
	 	}
  		 catch(Exception $e){
	  		 $return = "error";	  		 	
  		 	}
  }
	 else{
	 	 $return= "error";
	 }
	 



//print_r($_REQUEST);

	//$token = $facebook->getSignedRequest();


/*	if ($user) {
	  try {
	  } catch (FacebookApiException $e) {
	    $token = null;
		//$facebook->destroySession();
		//session_destroy();
		//$facebook = null;
	  }
	}
*/
?>

<html>
<head>
<meta http-equiv="Content-Type" charset="UTF-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript">
function closeWindow(){
	//window.parent.callback('cb:<?php echo $token; ?>');
	window.opener.callback('<?php echo $return; ?>');
	//console.log('cb:<?php echo $token; ?>');
	window.close();
	//$('.tbox,.tmask',parent.document).stop().animate({opacity:'0'});
	//window.parent.
}
</script>
</head>

<body onload="closeWindow()">
<h2>ログインが完了しました。</h2>
<p>このウィンドウは、通常自動的に閉じられます。</p>
<p>もしこのウィンドウが表示され続ける場合、このページを閉じて、元のウィンドウを更新して下さい。</p>
</body>
</html>