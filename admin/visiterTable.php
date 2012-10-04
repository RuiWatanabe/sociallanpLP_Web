<?php

require_once "database.php";


//既に登録されているかを確認
$sql = "SELECT * FROM ".DB_NAME.".Visiter;";
$result = mysql_query($sql);

echo "<h2>ソーシャルランプのデータベースの『Visiter』テーブルの中身を表示しています。</h2>";
echo "<p>末端のユーザーが、設置者のソーシャルランプでコネクトしたとき、そのユーザー情報がVisiterテーブルの中に入ります。</p>";
echo "<p>コネクトする度に、そのユーザーの情報が最新のものに上書きされます。</p>";
echo "<p>アカウント名@facebook.comというアドレスで、Facebookメッセージが送れます。</p>";
echo "<p><a href='http://hirayamaru.info/sociallanpWeb/' target='_blank'>こちら</a>から、コネクトのテストをすることができます。</p>";

echo "<table border=1>";

echo "<tr>";

echo "<th>ID</th>";
echo "<th>アカウント名</th>";
echo "<th>名前</th>";
echo "<th>メールアドレス</th>";
echo "<th>現住地</th>";
echo "<th>性別</th>";
echo "<th>職歴・学歴</th>";
echo "<th>初回コネクト日</th>";
echo "<th>最終コネクト日</th>";
echo "<th>最終取得元アプリID</th>";
echo "<th>最終取得元ドメイン</th>";
echo "<th>コネクト回数</th>";

echo "</tr>";


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

}
echo "</table>";

?>