
<?php 

	// DBとの接続
    include_once 'dbconnect.php';
    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>名古屋市の飲食店追加画面</title>
</head>
<body>
<?php
if(isset($_POST['signup'])) { // 登録ボタンが押下されたときに実行


$name = $mysqli->real_escape_string($_POST['name']);
$address = $mysqli->real_escape_string($_POST['address']);
$jannru = $mysqli->real_escape_string($_POST['jannru']);


//SQL命令文を$queryへ代入
$query = "INSERT INTO search(name,address,jannru) VALUES('$name','$address','$jannru')";

//$queryを実行
if($mysqli->query($query)) {  ?>
    <div role="alert">登録しました</div>
<?php } else { ?>
    <div role="alert">エラーが発生しました。</div>
<?php
}
}
?>
  
<h1>名古屋市の飲食店の追加</h1>
<ul>
<form method="post">
		<dl>
			<dt><label for="q1">店舗名</label></dt>
            <dd><input type="text" name="name" id="q1" size="30" required></dd>
            <br>
			<dt><label for="q2">店舗のある場所</label></dt>
			<dd><select name="address" id="q4">
				<option value="" selected required>選択してください</option>
				<option value="緑区">緑区</option>
				<option value="中川区">中川区</option>
				<option value="守山区">守山区</option>
				<option value="千種区">千種区</option>
				<option value="天白区">天白区</option>
				<option value="名東区">名東区</option>
				<option value="北区">北区</option>
				<option value="西区">西区</option>
				<option value="港区">港区</option>
				<option value="南区">南区</option>
				<option value="中村区">中村区</option>
				<option value="昭和区">昭和区</option>
				<option value="瑞穂区">瑞穂区</option>
				<option value="中区">中区</option>
				<option value="東区">東区</option>
				<option value="熱田区">熱田区</option>
				
            </select></dd>
            <br>
            <dt><label for="q3">飲食店のジャンル</label></dt>
			<dd><select name="jannru" id="q3">
				<option value="" selected required>選択してください</option>
				<option value="和食">和食</option>
				<option value="洋食・西洋料理">洋食・西洋料理</option>
				<option value="中華">中華</option>
				<option value="アジア・エスニック">アジア・エスニック</option>
				<option value="カレー">カレー</option>
				<option value="焼肉">焼肉</option>
				<option value="鍋">鍋</option>
				<option value="居酒屋">居酒屋</option>
				<option value="ファミレス">ファミレス</option>
				<option value="ラーメン">ラーメン</option>
				<option value="カフェ">カフェ</option>
				
            </select></dd>
            <br>
		</dl>
        <button type="submit" name="signup">登録</button>
        <a href="home.php">戻る</a>
	</form>

</ul>
</body>
</html>
