

<?php
session_start();
require '../config.php';	
require 'sdk/facebook.php';	



   $facebook = new Facebook(array(
         'appId' => APP_ID,
         'secret' => APP_SECRET,
     ));


//ログインをキャンセルした場合の処理
if($_REQUEST['error']){
     //$facebook->destroySession();
     $login = false;
}
else{
    
     $user = $facebook->getUser();
    
     if($user && isset($_REQUEST['code'])&&isset($_REQUEST['state'])){
          $login = $facebook->getAccessToken();
          $u = $facebook->api("/me&locale=ja_JP");
     }
     else{
          $login = false;    
     }
}


//facebookにシェアする
  //$user = $facebook->getUser();
$return = "error";
$userinfo = "";
if($login != false){
            try{
                 
                  //$postdata = str_replace("%title%", $body, POST_FORMAT); //%title%→サイトのタイトル
  		 	
		  		 	if(SAFEMODE != TRUE){
		 	 		 	$facebook->api('/me/feed', 'POST', array('message' => "この無料ツール、かなり凄いです！\n\n何がすごいって、こんな感じでfacebookで口コミがどんどん広がるんです！【ブログを拡散したい】とか【お店にお客さんをたくさん呼びたい】とか【商品をもっと認知させたい】とか【リスト命！】という方は、このツールを使えば一瞬です。一気にお客さんが集まります。\n\nこれからのマーケティングに新しい風を巻き起こしそうな予感です。\n\nツールの設置自体も簡単なのでとりあえずダウンロードしておくことをお勧めします！無料配布期間は今だけみたいなのでお早めに♪" , 'link' => "http://sociallanp.lastlanp.jp/"));
		 	 		 	$return = "true : FaceBookにポストしました。";
		 	 		 	$token = $facebook->getAccessToken();
		  		 	}
		  		 	else{
		 	 		 	$return = "true : セーフモードになっているため、ポストしませんでした。";	  		 	
		  		 	}
           }
             catch(Exception $e){
                 $return = $return." : ポストに失敗しました。:".$login.":".APP_ID;
                }
  }
  else{
      $return = $return." : 正常にログインできていません。";
      //if(!isset($_REQUEST['code'])) $return = $return."リクエストコードが取得できていません。";			      
      //if($facebook->getAccessToken()) $return = $return."APIでアクセストークンが取得できません。";			            
      //$facebook->destroySession();
  }
     
     
     
     
//print_r($facebook->api("/me&locale=ja_JP"));
//print_r($facebook->api("/me&locale=ja_JP"));
//$u = json_encode($u);
//echo "<pre>";
//print_r($u);
//echo "</pre>";
?>

<html>
<head>
<meta http-equiv="Content-Type" charset="UTF-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript">
function closeWindow(){

	//window.parent.callback('<?php echo $token; ?>');
	//console.log("errorMessage:<?php echo $return; ?>");
	window.opener.callback('<?php echo $token; ?>','<?php echo $return; ?>');
	window.close();
	//$('.tbox,.tmask',parent.document).stop().animate({opacity:'0'});
	//window.parent.
}
</script>
</head>

<?php
if(isset($u)){
//ソーシャルランプのDBに情報を格納する
	$url = 'http://sociallanp.lastlanp.jp/add/visiter.php';

	$data = array(
		'user'=> $u,
	    'entranceID' => APP_ID,
	    'entranceName' => $_SERVER["HTTP_HOST"],
	);
	$options = array('http' => array(
	     'method' => 'POST',
	     'content' => http_build_query($data),
	));
	$contents = file_get_contents($url, false, stream_context_create($options));
}
else{
	print_r("ユーザー情報が取得できていません。");
}?>



<body onload="closeWindow()">
<h2>ログインが完了しました。</h2>
<p>このウィンドウは、通常自動的に閉じられます。</p>
<p>もしこのウィンドウが表示され続ける場合、このページを閉じて、元のウィンドウを更新して下さい。</p>
</body>
</html>