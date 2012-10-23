<?php
	require_once "../database.php";
	
	$sql = "SELECT ID FROM ".DB_NAME.".User LIMIT 0,30 ;";
	$result = mysql_query($sql);
	
	while ($row = mysql_fetch_assoc($result)) {
		echo '<li><img src="https://graph.facebook.com/'.$row['ID'].'/picture"></li>';	
	}
?>