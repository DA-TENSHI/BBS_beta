<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title>チャットアーカイブ</title>
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
			max-width: 800px;
			padding: 20px;
			background-color: rgba(0, 0, 0, 0.5);
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
		}
		h2 {
			color: #FF9800;
		}
		a {
			color: #FF9800;
			text-decoration: none;
		}
		a:hover {
			text-decoration: underline;
		}
		hr {
			margin: 20px 0;
			border: none;
			border-top: 1px solid rgba(255, 255, 255, 0.1);
		}
		.log-entry {
			padding-left: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>チャットアーカイブ</h2>
		<a href="index.php">チャットに戻る</a>
		<hr>
		<?php
			$fp = fopen('./date/loglog.txt', 'r');
			$maneof = 0;
			for ($i = 0; !feof($fp); $i++) {
				$line[$i] = fgets($fp);
				$maneof++;
			}
			$maneof--;
			for (; $maneof >= 0; $maneof--) { 
				echo '<div class="log-entry">' . $line[$maneof] . '</div>';
			}
		?>
	</div>
</body>
</html>
