<?php include('header.php'); ?>

<?php if ($_POST['checkcode1'] !== $_POST['checkcode2']) {
    echo "wrong code!";
    exit;
} ?>
<?php if ((!$_POST['subject']) || (!$_POST['comment']) || (!$_POST['name'])) {
    echo "incomplete fields";
    exit;
} ?>

<?php

if ($_FILES['filemx']['name'] !== "") {
    $imageInfo = getimagesize($_FILES['filemx']['tmp_name']);
    $width = $imageInfo[0];
    $height = $imageInfo[1];
    if ($height > 273 || $width > 362) {
        echo "<script> alert('Image is to big! Try to resize the picture!') </script>";
        exit;
    }
    $newimg = date("YmdHis") . ".jpg";

    if (stripos($_SERVER['OS'], "linux") !== false) {
        $path = str_replace("admin.php", "", $_SERVER['SCRIPT_FILENAME']) . "datafoto/";
    } else {
        $path = "datafoto/";
    }

    move_uploaded_file($_FILES['filemx']['tmp_name'], $path . $newimg);
} else {
    $newimg = "noimg.jpg";
}

$name = $_POST["name"];
$name = str_replace("#", " ", $name);
$subject = $_POST["subject"];
$subject = str_replace("#", " ", $subject);
$comment = $_POST["comment"];
$comment = str_replace(array("#", "\r\n"), array(" ", "<BR>"), $comment);

$page = $_POST["page"];
$infodate = date('r');
$ip = $_SERVER["REMOTE_ADDR"];
//$time = date("YmdHi");

$fp = fopen("data/$page.txt", 'ab');
$line = "#$subject#$name#$comment <BR><img src='datafoto/$newimg'><BR>#$infodate#$ip \r\n";
fwrite($fp, $line);
fclose($fp);

echo "<script>location.replace('forum_index.php')</script>";

?>