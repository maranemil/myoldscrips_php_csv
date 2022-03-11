<?

// ------------------------------------------------------------------        //
//  Projekt:   XSS Filter                                                    //
//  Download:  http://maran.pamil-visions.com                                //
//  Autor:     Maran Emil                                                    //
//  Kontakt:   maran_emil@yahoo.com                                          //
//                                                                           //
//  Dateiname: maranxssfilter.php                                            //
//  AEnderung: 07. 12 2008                                                   //
//  Update:    01. 07 2009                                                   //
//  Version: 1.01                                                            //
//  -----------------------------------------------------------------------  //

###################################################################################################
/* CREATE YOU ARRAY WITH BANNED WORDS FOR REQUEST */
$arrInjection = array(
    "UNION",
    "SELECT",
    "concat",
    "user_password",
    "char",
    "user_name",
    "administrators",
    "FROM",
    "../",
    "etc/",
    "script",
    "alert",
    "passwd",
    "session",
    "save_path",
    "configuration",
    "folder"
);

###################################################################################################
/* MAKE EXIT IF ATTACKS ARE FOUND MATCH WITH ARRAY INJECTION ELEMENTS */
foreach ($arrInjection as $item) {
    if (strpos($_SERVER["REQUEST_URI"], $item) !== false) {
        exit;
    }
}

/* MAKE EXIT IF ATTACKS ARE FROM EXTERNAL WEBSITE USING FILE TXT */
foreach ($_REQUEST as $key => $val) {
    if (strpos($val, ".txt") !== false) {
        exit;
    }
}

/* MAKE EXIT IF ATTACKS ARE FROM EXTERNAL WEBSITE  */
foreach ($_POST as $key => $val) {
    if (strpos($val, "http") !== false) {
        exit;
    }
}

/* MAKE EXIT IF ATTACKS ARE FROM EXTERNAL WEBSITE  */
foreach ($_GET as $key => $val) {
    if (strpos($val, "http") !== false) {
        exit;
    }
}

###################################################################################################
/* MAKE EXIT IF ATTACKS ARE LIKE yourpage.php/inexistentpage.asp?  */
// PATCH FOR PAGE EXTENSION CHECK
// NORMALY THIS CAN BE SET IN .HTACCESS

$sPage = $_SERVER["REQUEST_URI"];

$pageExtension = "php"; // SET HERE YOUR PAGE EXTENSION IN WEB
$arNotAllowedURL = array("/", "asp", "php", "jsp", "html", "htm", "txt");

$arTmpUrl = explode($pageExtension, $sPage);
$realUrI = $arTmpUrl[1];

foreach ($arNotAllowedURL as $InjElemenet) {
    if (strpos($realUrI, $InjElemenet) !== false) {
        exit;
    }
}

###################################################################################################

/* CHECK IF IS INTEGER*/
function isInteger($input)
{
    return preg_match('@^[-]?[0-9]+$@', $input) === 1;
}

/* CHECK IF IS STRING*/
function isString($string)
{
    if (ereg('^[A-Za-z_][A-Za-z_]*$', $string)) {
        return true;
    }

    return false;
}

/* CHECK IF IS INTEGER*/
function onlyDigits($string)
{
    if (ereg_replace("[^0-9]", "", $string) === $string) {
        return 1;
    }

    return 0;
}

/* CHECK IF IS STRING*/
function onlyString($string)
{
    if (ereg_replace("[a-zA-Z]", "", $string) === $string) {
        return 1;
    }

    return 0;
}

###################################################################################################
/* SPECIAL VALIDATION */
/* VALIDATE GET REQUESTS */
/* MAKE EXIT IF ID IS NOT INTEGER  */
if ((!isInteger($_GET['id'])) && (isset($_GET['id']))) {
    exit;
}
if ((!isInteger($_GET['user_id'])) && (isset($_GET['user_id']))) {
    exit;
}
if ((!isInteger($_GET['prod_id'])) && (isset($_GET['prod_id']))) {
    exit;
}

