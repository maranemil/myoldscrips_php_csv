<?php include('header.php'); ?>

<br><br>

<? include("forum_header.php"); ?>

<?

$page = date("YmdHi");

echo "<br><br><center><form action='forum_write2.php' method='POST' enctype='multipart/form-data'>";
echo "<B>subject : </B><input type=text name=subject style='width:230'><br>";
echo "<B>name: </B><input type=text name=name style='width:240'><br><br>";
echo "<B>coment: </B><br><textarea name=comment cols=40 rows=5 style='font-size:13px'>";
echo "</textarea><br><input type=hidden name=page value='$page'>";
echo "<br>";
echo "<B>Best picture size is : Height max=173 Width max=262</B>";
echo "<br><br>";
echo "<B>Select Image [optional]:</B> <INPUT TYPE='file' NAME='filemx' style='font-size: 10px;'><br>";
echo "<BR>";
?>

<?
$key = rand(90000, 99999);
?>

<B>Spam protection code: <?= $key ?></B>

<input type='hidden' name='checkcode1' readonly value='<?= $key ?>' style='font-size:11px'>
<input type='text' name='checkcode2'><BR><BR>

<?
echo "<input type=submit name=submit value=submit >";
echo "</form></center>";
?>

</font>

<?php include('footer.php'); ?>
