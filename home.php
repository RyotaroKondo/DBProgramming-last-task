<?php  
	session_start();

	// DBとの接続
	include_once 'dbconnect.php';

	if(!isset($_SESSION['user'])) {
	  //ログインしていない場合は、ログインページへリダイレクト
	  header('Location: index.php');
	}

	//SQL命令文を$queryへ代入
	$query = "SELECT * FROM users WHERE user_id=".$_SESSION['user']."";// ユーザーIDをキーにDBからユーザー情報を取得

	//$queryを実行
	$result = $mysqli->query($query);

	if (!$result) {
	  print('クエリーが失敗しました。' . $mysqli->error);
	  $mysqli->close();
	  exit();
	}

	while ($row = $result->fetch_assoc()) {
	  $username = $row['username'];
	  $email = $row['email'];
	  $birth_year = $row['birth_year'];
	}

	// データベースの切断
	$result->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ログイン後のマイページ画面</title>
</head>
<body>
<h1>会員・名古屋市の飲食店一覧システム</h1>
<h2>プロフィール</h2>
<ul>
  <li>名前：<?php echo $username; ?></li>
  <li>メールアドレス：<?php echo $email; ?></li>
  <li>誕生年：<?php echo $birth_year; ?></li>
  <br><br>

</ul>
<h3>店舗一覧</h3>
<ul>
<a href="allshop.php">店舗の一覧はこちらから</a>
</ul>
</ul>
<h2>検索</h2>
<ul>
<a href="search.html">店舗の検索はこちらから</a>
</ul>
</ul>
<h4>店舗の追加</h4>
<ul>
<a href="addto.php">店舗の追加はこちらから</a>
</ul>
</ul>
<br><br>
<a href="logout.php?logout">ログアウト</a>
<a href="logout.php?logout&delete" onclick="window.alert('本当に退会しますか？');">会員退会</a>
</body>
</html>
