<?php
header("Access-Control-Allow-Origin: *");

require_once "database.php";


//現在時刻〜一時間前の情報を取得


$returnData = array();

$gettime = strtotime("-12 hour");
$sql = "SELECT * FROM ".DB_NAME.".Log WHERE TIME >= $gettime  LIMIT 0, 30;";
$result = mysql_query($sql);
$data = mysql_fetch_assoc($result);

while ($row = mysql_fetch_assoc($result)) {
//	print_r($row);
	//print_r(date("Y年m月j日 H時i分",$row['Time']));


$log = $row['LogID'];
$user =$row['UserID']; 
$entrance = $row['Entrance'];
$time = date("【m月j日 H時i分】",$row['Time']);
$type = $row['Type'];

$info = json_decode(file_get_contents("https://graph.facebook.com/".$user));
//print_r($info);
//$user = $info=>id;
$name = $info->name;
$link = $info->link;
//$name = '<a target="_blank" href="'.$link.'">'.$name.'</a>';

//if($entrance) $ent = 'ドメイン <a target="_blank" href="http://'.$entrance.'">'.$entrance.'</a> に設置されたソーシャルランプを使いました。';
if($entrance) $ent = 'ソーシャルランプを使いました。';
else if($type=="Regist") $ent = "ユーザー登録しました。";

//if($type=="Post") $move ="記事の続きを読みました。" ;
//else $move ="ユーザー登録しました。";
	
array_push($returnData,"$time $name さんが、 $ent $move");
}


	header('Content-type: application/json');
	echo json_encode($returnData);

//print_r(date("Y年m月j日 H時i分",strtotime("-1 hour")));
//echo strtotime("-1 hour");
?>