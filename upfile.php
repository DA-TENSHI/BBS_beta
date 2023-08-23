<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title>ファイルアップローダー</title>
	<style>
		body {
			background-color: #222;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			color: white;
		}
		.container {
			margin: 2% auto;
			max-width: 600px;
			padding: 20px;
			background-color: rgba(0, 0, 0, 0.5);
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
		}
		h2 {
			color: #FF9800;
		}
		form {
			display: flex;
			flex-direction: column;
			margin-top: 10px;
		}
		form input[type="text"], form input[type="file"], form input[type="submit"] {
			padding: 5px;
			margin-bottom: 10px;
			border: none;
			border-radius: 5px;
			background-color: rgba(255, 255, 255, 0.1);
			color: white;
		}
		form input[type="submit"] {
			background-color: #FF9800;
			font-weight: bold;
			cursor: pointer;
		}
		form input[type="submit"]:hover {
			background-color: #FFB74D;
		}
		p {
			padding-left: 5px;
		}
		a {
			color: #FF9800;
			text-decoration: none;
		}
		a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>ファイルアップローダー</h2>
		<form action="./upfile.php" method="POST" enctype="multipart/form-data">
			<span>名前 </span>
			<input type="text" size="10" autocomplete="name" name="name" value="<?php echo $_COOKIE['username']; ?>">
			<input type="file" name="file">
			<input type="submit" value="ファイルをアップロードする">
		</form>
		<?php
		$todaydate = date('n') . "/" . $date . "/" . $hour . ":" . date('i') . ":" . date('s');
		$fp = fopen('./receive/count.txt', "r");
		$count = fgets($fp);
		try {
			if (is_uploaded_file($_FILES['file']['tmp_name'])) {
				$filetype = "." . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
				move_uploaded_file($_FILES['file']['tmp_name'], './receive/' . $count . "-" . $_FILES['file']['name']);
				echo "<p>" . "./receive/" . $count . "-" . $_FILES['file']['name'] . "として保存されました" . "</p>";
				echo '<h2>UP完了</h2>';
				$putting = '<p><span style="color: yellow">' . $_COOKIE['username'] . 'さんが</span><a style="color: yellow" href="' . "./receive/" . $count . "-" . $_FILES['file']['name'] . '" target="_blank" rel="noopener noreferrer">ファイル</a><span style="color: yellow">をUPしました。' . "  " . $todaydate . '</span>' . "</p>" . "\n";
				$count++;
				$filename = fopen('./date/publiclog.txt', "a");
				fputs($filename, $putting);
				fclose($filename);
				$filename = './receive/count.txt';
				$fp = fopen($filename, 'w');
				$data = $count;
				fputs($fp, $data);
				fclose($fp);
			}
		} catch (Exception $e) {
			echo 'エラー:', $e->getMessage() . PHP_EOL;
		}
		?>
		<a href="./index.php">チャットに戻る</a>
	</div>
</body>
</html>
