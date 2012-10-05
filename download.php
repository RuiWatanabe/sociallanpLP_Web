<?php
require "admin/database.php";

$code = $_REQUEST['code'];
$nowtime = strtotime("now");

$dlflag = false;
//echo "<br>".$limit;
//echo date(' m月d日 H時i分', $limit );
//require_once('sdk/twitteroauth.php');
//require_once('sdk/config.php');
///header('Content-type:text/plain; charset=utf-8');


//ラベル名に対応するテーブルの存在確認
/*
$sql = "show tables from ".DB_NAME;
$result = mysql_query($sql);

if (!mysql_num_rows($result)) {	
//存在しない場合は、テーブルを作成。
$sql = "CREATE TABLE ".DB_NAME.".AuthTable (`ID` INT NOT NULL AUTO_INCREMENT, `Code` VARCHAR(40) NOT NULL, `TimeStamp` VARCHAR(30) NOT NULL, `Auth` VARCHAR(10) , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
$result = mysql_query($sql);
	if(!$result)echo '【DB作成エラー】: ' . mysql_error();
}
*/




//メールに添付されているCodeが、データベースに格納されているものかどうかを調べる
$sql = "SELECT TimeStamp FROM ".DB_NAME.".User WHERE `Code` LIKE '$code';";
$result = mysql_query($sql);

if($result){
	$data = mysql_fetch_assoc($result);
	$timestamp = $data["TimeStamp"];
	
	if($timestamp>1){	
		$limit = date(' m月d日 H時i分', $timestamp+86400 );
	}
}
else{
	print_r("正常に会員登録されていません。");
	break;
}

//リミットを超えていない場合、ダウンロード開始
if($nowtime < $timestamp+86400){
	$dlflag= true;
	
	//header('Content-Type: application/octet-stream'); 
	//header('Content-Disposition: attachment; filename="sociallanp.zip"'); 
	//header('Content-Length: '.filesize('sociallanp.zip'));
	//readfile("sociallanp.zip"); 	


	//stateテーブルにユーザー情報があるかどうかを確認する
	$sql = "SELECT * FROM ".DB_NAME.".State WHERE `Code` LIKE '$code';";
	$result = mysql_query($sql);
	$data = mysql_fetch_assoc($result);
	

	//なければ、データベースにユーザー情報を格納
	if(!$data){
		$sql = "INSERT INTO ".DB_NAME.".State (ID, Code, Download) VALUES (NULL, '$code', 'True');";
		$result = mysql_query($sql);
		//print_r("new:".$result);
		//$sql = "INSERT INTO ".DB_NAME.".AuthTable (`AuthCode`,`Name`) VALUES (`$auth`,`$name`);";
	}
	else{
		//UPDATE  `social`.`State` SET  `Download` =  'Trueed' WHERE  `State`.`ID` =1 LIMIT 1 ;
		$sql = "UPDATE ".DB_NAME.".State SET Download = 'True' WHERE 'State'.'Code' = '$code';";
		$result = mysql_query($sql);
		//print_r("up".$result);
	}
	//$data = mysql_fetch_assoc($result);
	//$timestamp = $data["TimeStamp"];


	//$sql = "INSERT INTO ".DB_NAME.".State (ID, Code, TimeStamp,Auth) VALUES (NULL, '$code', '$timeStamp','FALSE');";
	//$result = mysql_query($sql);


}
/*
if($result){
	
	
	$result = mysql_query($sql);
		if(!$result)
			echo '【DB挿入エラー】: ' . mysql_error().":".$sql;
		else{ //挿入に成功した場合,ダウンロードを開始
			header('Content-Type: application/octet-stream'); 
			header('Content-Disposition: attachment; filename="sociallanp.zip"'); 
			header('Content-Length: '.filesize('sociallanp.zip'));
			readfile("sociallanp.zip"); 
		}

}
	else echo '【DB検索エラー】: ' . mysql_error();
*/



//print("http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

/*
$sql = "SELECT * FROM ".DB_NAME.".AuthTable WHERE `AuthCode` LIKE `$code`;";
//$sql = "SELECT TimeStamp FROM ".DB_NAME.".ReaderTable WHERE User LIKE '$user' ORDER BY TimeStamp DESC LIMIT 0, 1 ";

$result = mysql_query($sql);
	if(!$result){
		echo '【DB検索エラー】: ' . mysql_error();
	}else{ //検索できた場合
		print_r(mysql_num_rows($result));
		
	}
*/


//データの挿入
/*
$auth = md5($mail);
$sql = "INSERT INTO ".DB_NAME.".AuthTable (`ID`, `AuthCode`, `UserName`, `TimeStamp`) VALUES (NULL, '$auth', '$name', '$timeStamp');";
//$sql = "INSERT INTO ".DB_NAME.".AuthTable (`AuthCode`,`Name`) VALUES (`$auth`,`$name`);";

$result = mysql_query($sql);
	if(!$result)
		echo '【DB挿入エラー】: ' . mysql_error().":".$sql;
	else{ //挿入に成功した場合
		echo $auth;
	}


?>
*/
/*
header('Content-Type: application/octet-stream'); 
readfile("dl.zip");
*/
?>

<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<title>ソーシャルランプ ダウンロードページ</title>
</head>


<?php if($dlflag==true){ ?>
<body onLoad="location.href='sociallanp.zip'">
<p>自動的にダウンロードが開始します。</p>
<!--
<p>もし自動でダウンロードが開始しない場合、<a href="sociallanp.zip">こちら</a>からダウンロードを行なってください。</p>
-->
<?php }else{ ?>
<body>
<p>ダウンロード期限を過ぎている可能性があるため、ダウンロードできません。</p>

<?php } ?>

<p>このダウンロードリンクは <?php echo $limit; ?> まで有効です。</p>

</body>

</html>