<?php
header("Access-Control-Allow-Origin: *");

require_once "database.php";

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
	$sql = "INSERT INTO ".DB_NAME.".Visiter (ID, Code, Mail,FBMail,Name,ScreenName,Location,Gender,TimeStamp) VALUES ('$id', '$code','$fbmail','$fbmail','$name', '$screen_name','$location','$gender','$timeStamp');";
	
	$result = mysql_query($sql);
		print_r ('<br>'.mysql_error().":".$sql);
}

?>