<?include("header.php");?>

<?
############################################################################
$cat = $_GET['cat'];
$tim = file("prodtable.db");
$sizecat = count($tim);
////////////////////////////////////
	for($i=-1;$i<$sizecat;$i++){
		$deti = explode("#",$tim[$i]);
		if(strstr($deti[1],$cat)){
			$ThisIndex[] = array($tim[$i],$i);
		}
	}

//print_r($ThisIndex);
?>


<?php
############################################################################

	// if a page isn't defined, we're on page one
	if(!isset($_GET['page'])) { $page = 1; } else {$page = $_GET['page'];}

	// create an array of data
	$myArray = $ThisIndex;
	$s=sizeof($myArray);
	// reverse the order of the data
	// how many lines of data to display
	$display = 9;
	$perpage=9;

	// where to start depending on what page we're viewing
	$start = ($page * $display) - $display;

	// the actual news we're going to print
	if(is_array($myArray)){
		$news = array_slice($myArray, $start, $display);
	}
	/*
	print "<pre>";
	print_r($news);
	print "</pre>";
	*/

?>


<?php
$end=$display*$page;

if ($start != '0') {
$new_page=$page-1;
$prev="<a href='".$_PHP_SELF."?page=$new_page&cat=$cat'><b> prevous page </a></b>";
}
else {
$prev="<a href='".$_PHP_SELF."?page=1&cat=$cat'><b> prevous page </a></b>";
}
if ($end < $s) {
$new_page1=$page+1;
$next="<a href='".$_PHP_SELF."?page=$new_page1&cat=$cat'><b> next page </a></b>";
}
else {
$next="<a href='".$_PHP_SELF."?page=$page&cat=$cat'><b> next page </a></b>";
}
?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td background="images/mid_nav_bg.gif" height="25">

			<table class="TopNav" align="center" border="0" cellpadding="2" cellspacing="0" width="100%">
				<tr>
					<td class="TopNav" align="left" valign="top" width="100%">&nbsp;&nbsp;<a href="" class="nav"><?=$prev?> | <?=$next?></td>
				</tr>
			</table>

		</td>
	</tr>
</table>



<div style='width: 550px;  height: 550px; border: 0px; padding:2px; margin-bottom: 8px; background: #FFFFFF; overflow: auto; ' >
<?
if(is_array($myArray)){
	//$article_id=(($page*$display)-$display);
	$r=sizeof($myArray);
	foreach ($news as $key) {
	$buffer = explode ("#",$key[0]);
	$bufferID = explode ("#",$key[1]);

	echo "
	<div class='myBosex'>
		<a href='prodshow.php?id=$bufferID[0]'>
			<IMG SRC='prodimg/$buffer[5]' width=150 border=0></a> <BR>
			<B>  $buffer[2] </B> <BR>
			<B>Price:</B> $buffer[3]$currency<BR>
			<a href='prodshow.php?id=$bufferID[0]'><b> 
		<FONT COLOR='#FF6600'>more details...</FONT> </b></a>
	</div>
	";
	}
}
?>
</div>

<BR><BR>

<? include("footer.php");?>

