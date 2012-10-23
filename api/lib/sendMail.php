<?php
	mb_language("Ja") ;
	mb_internal_encoding("UTF-8");
	$mail=$_REQUEST['mail'];
	$body = $_REQUEST['body'];
	$name = $_REQUEST['name'];
	
	$body .= "\n\n ---------- \n このメッセージは、ランディングページのコンタクトフォームから送信されています。\n http://sociallanp.lastlanp.jp/wp/";

	$mailto = "hira@lastlanp.co.jp";	
	$subject="WP SocialLanp コンタクトメッセージ";
	$mailfrom="From:" .mb_encode_mimeheader(" $name ") ."< $mail >";

	$re = mb_send_mail($mailto,$subject,$body,$mailfrom);
	print_r($re);
?>