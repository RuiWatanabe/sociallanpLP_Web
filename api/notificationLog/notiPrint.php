<!DOCTYPE html>
<html lang="ja" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
	<script type="text/javascript" src="http://sociallanp.lastlanp.jp/admin/lib/printLogSystem.js"></script>

</head>

	

<body>
<script type="text/javascript">
/*
$(document).ready(function(){
	getList();
});


function getList(){
		$.ajax({
		type: "POST",
		url: "lib/notiList.php",
		success: function(data){
		for(var i in data){
			set(data[i],i);
		}
		setTimeout(function(){getList()},data.length*10000);
	}
	});
}

function set(data,time){
	setTimeout (function(){telop(data)},time*10000);
}

function telop(data){
	$(".alert").slideUp(1000,function(){
		$(".alert").text("");
		$(".alert").append(data);
		$(".alert").slideDown(1000);
	});	
}

*/
</script>
<div class="text"></div>

<div class="alert" style="display:none">
</div>

</body>

</html>