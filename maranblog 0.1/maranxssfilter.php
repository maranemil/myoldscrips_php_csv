<?php

// ------------------------------------------------------------------        //
//  Projekt:   XSS Filter                                                    //
//  Download:  http://maran.pamil-visions.com                                //
//  Autor:     Maran Emil                                                    //
//  Kontakt:   maran_emil@yahoo.com                                          //
//                                                                           //
//  Dateiname: maranxssfilter.php                                            //
//  AEnderung: 07. 12 2008                                                   //
//  -----------------------------------------------------------------------  //

/* create you array with banned words for request*/
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

/* make exit if attacks are found from arrInjection */
foreach ($arrInjection as $item) {
    if (strpos($_SERVER["REQUEST_URI"], $item) !== false) {
        exit;
    }
}

/* make exit if attacks are from external website using file txt */
foreach ($_REQUEST as $key => $val) {
    if (strpos($val, ".txt") !== false) {
        exit;
    }
}

/* make exit if attacks are from external website  */
foreach ($_POST as $key => $val) {
    if (strpos($val, "http") !== false) {
        exit;
    }
}

/* make exit if attacks are from external website  */
foreach ($_GET as $key => $val) {
    if (strpos($val, "http") !== false) {
        exit;
    }
}


/**
 * @param $input
 *
 * @return bool
 */
function isInteger($input)
{
    return preg_match('@^[-]?[0-9]+$@', $input) === 1;
}


/**
 * @noinspection PhpUnused
 * @param $string
 *
 * @return bool
 */
function isString($string)
{
    if (preg_match('^[A-Za-z_][A-Za-z_]*$', $string)) {
        return true;
    }

    return false;
}

/**
 * @noinspection PhpUnused
 * @param $string
 *
 * @return int
 */
function onlyDigits($string)
{
    if (preg_replace("[^0-9]", "", $string) === $string) {
        return 1;
    }

    return 0;
}

/**
 * @noinspection PhpUnused
 * @param $string
 *
 * @return int
 */
function onlyString($string)
{
    if (str_replace("A-Za-z", "", $string) === $string) {
        return 1;
    }

    return 0;
}

/* VALIDATE GET REQUESTS */
/* make exit if id is not integer  */
if ((!isInteger($_GET['id'])) && (isset($_GET['id']))) {
    exit;
}

