<?php
header("Access-Control-Allow-Origin: *");


require_once "database.php";

$employ = $_REQUEST['user']['work']['0']['employer']['name'].$_REQUEST['user']['work']['0']['position']['name'];
if(!$employ) $employ = $_REQUEST['user']['education']['1']['school']['name'];
if(!$employ) $employ = $_REQUEST['user']['education']['0']['school']['name'];

$screen_id = $_REQUEST['user']['id'];
$employ = $employ;
$entrance_name = $_REQUEST['entranceName'];
$entrance_id = $_REQUEST['entranceID'];

if(isset($_REQUEST['user']['email']))
	$fbmail = $_REQUEST['user']['email'];

$name = $_REQUEST['user']['name'];
$screen_name = $_REQUEST['user']['username'];
$location = $_REQUEST['user']['location']['name'];
$gender = $_REQUEST['user']['gender'];
//$timeStamp = time();
$addTime = date("Y/m/d H:i");


//既に登録されているかを確認
print_r($screen_id);
$sql = "SELECT * FROM ".DB_NAME.".Visiter WHERE ID LIKE '$screen_id' LIMIT 0, 1;";
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
	$sql = "UPDATE ".DB_NAME.".Visiter SET Count = Count+1, EntranceID = '$entrance_id',EntranceName = '$entrance_name', ScreenName = '$screen_name',Location = '$location',entranceID = '$entrance_id',entranceName = '$entrance_name',Mail = '$fbmail', UpTime = '$addTime' WHERE `Visiter`.`ID` = '$screen_id' LIMIT 1;";
	$result = mysql_query($sql);
		print_r ('<br>'.mysql_error().":".$sql);
}
else{
	//データベースにユーザー情報を格納
	$sql = "INSERT INTO ".DB_NAME.".Visiter (ID, Mail,Name,ScreenName,Location,Gender,Employ,EntranceID,EntranceName,AddTime,UpTime) VALUES ('$screen_id','$fbmail','$name', '$screen_name','$location','$gender','$employ','$entrance_id','$entrance_name','$addTime','$addTime');";
	
	$result = mysql_query($sql);
		print_r ('<br>'.mysql_error().":".$sql);
}

//print_r($_SESSION);
?>