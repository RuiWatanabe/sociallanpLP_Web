<?php
header("Access-Control-Allow-Origin: *");

require_once "database.php";

/*
$screen_id = $_REQUEST['screen_id'];
$employ = $_REQUEST['employ'];
$entrance_name = $_REQUEST['entranceName'];
$entrance_id = $_REQUEST['entranceID'];
$fbmail = $_REQUEST['fbmail'];
$name = $_REQUEST['name'];
$screen_name = $_REQUEST['screen_name'];
$location = $_REQUEST['location'];
$gender = $_REQUEST['gender'];
//$timeStamp = time();
$code = md5($screen_name);
*/

$id = $_REQUEST['id'];
if($id == null || $id == ""){
	exit("ユーザー情報を取得できませんでした。");
}

$mail = $_REQUEST['d'][0];
$name = $_REQUEST['d'][1];
$screen_name = $_REQUEST['d'][4];
$fbmail = $_REQUEST['d'][7];
$location = $_REQUEST['d'][6];
$gender = $_REQUEST['d'][5];
$employ = $_REQUEST['d'][8];
$code = $_REQUEST['d'][3];
$addTime = date("Y/m/d H:i");


//既に登録されているかを確認
print_r($screen_id);
$sql = "SELECT * FROM ".DB_NAME.".User WHERE ID LIKE '$id' LIMIT 0, 1;";
$result = mysql_query($sql);
$data = mysql_fetch_assoc($result);

while ($row = mysql_fetch_assoc($result)) {
	print_r($row);
}
	
//print_r($result);
//echo"data";
//print_r($data);
//echo"data";
//既に登録されている場合、登録情報を更新
if($data){
	$sql = "UPDATE ".DB_NAME.".User SET FBMail = '$fbmail', Employ = '$employ',ScreenName = '$screen_name',Location = '$location',Mail = '$mail', AddTime = '$addTime' WHERE `User`.`ID` = '$id' LIMIT 1;";
	$result = mysql_query($sql);
		print_r ('<br>'.mysql_error().":".$sql);



//Facebookメッセージを送信する
//$user = $u['username'];
//$name = $u['name'];
//$mail = $u['email'];
//$code = md5($u['email']);

	$body= 
	"$name 様
	
	ソーシャルランプへのユーザー登録、ありがとうございます。
	
	あなたの認証用メールアドレス
	$fbmail
	※システムを利用する際に必要になります。
	
	こちらのURLからダウンロードすることができます。
	http://sociallanp.lastlanp.jp/download.php?type=web&code=".$code."
	※上記のダウンロードURLは24時間で失効となりますので、
	お早めのダウンロードをお願いいたします。";
	
	
	mb_language("Ja") ;
	mb_internal_encoding("UTF-8");
	$mailto=$screen_name."@facebook.com";
	$subject="WpSocialLanp: ダウンロードURLの送付";
	$mailfrom="From:" .mb_encode_mimeheader("ラストランプ運営チーム") ."< $fbmail >";
	$re = mb_send_mail($mailto,$subject,$body,$mailfrom);
	
	//print_r("$mailto : $body : $re");
	
	



}
else{
	//データベースにユーザー情報を格納
	$sql = "INSERT INTO ".DB_NAME.".User (ID, Code,Mail,FBMail,Name,ScreenName,Location,Gender,Employ,AddTime) VALUES ('$id', '$code','$mail','$fbmail','$name', '$screen_name','$location','$gender','$employ','$addTime');";
	
	$result = mysql_query($sql);
		print_r ('<br>'.mysql_error().":".$sql);
}



require_once("log.php");
addLog($id,$addTime,"Regist",NULL);






?>