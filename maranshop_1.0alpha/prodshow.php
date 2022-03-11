<?php include("header.php"); ?>

<?php
####################################################################################
$id = $_GET['id'];
$tim = file("prodtable.db");
$sizetim = count($tim);
////////////////////////////////////
$deti = explode("#", $tim[$id]);

echo "
<table>
	<tr>
		<td>
			<IMG SRC='prodimg/$deti[5]' width=200 > <BR><BR>
			<B>Title:</B> $deti[2] <BR>
			<B>Price:</B> $deti[3]$currency<BR>
		</td>
		<B>About:</B> $deti[4] 
	</tr>
</table><BR>";

echo "<form action='orderform.php' method=get><input type=hidden name=product value=$deti[2]>";
echo "<input type=hidden name=prodname value='$deti[2]'>";
echo "<input type=hidden name=price value='$deti[3]'>";
echo "<input type=submit name=submit value='order this product' style='font-size:11px'>";
echo "</form>";
?>
<?php include("footer.php"); ?>