<?php
	require_once "../database.php";
	
	$sql = "SELECT ID FROM ".DB_NAME.".User LIMIT 0,20 ;";
	$result = mysql_query($sql);
	$list = array();
	
	while ($row = mysql_fetch_assoc($result)) {
		array_push($list,$row['ID']);	
		//array_push()echo '<li><img src="https://graph.facebook.com/'.$row['ID'].'/picture"></li>';	
	}
	
	header('Content-type: application/json');
	echo json_encode($list);

	//print_r($list);
?>