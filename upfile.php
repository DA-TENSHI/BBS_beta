<title>ファイルアップローダー</title>
<body>
<?php
$hour = date('H');
$date = date('d');
$hour += 8;
if ($hour > 23) {
	$date += 1;
	$hour -= 24;
}
ini_set("display_errors", "Off");
echo '<form action="./upfile.php" method="POST" enctype="multipart/form-data"><span>名前 </span><input type="text" size="10" autocomplete="name" name="name" value="';
echo $_COOKIE['username'];
echo '"><span> </span><input type="file" name="file"><input type="submit" value="ファイルをアップロードする"></form>';
$todaydate = date('n') . "/" . $date . "/" . $hour . ":" . date('i') . ":" . date('s');
$fp = fopen('./receive/count.txt', "r");
$count =  fgets($fp);


try{
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
			
				$filetype = ".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	        	move_uploaded_file($_FILES['file']['tmp_name'], './receive/'.$count."-".$_FILES['file']['name']);
            	echo "<p>"."./receive/".$count."-".$_FILES['file']['name']."として保存されました"."</p>";
				echo '<h2>UP完了</h2>';
				//log
            	$putting='<p><span style="color:yellow">'.htmlspecialchars($_COOKIE['username'], ENT_QUOTES|ENT_HTML5, "UTF-8").'さんが</span><a style="color:yellow" href="'."./receive/".$count."-".$_FILES['file']['name'].'"target="_blank" rel="noopener noreferrer">ファイル</a><span style="color:yellow">をUPしました。'."  ".$todaydate.'</span>'."</p>"."\n";
            	$count++;
				$filename = fopen('./date/publiclog.txt',"a");
				fputs($filename, $putting);
				fclose($filename);
				//カウントファイル
				$filename = './receive/count.txt';
				$fp = fopen($filename, 'w');
				$data = $count;
				fputs($fp, $data);
				fclose($fp);
			}
}catch(Exception $e) {
        echo 'エラー:', $e->getMessage().PHP_EOL;
}
?>
<a href="./index.php" style="text-decoration:none">チャットに戻る</a>
</body>
<!--このチャットシステムは籘原梓 @Azusa468_Linuxが作成しました。-->
