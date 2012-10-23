<?php
header("Access-Control-Allow-Origin: *");

require_once "../database.php";


//現在時刻〜一時間前の情報を取得
$alreadyData = array();
$returnData = array();

//$gettime = strtotime("today");
$ran = mt_rand(10,30);
//$gettime = strtotime("-2 day");
//$sql = "SELECT * FROM ".DB_NAME.".Log WHERE Time >= $gettime GROUP BY UserID ORDER BY RAND() LIMIT 0, $ran;";
//$sql = "SELECT * FROM ".DB_NAME.".Log GROUP BY UserID,Type ORDER BY RAND() LIMIT 0, $ran;";
//$sql = 'SELECT * FROM `Log` f1 WHERE Time = (SELECT Max(Time) FROM `Log` f2 WHERE f1.UserID = f2.UserID AND f1.Type = f2.Type)';
$sql = "SELECT * FROM ".DB_NAME.".Log f1 WHERE Time = (SELECT Max(Time) FROM ".DB_NAME.".Log f2 WHERE f1.UserID = f2.UserID AND f1.Type = f2.Type) ORDER BY Time DESC LIMIT 0, $ran;";

//$sql = "SELECT * FROM ".DB_NAME.".Log GROUP BY UserID,Type ORDER BY Time DESC LIMIT 0, $ran;";
//$sql = "SELECT * FROM ".DB_NAME.".Log ORDER BY Time DESC LIMIT 0, $ran;";
$result = mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {
//	print_r($row);
	//print_r(date("Y年m月j日 H時i分",$row['Time']));

$log = $row['LogID'];
$user =$row['UserID']; 
$time = date("（m/j H:i）",$row['Time']);

//if(in_array($user,$alreadyData)) continue;
//else array_push($alreadyData,$user);

$entrance = $row['Entrance'];
$type = $row['Type'];
//$time = date("【m月j日 H時i分】",$row['Time']);

$info = json_decode(file_get_contents("https://graph.facebook.com/".$user));
//print_r($info);
//$user = $info=>id;
$name = $info->name;
$link = $info->link;
//$name = '<a target="_blank" href="'.$link.'">'.$name.'</a>';

//if($entrance) $ent = 'ドメイン <a target="_blank" href="http://'.$entrance.'">'.$entrance.'</a> に設置されたソーシャルランプを使いました。';
if($type=="Post") $move = 'ソーシャルランプを使いました。';
else if($type=="Regist") $move = "ユーザー登録しました。";

//if($type=="Post") $move ="記事の続きを読みました。" ;
//else $move ="ユーザー登録しました。";
	
array_push($returnData,"『 $name 』さんが、".$move.$time);
}

header('Content-type: application/json');
echo json_encode($returnData);

//print_r(date("Y年m月j日 H時i分",strtotime("-1 hour")));
//echo strtotime("-1 hour");
?>