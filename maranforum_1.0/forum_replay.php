<?php
/**
 *
 * Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
 * Released.............: 31.01.2006
 * Created by...........: Emil Maran (maran-emil.de)
 * Release type.........: Script PHP/mySQL
 * Price................: Freeware
 * Version..............: 1.0 Beta
 * Contact..............: maran_emil@yahoo.com
 * ----------------------------------------------------------------------------------*/
?>
<?php include('header.php'); ?>

<br><br>

<?php include("forum_header.php"); ?>

<?php

$subject = $_GET['subject'];
$page = $_GET['page'];

echo "<center><form action='forum_write.php' method='POST' enctype='multipart/form-data'>";
echo "<input type=hidden name=subject value='$subject'>";
echo "<B>your name</B> <input type=text name=name style='width:220px'><br><br>";
echo "<B>coment</B><br><textarea name=comment cols=40 rows=5 ></textarea>";
echo "<br>";
echo "<B>Best picture size is : Height max=173 Width max=262</B>";
echo "<br><br>";
echo "<B>Select Image [optional]:</B> <INPUT TYPE='file' NAME='filemx'><br>";
echo "<BR>";
echo "<br><input type=hidden name=page value='$page'>";
?>

<?php
$key = mt_rand(90000, 99999);
?>

<B>Spam protection code: <?= $key ?></B>

<input type='hidden' name='checkcode1' readonly value='<?= $key ?>' style='font-size:11px'>
<label>
    <input type='text' name='checkcode2'>
</label><BR><BR>

<?php
echo "<input type=submit name=submit value=submit style='font-size:13px;'></form>
<div style=\"text-align: center;\">";
?>

<?php include('footer.php'); ?>
