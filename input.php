<?php
$hour = date('H');
$date = date('d');
$hour += 8;
if ($hour > 23) {
    $date += 1;
    $hour -= 24;
}

if (!strlen($_POST['name'])) {
    $_POST['name'] = "ñºñ≥Çµ";
}	

setcookie('username', $_POST['name'], time() + 2592000);

$todaydate = date('n') . "/" . $date . "/" . $hour . ":" . date('i') . ":" . date('s');

function inputter($putting) {
    $filename = fopen('./date/publiclog.txt', "a");
    fputs($filename, $putting);
    fclose($filename);
}

if (!strlen($_POST['maintext'])) {
    header('Location: index.php');
} else {
    $inter = "<p>".htmlspecialchars($_POST['name'], ENT_QUOTES|ENT_HTML5, "UTF-8") . " : " . $_POST['maintext'] . "Å@Å@Å@". $todaydate . "</p>" ."\n";
    inputter($inter);
    header('Location: index.php');
}
?>