<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title>注意</title>
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
		table {
			border-collapse: collapse;
			margin-top: 10px;
			width: 100%;
			border: 1px solid #555;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #555;
		}
		th {
			background-color: #333;
			color: white;
		}
		form {
			padding: 10px;
			border: solid 2px #000000;
			margin-top: 10px;
		}
		form input[type="text"], form input[type="submit"] {
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
	</style>
</head>
<body>
	<div class="container">
		<a href="index.php"><button>前のページへ戻る</button></a>
		<br>
		<h2>注意事項</h2>
		<p>
			文字を入力して送信する時、自動で&lt;p&gt;&lt;/p&gt;で覆われて表示されます。
		</p>
		<p>
			&lt;や&gt;、&quot;を入力したいときは以下の文字列を変わりに入力してください。
		</p>
		<table>
			<tr>
				<th>表示させたい文字</th>
				<th>代わりに打つ文字</th>
			</tr>
			<tr>
				<td>&amp;</td>
				<td>&amp;mp;</td>
			</tr>
			<tr>
				<td>&lt;</td>
				<td>&amp;lt;</td>
			</tr>
			<tr>
				<td>&gt;</td>
				<td>&amp;gt;</td>
			</tr>
			<tr>
				<td>&quot;</td>
				<td>&amp;uot;</td>
			</tr>
			<tr>
				<td>&apos;</td>
				<td>&amp;apos;</td>
			</tr>
		</table>
		<p>悪意のあるコードや、重くなるスクリプト、HTML4で再生できないコンテンツは入れないでください。</p>
		<h2>ここにスクリプトを入力すれば、チャット欄に送信できます。</h2>
		<p>&lt;img src="./example.jpg" width=200px&gt;って感じで入れてください</p>
		<p>画像は横200pxまで</p>
		<form action="inputscriptforpublic.php" method="post">
			<span>名前　　　 </span><input type="text" size="10" autocomplete="name" name="name" value="<?php ini_set('display_errors', 0); echo $_COOKIE['username']; ?>"><br>
			<span>スクリプト </span><input type="text" size="30" autocomplete="no" name="maintext">
			<input type="submit" value="送信" name="mode">
		</form>
	</div>
</body>
</html>
