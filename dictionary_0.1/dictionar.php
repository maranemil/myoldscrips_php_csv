<form action="dictionar.php" method=get>
    <label>
        <input type=text name=query style="font:11px arial; font-weight:bold; background:#FFFFDD;">
    </label>
    <input type=submit name=submit value="cauta in dictionar" style="font:11px arial; font-weight:bold; width:119px;">
</form><br>
<?php

$fileCSV             = file("dictionar.db");
$intDefinitionsCount = count($fileCSV);
echo "<span>Mini-dictionar En-Ro/Ro-En. Include $intDefinitionsCount definitii.</span>";
?>

<br>
<br>
<table>
    <tr>
        <td>
		   <?

		   $query = strtolower(trim($_GET['query']));
		   if ((isset($query)) && (strlen($query) > 2)) {
			  $file = file("dictionar.db");
			  $size = sizeof($file);
			  $i    = 0;
			  while ($i < $size) {
				 $i++;
				 $buffer = strtolower($file[$i]);
				 $result = explode(":", $buffer);
				 if (stristr($buffer, $query)) {
					$result[0] = str_replace("$query", "<b>$query</b>", $result[0]);
					$result[1] = str_replace("$query", "<b>$query</b>", $result[1]);
					echo "
                    <tr>
                            <td style='border:1px dashed'><span  class=superfont> $result[0] </span></td>
                            <td></td>
                            <td style='border:1px dashed'><span  class=superfont> $result[1] </span></td>
                     </tr>";
				 }
			  }
		   }
		   // else {echo "no results"; }
		   ?>
</table>