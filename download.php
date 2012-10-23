
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<title>ソーシャルランプ ダウンロードページ</title>

<style>
	p{
		text-align: center;
		color: red;
		font-weight: bold;
	}
</style>

</head>

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
$sql = "SELECT AddTime FROM ".DB_NAME.".User WHERE `Code` LIKE '$code';";
$result = mysql_query($sql);

if($result){
	$data = mysql_fetch_assoc($result);
	$timestamp = strtotime($data["AddTime"]);
	
	if($timestamp>1){	
		$limit = date(' m月d日 H時i分', $timestamp+86400 );
	}
}
else{
	print_r("正常に会員登録されていません。");
	//print_r($data);
	//break;
}

//リミットを超えていない場合、ダウンロード開始
if($nowtime < $timestamp+86400){ ?>

<body onLoad="location.href='web-sociallanp.zip'">

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