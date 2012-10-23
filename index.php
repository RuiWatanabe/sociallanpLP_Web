<!DOCTYPE html>
<html lang="ja" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<link rel="shortcut icon" href="image/favicon.ico" />

    <meta property="og:title" content="革新的！口コミ拡散ツール【SocialLanp：ソーシャルランプ】の無料ダウンロードはこちら" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://sociallanp.lastlanp.jp/" />
    <meta property="og:image" content="http://sociallanp.lastlanp.jp/image/ogp.png" />
    <meta property="og:site_name" content="SocialLanp -ソーシャルランプ- | 日本が世界で戦うために製造された、究極のマーケティングシステム" />
    <meta property="fb:app_id" content="114404745379200" />
	
	<title>SocialLanp -ソーシャルランプ- | 日本が世界で戦うために製造された、究極のマーケティングシステム</title>
	

	<!-- include -->
	<script type="text/javascript" id="js_socialLanp" src="sl/system.js?http://sociallanp.lastlanp.jp/sl"></script>
	<script type="text/javascript" src="lib/jquery.smoothScroll.js"></script>
	<script type="text/javascript" src="lib/jquery.validate.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css" />

	<script type="text/javascript" src="http://sociallanp.lastlanp.jp/api/printLogSystem.js"></script>





</head>

	

<body>

<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-35744038-1']);
_gaq.push(['_setDomainName', 'lastlanp.jp']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>




<div class="header">
	<div class="content">
	<img src="image/header.png" alt="header" />
	<img class="script" src="image/script.png" alt="offer1"  />

		<a class="dlButton offerbutton" href="#download">
		</a>

<!--
		<a class="dlButton" href="#download" onclick="openLink.click()">
			<img src="image/offerbutton_off_10.png" alt="offerbutton_off_10"  />
		</a>
-->
	</div>

</div><!-- header -->


<div class="content">

<img src="image/2.png" alt="2"  />
<img src="image/2_5.png" alt="2_5" />
<img src="image/3.png" alt="2"  />
<img src="image/4.png" alt="2"  />
<img src="image/5.png" alt="2"  />
<img src="image/6.png" alt="2"  />
<img src="image/7.png" alt="2"  />
<img src="image/8.png" alt="2"  />

<!--
<div class="facepile">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=114404745379200";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div class="fb-login-button" data-show-faces="true" data-width="800" data-size="xlarge" data-max-rows="20"></div>
</div>
-->




<!--
<div class="loadIcon" style="display:none;"><a href="http://sociallanp.lastlanp.jp/" target="_blank"><img class="system" src="system/images/lanp_off.png" /></a><img class="loading" src="system/images/load.gif" /></div>


<div class="download" name="download" id="download">
	<span class="ready"><img src="image/9.png" alt="offer2"  /></span>
	
	<div class="connectFacebook">
		<a id="openLink" href="" target="_blank">
			<div  class="offerbutton"></div>
		</a>
	</div>
	
</div>
-->


<div class="facePileMenu">
	<h3 class="facebookColor">ソーシャルランプをダウンロードした人たち</h3>
	<span class="getAcount"> 
		<a class="facebookColor" href="https://www.facebook.com/" target="_blank">Facebookアカウントをもっていない人はこちら</a>
	</span>
</div>
<ul class="facePile"></ul>
<?php
/*
	require_once "admin/database.php";
	
	$sql = "SELECT ID FROM ".DB_NAME.".User LIMIT 0,30 ;";
	$result = mysql_query($sql);
	
	while ($row = mysql_fetch_assoc($result)) {
		echo '<li><img src="https://graph.facebook.com/'.$row['ID'].'/picture"></li>';	
	}
*/?>
<script type="text/javascript">
	$(document,"ul.facePile").ready(function(){printFace()});
</script>

<div class="download" name="download" id="download">
	<span class="ready"><img src="image/9.png" alt="offer2"  /></span>

	<a class="socialLanp" rel="form" target="_blank"><img src="image/offerbutton_off.png" alt="offerbutton_off"  /></a>
</div>

</div><!-- wrapper -->

</body>

</html>