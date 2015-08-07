<? include("header.php");?>
<?
####################################################################################
$query = $_GET['query'];
if($query){
	$tim = file("prodtable.db");
	$sizecat = count($tim);

	////////////////////////////////////
	for($i=-1; $i<$sizecat; $i++){
		//echo $tim[$i];
		if(stristr($tim[$i],$query)){
			$deti = explode("#",$tim[$i]);
		

			echo "
			<table border='0' align='center' cellpadding='3' cellspacing='3'>
				<tr>
					<td bgcolor='#EEEEEE'><IMG SRC='prodimg/$deti[5]'> <BR>
					<B>Title:</B> $deti[2] <BR>
					<B>Price:</B> $deti[3]$curency<BR><BR>
					<a href='prodshow.php?id=$i'><b style='color:#000000; '>[ details ]</b></a>
					</td>
					<td bgcolor='#EEEEEE' width='100%'><B>About:</B> $deti[4] </td>
				</tr>
			</table>"; 
		}
	}
}
?>
<? include("footer.php");?>