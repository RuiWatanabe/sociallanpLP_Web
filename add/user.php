<?php

require_once "database.php";
//require_once('sdk/twitteroauth.php');
//require_once 'config.php';
///header('Content-type:text/plain; charset=utf-8');


//登録フォームの送信ボタンを押したときに
//ソーシャルランプのDBにユーザー情報を格納する
//ダウンロード時のユーザー識別に利用される

//ラベル名に対応するテーブルの存在確認
/*
    [mail] => 
    [name] => 
    [username] => snghrym
    [location] => Atsugi-shi, Kanagawa, Japan
    [gender] => 男性
    [realname] => Shingo Hirayama
    [code] => d41d8cd98f00b204e9800998ecf8427e
    [PHPSESSID] => ec7a69e95d947cedf4c477499c156139
    */
$id = $_REQUEST['id'];
$mail = $_REQUEST['d'][0];
$name = $_REQUEST['d'][1];
$screen_name = $_REQUEST['d'][4];
//$fbname = $_REQUEST['d'][1];
$location = $_REQUEST['d'][6];
$gender = $_REQUEST['d'][5];
$code = $_REQUEST['d'][3];
$timeStamp = time();

print_r($_REQUEST);
/*
$sql = "show tables from ".DB_NAME."like User";
$result = mysql_query($sql);
//$data = $mysql_num_rows($result);

//print_r(" $sql : $result : $data ");

//$sql = "show tables from ".DB_NAME;

//print_r($result);


if (!mysql_num_rows($result)) {	
//存在しない場合は、テーブルを作成。
$sql = "CREATE TABLE ".DB_NAME.".User (`ID` INT NOT NULL AUTO_INCREMENT, `Code` VARCHAR(40) NOT NULL, `Mail` VARCHAR(100) NOT NULL,`Name` VARCHAR(30) NOT NULL,  `ScreenName` VARCHAR(30) NOT NULL, `FBName` VARCHAR(30) NOT NULL, `Location` VARCHAR(100) NOT NULL, `Gender` VARCHAR(5) NOT NULL, `TimeStamp` VARCHAR(30) NOT NULL,  PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
$result = mysql_query($sql);
	if(!$result)echo '【DB作成エラー】: ' . mysql_error();
}

*/		
		//データベースにユーザー情報を格納
$sql = "INSERT INTO ".DB_NAME.".User (ID, Code, Mail,Name,ScreenName,Location,Gender,TimeStamp) VALUES ('$id', '$code','$mail','$name', '$screen_name','$location','$gender','$timeStamp');";
//$sql = "INSERT INTO ".DB_NAME.".AuthTable (`AuthCode`,`Name`) VALUES (`$auth`,`$name`);";

$result = mysql_query($sql);
	if($result)
		echo "True";
	else
		echo '【DB挿入エラー】: ' . mysql_error().":".$sql;
	//else{ //挿入に成功した場合,ダウンロードを開始
		//header('Content-Type: application/octet-stream'); 
		//header('Content-Disposition: attachment; filename="sociallanp.zip"'); 
		//header('Content-Length: '.filesize('sociallanp.zip'));
		//readfile("sociallanp.zip"); 
	//}*/

?>