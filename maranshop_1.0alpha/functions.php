<?

/* SHOW PRODUCT BY ID */
function ShowIndexProd($number){

	$tim = file("prodtable.db");
	$sizetim = count($tim)-$number;
	$deti = explode("#",$tim[$sizetim]);

	echo "
	<td class='BoxIndex' width='30%'><a href='prodshow.php?id=$sizetim'><IMG SRC='prodimg/$deti[5]' width=150 border=0></a> <BR><BR>
		<B><FONT COLOR='red'> $deti[2] </FONT></B> <BR>
		<B>Price:</B> $deti[3]$curency<BR>
		<a href='prodshow.php?id=$sizetim'><b><FONT COLOR='#FF6600'> more details... </FONT></b></a>
	</td>";

}



?>