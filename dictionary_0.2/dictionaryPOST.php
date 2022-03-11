<?php

include("lib/funct_dict.php");
include("lib/header.php");

///////////////////////////////////////////////////////////////////////////////
//
// * BLOCK DEV ERRORS
//
///////////////////////////////////////////////////////////////////////////////

//ini_set("display_errors",1);
//error_reporting(1);

///////////////////////////////////////////////////////////////////////////////
//
// * BLOCK DICTIONARY FILES - DEFINE YOUR FILES HERE AS FILE/NAME
//
///////////////////////////////////////////////////////////////////////////////

$arDictFile[0] = "dict_DE_RO.txt";                            //
$arDictName[0] = "DICTIONARY RO-DE | DEFINITIONS: 1050";    //

$arDictFile[1] = "dict_RO_EN.txt";                            // GET: -
$arDictName[1] = "DICTIONARY RO-EN | DEFINITIONS: 12172";    //  WEB:

$arDictFile[2] = "english-german-2011-07-18.txt";            // GET: http://dicts.info/uddl.php
$arDictName[2] = "DICTIONARY EN-DE | DEFINITIONS: 1761";    // WEB:  http://www.dicts.info/ - Universal dictionary database

$arDictFile[3] = "english-romanian-2011-07-18.txt";            // GET: http://dicts.info/uddl.php
$arDictName[3] = "DICTIONARY EN-RO | DEFINITIONS: 1483";    // WEB: http://www.dicts.info/ - Universal dictionary database

///////////////////////////////////////////////////////////////////////////////
//
// * BLOCK CONFIG
//
///////////////////////////////////////////////////////////////////////////////

$sDictPath = "dicts/";        // path dict files

?>

    <link rel="stylesheet" type="text/css" href="css/styles.css"/>

    <!-- Load jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <!-- // Load jQuery -->

    <!-- Add some events -->
    <script>
        $(document).ready(function () {
            //$(function(){

            $("#loader").html('<img src="loader.gif" alt="">');

            $('#submit').click(function () {
                $("#loader").html('<img src="loader.gif" alt="">');
            });

            function callLoader() {
                $("#loader").html('<img src="loader.gif" alt="">');
            }
        });
    </script>

    <div id="wrap" style="">
        <div id="header" style="">
            <!--  SeachForm -->
            <form action="https://<?= $_SERVER['HTTP_HOST'] . "" . $_SERVER['PHP_SELF'] ?>" method="post">
                <div id="loader">...</div>
                <label>
                    <input type="text" name="query" style="" value="<?= $_POST['query'] ?>">
                </label>
                <input type="hidden" name="queryenc" style="" value="<?= strtolower($_POST['query']) ?>">
                <label>
                    <select name="languages">
                        <?php for ($i = 0, $iMax = count($arDictFile); $i < $iMax; $i++) { ?>
                            <option value="<?= $i ?>" <?php if ($i === $_POST["languages"]) {
                                echo "selected='selected'";
                            } ?> ><?= $arDictName[$i] ?></option>
                        <?php } ?>
                    </select>
                </label>
                <!--
		<select name="strict">
			<option value="no" <?php if ("no" === $_GET["strict"]) {
                    echo "selected='selected'";
                } ?> >No</option>
			<option value="yes" <?php if ("yes" === $_GET["strict"]) {
                    echo "selected='selected'";
                } ?> >Yes</option>
		</select>
		-->
                <input type="submit" name="submit" id="submit" value="Search" style=" " onclick="callLoader()">
            </form>
            <!-- // SeachForm -->
            <div id="loader"></div>

            <?php

            $dict = new DictHelper;    // init class DictHelper

            ///////////////////////////////////////////////////////////////////////////////
            //
            // * BLOCK CONFIG
            //
            ///////////////////////////////////////////////////////////////////////////////

            $fileID = $_POST["languages"];
            $strict = $_POST["strict"];
            $queryenc = strtolower(trim(html_entity_decode(htmlentities(utf8_decode($_POST['queryenc'])))));
            $fileAr = file($sDictPath . $arDictFile[$fileID]);
            $iMaxRows = count($fileAr);

            echo "<span  class=superfont>Mini-dictionary. Definitions: " . $iMaxRows . "</span>";
            ?>
        </div>

        <div id="footer" style="">
            <table>
                <tr>
                    <?php
                    $i = 0; // init i value
                    $response = ""; // init response value

                    if ((isset($queryenc)) && strlen($queryenc) > 3) // check if we have to search something, lenght string must be bigger than 3
                    {
                        while ($i < $iMaxRows) // till i smaller than max counted
                        {
                            $i++;
                            $buffer = trim($fileAr[$i]); // read line from text file
                            $linebuff = strtolower($dict->crossUrlDecode($buffer)); // decode file utf8

                            if (stripos($linebuff, $dict->crossUrlDecode($queryenc)) !== false) {
                                $result = explode(":", $linebuff); // get columns
                                $response .= $dict->printResults($result[0], $result[1], $queryenc); // build response tring
                            }
                        }
                    }

                    if ($response) { // if something was found display result
                        echo $response;
                    } else { // if not show default no results
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

        setTimeout(function () {
            $("#loader").html('');
        }, 1000);

        //});
    </script>

<?php include("lib/footer.php"); ?>