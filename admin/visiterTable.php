
<?php

require_once "database.php";


//既に登録されているかを確認
$sql = "SELECT * FROM ".DB_NAME.".Visiter;";
$result = mysql_query($sql);
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>

<h2>ソーシャルランプのデータベースの『Visiter』テーブルの中身を表示しています。</h2>
<table border=1>

<tr>

<th>ID</th>
<th>アカウント名</th>
<th>名前</th>
<th>メールアドレス</th>
<th>現住地</th>
<th>性別</th>
<th>職歴・学歴</th>
<th>初回コネクト日</th>
<th>最終コネクト日</th>
<th>最終取得元アプリID</th>
<th>最終取得元ドメイン</th>
<th>コネクト回数</th>

</tr>
<?php


while ($row = mysql_fetch_assoc($result)) {

echo "<tr>";

echo "<td>".$row['ID']."</td>";
$sc = $row['ScreenName'];
echo "<td><a target=_blank href=https://www.facebook.com/$sc>".$row['ScreenName']."</a></td>";
echo "<td>".$row['Name']."</td>";
echo "<td>".$row['Mail']."</td>";
echo "<td>".$row['Location']."</td>";
echo "<td>".$row['Gender']."</td>";
echo "<td>".$row['Employ']."</td>";
echo "<td>".$row['AddTime']."</td>";
echo "<td>".$row['UpTime']."</td>";
$eid = $row['EntranceID'];
echo "<td><a target='_blank' href='https://developers.facebook.com/apps/$eid'>".$row['EntranceID']."</a></td>";
echo "<td>".$row['EntranceName']."</td>";
echo "<td>".$row['Count']."回</td>";

echo "</tr>";
}?>


</table>
<p><a href='http://hirayamaru.info/sociallanpWeb/' target='_blank'>こちら</a>から、コネクトのテストをすることができます。</p>




<br>
<h2>ソーシャルランプのデータベースの『User』テーブルの中身を表示しています。</h2>

<?php
$sql = "SELECT * FROM ".DB_NAME.".User;";
$result = mysql_query($sql);
?>

<table border=1>

<tr>

<th>ID</th>
<th>アカウント名</th>
<th>名前</th>
<th>メールアドレス</th>
<th>メールアドレス(FB)</th>
<th>コード(IDを暗号化したもの)</th>
<th>現住地</th>
<th>性別</th>
<th>職歴・学歴</th>
<th>ユーザー登録日</th>

</tr>
<?php


while ($row = mysql_fetch_assoc($result)) {

echo "<tr>";

echo "<td>".$row['ID']."</td>";
echo "<td><a target=_blank href=https://www.facebook.com/$sc>".$row['ScreenName']."</a></td>";
echo "<td>".$row['Name']."</td>";
echo "<td>".$row['Mail']."</td>";
echo "<td>".$row['FBMail']."</td>";
echo "<td>".$row['Code']."</td>";
echo "<td>".$row['Location']."</td>";
echo "<td>".$row['Gender']."</td>";
echo "<td>".$row['Employ']."</td>";
echo "<td>".$row['AddTime']."</td>";

echo "</tr>";
}?>


</table>




<br>
<h2>ソーシャルランプのデータベースの『Log』テーブルの中身を表示しています。（最新30件)
</h2>

<ul id="log">
<script type="text/javascript">
$(document).ready(function(){

	
	$("#log").append('<img src="lib/load.gif">');
	$.ajax({
		type: "POST",
		url: "lib/printLog.php",
		success: function(_data){
			console.log(_data);
			$("#log").text("");
			$("#log").append(_data);
		}
	});

});

</script>




</body>
</html>
