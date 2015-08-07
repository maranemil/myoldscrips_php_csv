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
	</TD>
	<TD width='250' bgcolor='#2C333B'>

<B><h2>MARAN BLOG 2006</h2></B><BR>	
	<hr size=1 style='border: 1px dashed' width='95%'>
	<B>Today is:</B> <BR><? echo date("r");?>
	<hr size=1 style='border: 1px dashed' width='95%'><BR><BR>
	<B><A HREF="index.php"> &#187; First page</A></B><BR>
	<B><A HREF="archive.php"> &#187; See all articles</A></B><BR>
	<B><A HREF="commentsall.php"> &#187; See all comments</A></B><BR>
	<B><A HREF="addnew.php"> &#187; Add new article</A></B><BR>
	<hr size=1 style='border: 1px dashed' width='95%'>
	<B> &#187; Search article</B><BR>

<BR><BR>
	<CENTER><form action='search.php' method='get'>
<input type=text name=query style="font-size: 11px">
<input type=submit name='submit' value='search article' style="font-size: 11px">	
	</form></CENTER>

	<?include("calendar.php");?>

<hr size=1 style='border: 1px dashed' width='95%'>
<TABLE width=150 align=center>
<TR>
	<TD>
	
<?php
    $time = time();
    echo generate_calendar(date('Y', $time), date('n', $time));
?> 
	
	</TD>
</TR>
</TABLE>

<hr size=1 style='border: 1px dashed' width='95%'>

<TABLE width=150 align=center>
<TR>
	<TD>

	<B>MaranBlog Favorites Links</h2></B><BR><BR>	

<?

$lnkfile = file('links.db');
$lnksize = count($lnkfile);
for($i=0;$i<$lnksize;$i++){

echo "<a href='$lnkfile[$i]' target='_new'>$lnkfile[$i]</a>";

}

?> 
	
	</TD>
</TR>
</TABLE>





	</TD>
</TR>
</TABLE>
