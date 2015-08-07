<? include("lib/funct_dict.php");?>
<? include("lib/header.php");?>

<? 

///////////////////////////////////////////////////////////////////////////////
//
// * BLOCK DEV ERRORS
//
///////////////////////////////////////////////////////////////////////////////

//ini_set("display_errors",1);
//error_reporting(1);

//header("Content-Type: text/html; charset=utf-8");
//seconds, minutes, hours, days
//$expires = 60*60*24*14;
//header("Pragma: public");
//header("Cache-Control: maxage=".$expires);
//header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
//header("Cache-Control: no-cache, must-revalidate");
//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 

///////////////////////////////////////////////////////////////////////////////
//
// * BLOCK DICTIONARY FILES - DEFINE YOUR FILES HERE AS FILE/NAME
//
///////////////////////////////////////////////////////////////////////////////

$arDictFile[0] = "dict_DE_RO.txt";							//
$arDictName[0] = "DICTIONARY RO-DE | DEFINITIONS: 1050";	//

$arDictFile[1] = "dict_RO_EN.txt";							// GET: -
$arDictName[1] = "DICTIONARY RO-EN | DEFINITIONS: 12172";	//  WEB: 

$arDictFile[2] = "english-german-2011-07-18.txt";			// GET: http://dicts.info/uddl.php
$arDictName[2] = "DICTIONARY EN-DE | DEFINITIONS: 1761";	// WEB:  http://www.dicts.info/ - Universal dictionary database

$arDictFile[3] = "english-romanian-2011-07-18.txt";			// GET: http://dicts.info/uddl.php
$arDictName[3] = "DICTIONARY EN-RO | DEFINITIONS: 1483";	// WEB: http://www.dicts.info/ - Universal dictionary database

///////////////////////////////////////////////////////////////////////////////
//
// * BLOCK CONFIG
//
///////////////////////////////////////////////////////////////////////////////

$sDictPath = "dicts/";		// path dict files


?>

<link rel="stylesheet" type="text/css" href="css/styles.css" />

<!-- Load jQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<!-- //Load jQuery -->

<!-- Add some events -->
<script>
	$(document).ready(function() {
		//$(function(){

		$("#loader").html('<img src="img/loader.gif">');

		$('#submit').click(function(){
			$("#loader").html('<img src="img/loader.gif">');
		});

		function callLoader(){
			$("#loader").html('<img src="img/loader.gif">');
		}
	});
</script>


<div id="wrap" style="">
	<div id="header" style="">
		<!-- SeachForm -->
		<form action="http://<?=$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF']?>" method="get">
			
			<!-- <input type="text" name="query" style="" value="<?=$_GET['query']?>"> -->
			<input type="text" name="queryenc" style="" value="<?=htmlentities(utf8_decode($_GET['queryenc']))?>">
			<select name="languages">
				<? for($i=0;$i<count($arDictFile);$i++){?>
					<option value="<?=$i?>" <?if($i==$_GET["languages"]){ echo "selected='selected'"; }?> ><?=$arDictName[$i]?></option>
				<?}?>
			</select>
			<!-- 
			<select name="strict">
				<option value="no" <?if("no"==$_GET["strict"]){ echo "selected='selected'"; }?> >No</option>
				<option value="yes" <?if("yes"==$_GET["strict"]){ echo "selected='selected'"; }?> >Yes</option>
			</select> -->

			<input type="submit" name="submit" id="submit" value="Search" style=" " onclick="callLoader()" >
		</form>
		<!-- // SeachForm -->
	<div id="loader"></div>

	<?

	///////////////////////////////////////////////////////////////////////////////
	//
	// * BLOCK CONFIG
	//
	///////////////////////////////////////////////////////////////////////////////

	$fileID		= $_GET["languages"];						// number of dict selected

	if(count($arDictFile)< $fileID ){
		$fileID		= 1;									// reset value if bigger than max 
	}


	//$strict		= $_GET["strict"];
	$queryenc	= strtolower(trim(html_entity_decode(htmlentities(utf8_decode($_GET['queryenc']))))); // get seached word value
	$fileAr		= file($sDictPath.$arDictFile[$fileID]);	// select file from array
	$iMaxRows	= count($fileAr);							// count max entries in file selected

	// init dict class
	$dict = new DictHelper;

	// show max number definitions for curent dict file selected
	echo "<font  class=superfont>Mini-dictionary. Definitions: ".$iMaxRows."";
	?>
	</div>


	<div id="footer" style="">
		<table width="600" align="center">
			<tr>
					<?
						$i			=0;		// init i value
						$response	= "";	// init response value

						if ( (isset($queryenc)) && strlen($queryenc) > 3 ) // check if we have to search something, lenght string must be bigger than 3
						{
							while ($i<$iMaxRows) // till i smaller than max counted 
							{
								$i++; // increment i
								$buffer		= trim($fileAr[$i]);	// read line from text file
								$linebuff	= strtolower($dict->crossUrlDecode($buffer)); // decode file utf8
				
								if( stristr($linebuff,$dict->crossUrlDecode($queryenc))){ // if string exist in line
									$result = explode(":",$linebuff);	// get columns 
									$response.= $dict->printResults($result[0],$result[1],$queryenc); // build response tring
								}
							}
						}
						
						if($response){ // if something was found display result
							echo $response;
						}
						else { // if not show default no results
							echo "no results"; 
						}
						
					?>
			</tr>
		</table>
	</div>
</div>


<script>
	//$(document).ready(function() {
	//$(function(){
		
		// hide loader on full page loaded after 1 sec
		setTimeout(function(){
			$("#loader").html('');
		},1000);

	//});
</script>

<? include("lib/footer.php");?>