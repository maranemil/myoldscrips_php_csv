<?php /** @noinspection SpellCheckingInspection */
$banlist = "85.255.119.74";
if (strpos($_SERVER["REMOTE_ADDR"], $banlist) !== false) {
    die('you are banned...i guess....');
}
?>

<?php
if ($_POST['checkcode1'] !== $_POST['checkcode2']) {
    echo "wrong code!";
    exit;
}
?>

<?php

$id = $_POST['id'];
$yourname = $_POST['yourname'];
$yourcomment = $_POST['yourcomment'];
$yourcomment = str_replace("\r\n", "<br>", $yourcomment);
$data = date("d.m.Y");

if (($_POST['action'] === "yes") && (!empty($_POST['id']))) {
    $ip = $_SERVER["REMOTE_ADDR"];
    $ir = getHostByAddr($_SERVER["REMOTE_ADDR"]);

    $fp = fopen("comments.db", 'ab');
    $line = "#$id#$yourname#$yourcomment#$data#$ip#$ir \r\n";
    fwrite($fp, $line);

    $ipadress = $_SERVER['REMOTE_ADDR'];

    $fp = fopen("ipspam.db", 'ab');
    $line = "#$id#$ipadress#$data \r\n";
    fwrite($fp, $line);

    echo "<script>alert('message has been recorded! thank you :)')</script>";
    echo "<script>location.replace('view.php?id=$id')</script>";
} else {
    echo "<script>alert('message has not been recorded!')</script>";
    echo "<script>location.replace('comments.php')</script>";
}
?>