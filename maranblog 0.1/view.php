<?php include('header.php'); ?>

<?php
$id = $_GET['id'] - 1;

$file = file("myblog.db");
$size = sizeof($file);

$buffer = explode("#", $file[$id]);
if (stristr($buffer[4], ".jpg")) {
   $pic = "<img src='imgblog/$buffer[4]'>";
}
else {
   $pic = "";
}

$buffer[3] = str_replace(":sm0:", "<img src='emoticons/sm0.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm1:", "<img src='emoticons/sm1.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm2:", "<img src='emoticons/sm2.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm3:", "<img src='emoticons/sm3.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm4:", "<img src='emoticons/sm4.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm5:", "<img src='emoticons/sm5.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm6:", "<img src='emoticons/sm6.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm7:", "<img src='emoticons/sm7.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm8:", "<img src='emoticons/sm8.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm9:", "<img src='emoticons/sm9.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm10:", "<img src='emoticons/sm10.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm11:", "<img src='emoticons/sm11.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm12:", "<img src='emoticons/sm12.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm13:", "<img src='emoticons/sm13.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm14:", "<img src='emoticons/sm14.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm15:", "<img src='emoticons/sm15.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm16:", "<img src='emoticons/sm16.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm17:", "<img src='emoticons/sm17.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm18:", "<img src='emoticons/sm18.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm19:", "<img src='emoticons/sm19.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm20:", "<img src='emoticons/sm20.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm21:", "<img src='emoticons/sm21.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm22:", "<img src='emoticons/sm22.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm23:", "<img src='emoticons/sm23.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm24:", "<img src='emoticons/sm24.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm25:", "<img src='emoticons/sm25.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm26:", "<img src='emoticons/sm26.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm27:", "<img src='emoticons/sm27.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm28:", "<img src='emoticons/sm28.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm29:", "<img src='emoticons/sm29.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm30:", "<img src='emoticons/sm30.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm31:", "<img src='emoticons/sm31.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm32:", "<img src='emoticons/sm32.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm33:", "<img src='emoticons/sm33.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm34:", "<img src='emoticons/sm34.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm35:", "<img src='emoticons/sm35.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm36:", "<img src='emoticons/sm36.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm37:", "<img src='emoticons/sm37.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm38:", "<img src='emoticons/sm38.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm39:", "<img src='emoticons/sm39.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm40:", "<img src='emoticons/sm40.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm41:", "<img src='emoticons/sm41.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm42:", "<img src='emoticons/sm42.gif'>", $buffer[3]);
$buffer[3] = str_replace(":sm43:", "<img src='emoticons/sm43.gif'>", $buffer[3]);

$cnt     = file("comments.db");
$cntsize = sizeof($cnt);

$kd = 0;
for ($i = 0; $i < $cntsize; $i++) {
   $cntbuffer = explode("#", $cnt[$i]);
   if ($buffer[1] == $cntbuffer[1]) {
	  $kd++;
   }
}

echo "<TABLE>";
echo "<TR>";
echo "<TD><B>$buffer[2] - $buffer[5] - Art Nr: $buffer[1]</B><BR><BR></TD>";
echo "</TR>";
echo "<TR>";
echo "<TD><FONT COLOR='#FFFFFF'>$buffer[3]</FONT></TD>";
echo "</TR>";
echo "<TR>";
echo "<TD><BR><BR> $pic</TD>";
echo "</TR>";
echo "<TR>";
echo "<TD align='right'><BR><BR><A HREF='comments.php?id=$buffer[1]'><B>Add comment</B></A> | <A HREF='view.php?id=$buffer[1]'><B>View comments $kd</B></A></TD>";
echo "</TR>";
echo "</TABLE><BR><hr size=1 style='border: 1px dashed' width='95%'><BR>";

?>

<?php

$idx   = $_GET['id'];
$filex = file("comments.db");
$sizex = sizeof($filex);

for ($i = 0; $i < $sizex; $i++) {
   $bufferx = explode("#", $filex[$i]);
   if ($bufferx[1] == $idx) {
	  $bufferx[3] = str_replace(array("[URL]", "[/URL]", "http://www", "."), (" "), $bufferx[3]);
	  $bufferx[3] = substr($bufferx[3], 0, 500);

	  echo "<TABLE>";
	  echo "<TR>";
	  echo "<TD><B><FONT COLOR='#F03800'>$bufferx[2]</FONT><BR></TD>";
	  echo "</TR>";
	  echo "<TR>";
	  echo "<TD><FONT COLOR='#E5F9FF'>$bufferx[3]</FONT></TD>";
	  echo "</TR>";
	  echo "<TR>";
	  echo "<TD>$bufferx[4]</TD>";
	  echo "</TR>";
	  echo "</TABLE><BR>";
   }
}
?>

<?php include('menu.php'); ?>
<?php include('footer.php'); ?>