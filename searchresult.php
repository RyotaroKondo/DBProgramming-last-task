
<?php 

// DBとの接続
include_once 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>店舗検索画面</title>
</head>
<body>
<?
//var_dump($_POST);
$sql = "SELECT name, address, jannru FROM search";
if (mb_strlen($_POST["name"]) !== 0) {
    $sql .= " WHERE name = '".$_POST['name']."'";
}
if (mb_strlen($_POST["address"]) !== 0) {
    if (preg_match('#search$#', $sql)) {
        $sql .= " WHERE address = '".$_POST['address']."'";
    } else {
        $sql .= " AND address = '".$_POST['address']."'";
    }
}
if (mb_strlen($_POST["jannru"]) !== 0) {
    if (preg_match('#search$#', $sql)) {
        $sql .= " WHERE jannru = '".$_POST['jannru']."'";
    } else {
        $sql .= " AND jannru = '".$_POST['jannru']."'";
    }
}


//$queryを実行
$result = $mysqli->query($sql);

if (!$result) {
	print('クエリーが失敗しました。' . $mysqli->error);
	$mysqli->close();
	exit();
  }



?>
<table border=1>
<tr><td>店舗名</td><td>住所</td><td>ジャンル</td></tr>
<?php
	foreach ($result as $row) {
		# code.
		echo "<tr><td>".$row['name']."</td><td>".$row['address']."</td><td>".$row['jannru']."</td></tr>";
	}

?>


</table>
<a href="search.html">再検索</a>
<a href="home.php">ホームに戻る</a>
</body>
</html>