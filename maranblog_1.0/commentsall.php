<?
/*

Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
Released.............: 12.09.2006
Created by...........: Emil Maran (maran-emil.de)
Release type.........: Script PHP/mySQL
Price................: Freeware
Version..............: 1.0 Beta
Contact..............: maran_emil@yahoo.com
----------------------------------------------------------------------------------*/
?>
<?include('header.php');?>
	
<?php
/////////////////////////////////////////////////////////////////////////////////

$page=$_GET['page'];

// if a page isn't defined, we're on page one
if(!isset($HTTP_GET_VARS['page']))
{
$page = 1;
}

// create an array of data
$myArray = file("comments.db");
 $s=sizeof($myArray);
// reverse the order of the data
$myArray = array_reverse($myArray);
// how many lines of data to display
$display = 25;

// where to start depending on what page we're viewing
$start = ($page * $display) - $display;

// the actual news we're going to print
$news = array_slice($myArray, $start, $display);
?>


<?php
$end=$display*$page;

if ($start != '0') {
$new_page=$page-1;
$prev="<a href='commentsall.php?page=$new_page'><b> previous page</a></b></font>";
}
else {
$prev="";
}
if ($end < $s) {
$new_page1=$page+1;
$next="<a href='commentsall.php?page=$new_page1'><b> next page</a></b></font>";
}
else {
$next="";
}
?>
<br>
<?php
echo "<table width=500 align='center' cellpadding=4 cellspacing=4><tr><td width=50% height=11>".$prev."</td><td align=right width=50% height=11><b>".$next."</b></font></td></tr></table>";
?>



<table align=center width=430>
<tr><td>
<?


foreach ($news as $key) {
$bufferx = explode ("#",$key);

$bufferx[3] = str_replace(array("[URL]","[/URL]","http://www","."),(" "),$bufferx[3]);	
$bufferx[3] = strip_tags($bufferx[3]);
$bufferx[3] = substr($bufferx[3],0,500);

echo"<TABLE>";
	echo"<TR>";
	echo"<TD><B><FONT COLOR='#F03800'>$bufferx[2]</FONT><BR></TD>";
	echo"</TR>";
	echo"<TR>";
	echo"<TD><FONT COLOR='#E5F9FF'>$bufferx[3]</FONT></TD>";
	echo"</TR>";
	echo"<TR>";
	echo"<TD>$bufferx[4] - <a href='view.php?id=$bufferx[1]'>read/see article</a></TD>";
	echo"</TR>";
	echo"</TABLE>";
echo"<hr size=1 style='border: 1px dashed' width='95%'>";
}

?>
</td></tr></table>


<?php
echo "<table width=100% align='center' cellpadding=4 cellspacing=4><tr><td width=50% height=11>".$prev."</td><td align=right width=50% height=11><b>".$next."</b></font></td></tr></table>";
?>

	
	

	
	
<?include('menu.php');?>



<?include('footer.php');?>