<?
/*

Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
Released.............: 03.04.2006
Created by...........: Emil Maran (maran-emil.de)
Release type.........: Script PHP/mySQL
Price................: Freeware
Version..............: 1.0 Beta
Contact..............: maran_emil@yahoo.com
----------------------------------------------------------------------------------*/
?>
<? include("header.php"); ?>

<?
####################################################################################
$id      = $_GET['id'];
$tim     = file("prodtable.db");
$sizetim = count($tim);
////////////////////////////////////
$deti = explode("#", $tim[$id]);

echo "
<table border='0' align='center' cellpadding='7' cellspacing='7' background='images/mybg.gif'>
	<tr>
		<td>
			<IMG SRC='prodimg/$deti[5]' width=200 > <BR><BR>
			<B>Title:</B> $deti[2] <BR>
			<B>Price:</B> $deti[3]$currency<BR>
		</td>
		<td width='100%'><B>About:</B> $deti[4] </td>
	</tr>
</table><BR>";

echo "<form action='orderform.php' method=get><input type=hidden name=product value=$deti[2]>";
echo "<input type=hidden name=prodname value='$deti[2]'>";
echo "<input type=hidden name=price value='$deti[3]'>";
echo "<input type=submit name=submit value='order this product' style='font-size:11px'>";
echo "</form>";
?>
<? include("footer.php"); ?>