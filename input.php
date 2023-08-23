<?php
// SQLite3データベースのファイルパス
$databaseFile = './date/chat.db';

// データベースの作成またはオープン
$db = new SQLite3($databaseFile);

// テーブルが存在しない場合は作成
$db->exec('CREATE TABLE IF NOT EXISTS posts (id INTEGER PRIMARY KEY, name TEXT, maintext TEXT, timestamp DATETIME)');

$hour = date('H');
$date = date('d');
$hour += 8;
if ($hour > 23) {
    $date += 1;
    $hour -= 24;
}

if (!strlen($_POST['name'])) {
    $_POST['name'] = "名無し";
}	

setcookie('username', $_POST['name'], time() + 2592000);

$todaydate = date('n') . "/" . $date . "/" . $hour . ":" . date('i') . ":" . date('s');

function inputter($db, $name, $maintext, $timestamp) {
    $stmt = $db->prepare('INSERT INTO posts (name, maintext, timestamp) VALUES (:name, :maintext, :timestamp)');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':maintext', $maintext, SQLITE3_TEXT);
    $stmt->bindValue(':timestamp', $timestamp, SQLITE3_TEXT);
    $stmt->execute();
}

if (!strlen($_POST['maintext'])) {
    header('Location: index.php');
} else {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES|ENT_HTML5, "UTF-8");
    $maintext = htmlspecialchars($_POST['maintext'], ENT_QUOTES|ENT_HTML5, "UTF-8");
    
    inputter($db, $name, $maintext, $todaydate);
    header('Location: index.php');
}

$db->close();
?>

