<?php
// simple log for ip & date visitors version 1.0
//  use < include ('iplog.php'); > in index.php page

$ip = $str_remote_addr;
$ir = getHostByAddr($str_remote_addr);
//$ref =  $_SERVER["PHP_REFERER"];
//$browser = $_SERVER["HTTP_USER_AGENT"];
$date = date("Ymd.H:i");
$filelog = date("Ymd");

$fp = fopen("maranlog/$filelog.db", 'ab');
$line = "#" . $ip;
$line .= "#" . $ir;
$line .= "#" . $date;
//$line .= "#" . $browser;
//$line .= "#" . $ref;
$line = str_replace("\r\n", "<BR>", $line);
$line .= "\r\n";
fwrite($fp, $line);

?>

<?php
/*

	$ref =  $HTTP_REFERER;
	$fpx = fopen("maranlog/refer.db","a");
	$linex .= "#" . $ref;
	$linex = str_replace("\r\n","<BR>",$linex);
	$linex .= "\r\n";
	fwrite($fpx, $linex);
		
*/
?>

<?php
/*

	$fp = file ("logger.db");
	$data = array ($fp);
	$s = sizeof($fp);
	$sx = $s + 1;

	// after 3000 inputs database must be clean

	if ($s == "10000"){

	$fp = fopen('logger.db','w');
	fputs ($fp, "");
	fwrite($fp, $line);}

*/
?>
