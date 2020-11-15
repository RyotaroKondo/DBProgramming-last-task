<?php  
	session_start();

	// DBとの接続
	include_once 'dbconnect.php';

	if(!isset($_SESSION['user'])) {
	  //ログインしていない場合は、ログインページへリダイレクト
	  header('Location: index.php');
	}

	//SQL命令文を$queryへ代入
	$query = "SELECT * FROM search";// ユーザーIDをキーにDBからユーザー情報を取得

	//$queryを実行
	$result = $mysqli->query($query);

	if (!$result) {
	  print('クエリーが失敗しました。' . $mysqli->error);
	  $mysqli->close();
	  exit();
    }
    
	
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>店舗一覧画面</title>
</head>
<body>
<h1>名古屋市の店舗一覧</h1>
<ul>
 <?php
  foreach($result as $row){
	    $address = $row['address'];
        $jannru = $row['jannru'];
        echo "<li>店名：".$row['name']." 住所：".$row['address']." ジャンル：".$row['jannru'];
    }
    $result->close();
    ?>
    
  <br><br>

</ul>

<br>
<a href="home.php">戻る</a>

</body>
</html>
