<?php
	//DB関連
	//require "config.php";

/* ▼データベースの設定 */
//データベースのホスト名
define('DB_HOST','o3201-539.kagoya.net');
//データベース名
define('DB_NAME','social');
//データベースのユーザー名
define('DB_USER','kir018499');
//データベースのパスワード
define('DB_PASS','lp777');


	$db_host = DB_HOST;
	$db_name = DB_NAME;
	$db_user = DB_USER;
	$db_pass = DB_PASS;
 
	//mysqlへ接続オープン
	$link = mysql_connect($db_host,$db_user,$db_pass);
	//エラー処理
	if(!$link){
		die('データベース接続エラー: ' . mysql_error());
		exit(0);
	}
 
	//文字セット設定
	mysql_set_charset('utf8');
 
	//DB選択
	$select_db = mysql_select_db($db_name,$link);
	//エラー処理
	if(!$select_db){
		die('データベース選択エラー: ' . mysql_error());
		exit(0);
	}
?>