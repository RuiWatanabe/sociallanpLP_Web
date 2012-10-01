<?php
/*
ユーザーの登録認証用。
ユーザーのメールアドレスがデータベースにあるかを確認し、ある場合はCodeを、なければfalseを返す。
*/

header("Access-Control-Allow-Origin: *");
require "database.php";

$mail = $_POST['mail'];
$code = md5($mail);


//require_once('sdk/twitteroauth.php');
//require_once('sdk/config.php');
///header('Content-type:text/plain; charset=utf-8');


$sql = "SELECT * FROM ".DB_NAME.".State WHERE Code LIKE '$code' LIMIT 0, 1;";
//$sql = "SELECT TimeStamp FROM ".DB_NAME.".ReaderTable WHERE User LIKE '$user' ORDER BY TimeStamp DESC LIMIT 0, 1 ";

$result = mysql_query($sql);


	if(!$result){
		//echo '【DB検索エラー】: ' . mysql_error();
		//print_r(mysql_num_rows($result));
		echo "false:".mysql_error();
	}else{ //検索できた場合
		//print_r(mysql_num_rows($result));
		$data = mysql_fetch_assoc($result);
		if($data['Code']==$code){
				$sql = "UPDATE ".DB_NAME.".State SET `Auth` = 'TRUE' WHERE Code LIKE '$code' ;";
				mysql_query($sql);
			echo $data['Code'];
		}else
			echo "false";
	}

/*


		//ラベル名に対応するテーブルの存在確認
		$sql = "show tables from ".DB_NAME;
		$result = mysql_query($sql);
		
		if (!mysql_num_rows($result)) {	
		//存在しない場合は、テーブルを作成。
		$sql = "CREATE TABLE ".DB_NAME.".AuthTable (`ID` INT NOT NULL AUTO_INCREMENT, `Code` VARCHAR(40) NOT NULL, `TimeStamp` VARCHAR(30) NOT NULL, `DownLoad` VARCHAR(10), `Auth` VARCHAR(10) , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
		$result = mysql_query($sql);
			if(!$result)echo '【DB作成エラー】: ' . mysql_error();
		}
		
		
		//データベースにユーザー情報を格納
$sql = "INSERT INTO ".DB_NAME.".AuthTable (`ID`, `Code`, `DownLoad`, `TimeStamp`,`Auth`) VALUES (NULL, '$code', 'TRUE', '$timeStamp','FALSE');";
//$sql = "INSERT INTO ".DB_NAME.".AuthTable (`AuthCode`,`Name`) VALUES (`$auth`,`$name`);";

$result = mysql_query($sql);
	if(!$result)
		echo '【DB挿入エラー】: ' . mysql_error().":".$sql;
	else{ //挿入に成功した場合,ダウンロードを開始
		header('Content-Type: application/octet-stream'); 
		header('Content-Disposition: attachment; filename="sociallanp.zip"'); 
		header('Content-Length: '.filesize('sociallanp.zip'));
		readfile("sociallanp.zip"); 
	}
*/


?>