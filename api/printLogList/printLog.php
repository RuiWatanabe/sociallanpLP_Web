<?php
require_once "../database.php";

$sql = "SELECT * FROM ".DB_NAME.".Log ORDER BY LogID DESC LIMIT 0,30;";
$result = mysql_query($sql);


$infoList = array();

while ($row = mysql_fetch_assoc($result)) {



$log = $row['LogID'];
$user =$row['UserID']; 
$entrance = $row['Entrance'];
$time = date("Y年m月j日 H時i分",$row['Time']);
$type = $row['Type'];

if(!isset($userList["$user"])){
	$info = json_decode(file_get_contents("https://graph.facebook.com/".$user));
	$userList["$user"]=$info;
	}
else $info=$userList["$user"];
//print_r($info);
//$user = $info=>id;
$name = $info->name;
$link = $info->link;
$name = '<a target="_blank" href="'.$link.'">'.$name.'</a>';

if($entrance) $ent = 'ドメイン <a target="_blank" href="http://'.$entrance.'">'.$entrance.'</a> に設置されたソーシャルランプを使いました。';
else if($type=="Regist") $ent = "ユーザー登録しました。";

//if($type=="Post") $move ="記事の続きを読みました。" ;
//else $move ="ユーザー登録しました。";
	

echo "<li>";
echo "【ログID: $log 】（$time ） $name さんが、 $ent $move";

echo "</li>";

}

//print_r($userList);
?>