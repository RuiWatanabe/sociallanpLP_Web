
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
</head>
<body>
<h2>ソーシャルランプのデータベースの『Visiter』テーブルの中身を表示しています。</h2>
<p>末端のユーザーが、設置者のソーシャルランプでコネクトしたとき、そのユーザー情報がVisiterテーブルの中に入ります。</p>
<p>コネクトする度に、そのユーザーの情報が最新のものに上書きされます。</p>
<p>アカウント名@facebook.comというアドレスで、Facebookメッセージが送れます。</p>
<p><a href='http://hirayamaru.info/sociallanpWeb/' target='_blank'>こちら</a>から、コネクトのテストをすることができます。</p>

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


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=114404745379200";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>

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

</body>
</html>
