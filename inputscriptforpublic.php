<?php
$hour = date('H');
$date = date('d');
$hour += 8;
if ($hour > 23) {
    $date += 1;
    $hour -= 24;
}

setcookie('username', $_POST['name'], time() + 2592000);

if (!strlen($_POST['name'])) {
    $_POST['name'] = "名無し";
}

$todaydate = date('n') . "/" . $date . "/" . $hour . ":" . date('i') . ":" . date('s');

function inputter($putting) {
    $databaseFile = './date/chat.db';
    $db = new SQLite3($databaseFile);

    $query = "INSERT INTO posts (name, maintext, timestamp) VALUES (:name, :maintext, :timestamp)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $_POST['name'], SQLITE3_TEXT);
    $statement->bindValue(':maintext', $_POST['maintext'], SQLITE3_TEXT);
    $statement->bindValue(':timestamp', $todaydate, SQLITE3_TEXT);
    $statement->execute();

    $db->close();
}

if (!strlen($_POST['maintext'])) {
    header('Location: index.php');
} else {
    $inter = '<div style="border: 2px solid white;padding-left:10px;padding-bottom:10px">' . "<p>" . htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_HTML5, "UTF-8") . "　　" . $todaydate . "</p>" . $_POST['maintext'] . "</div>" . "\n";
    inputter($inter);
    header('Location: index.php');
}
?>
