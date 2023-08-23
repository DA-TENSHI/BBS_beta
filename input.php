<?php
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

function inputter($putting) {
    $filename = fopen('./date/publiclog.txt', "a");
    fputs($filename, $putting);
    fclose($filename);
}

if (!strlen($_POST['maintext'])) {
    header('Location: index.php');
} else {
    $user_ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    $inter = "<p>".htmlspecialchars($_POST['name'], ENT_QUOTES|ENT_HTML5, "UTF-8") . " : " . $_POST['maintext'] . "　　　". $todaydate. " IP: " . $user_ip . "</p>" ."\n";
    inputter($inter);
    header('Location: index.php');
}
?>
