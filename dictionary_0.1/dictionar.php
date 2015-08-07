<? include("header.php");?>

<br><br>
<center>

<form action="dictionar.php" method=get>
<input type=text name=query style="font:11px arial; font-weight:bold; background:#FFFFDD;">
<input type=submit name=submit value="cauta in dictionar" style="font:11px arial; font-weight:bold; width:119;">
</form>

<br>
<?

$filedd = file("dictionar.db");
$definitions = count($filedd);
echo "<font  class=superfont>Mini-dictionar En-Ro/Ro-En. Include $definitions definitii.";
?>


<br>
<br>
<table width=400 align=center><tr><td>
<?

$query = strtolower(trim($_GET['query']));
if ((isset($query))&&(strlen($query)>2)){
$file = file("dictionar.db");
$size=sizeof($file);
$i=0;
while ($i<$size){$i++;
$buffer = strtolower($file[$i]);
$result = explode(":",$buffer);
if(stristr($buffer,$query))
{
 
   $result[0]=str_replace("$query","<b>$query</b>",$result[0]);
   $result[1]=str_replace("$query","<b>$query</b>",$result[1]);
 echo "<tr><td width=50% bgcolor=#FFFFDD style='border:1px dashed'><font  class=superfont> $result[0]   </font></td><td></td><td bgcolor=#EEEEEE width=50% style='border:1px dashed'><font  class=superfont> $result[1] </font></td></tr>";

	}
}
}
   // else {echo "no results"; }
?>
</table>

<? include("footer.php");?>