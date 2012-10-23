<?php

function addLog($id,$time,$type,$entrance){
	$time = strtotime($time); //タイムスタンプ形式に変換
	$sql = "INSERT INTO ".DB_NAME.".Log (LogID, UserID,Time,Type,Entrance) VALUES ('NULL','$id', '$time','$type','$entrance');";
	$result = mysql_query($sql);
}

?>