<?php
/**
 *
 * Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
 * Released.............: 12.09.2006
 * Created by...........: Emil Maran (maran-emil.de)
 * Release type.........: Script PHP/mySQL
 * Price................: Freeware
 * Version..............: 1.0 Beta
 * Contact..............: maran_emil@yahoo.com
 * ----------------------------------------------------------------------------------
 */
include('header.php');

$page = $_GET['page'];

// if a page isn't defined, we're on page one
if (!isset($HTTP_GET_VARS['page'])) {
    $page = 1;
}

// create an array of data
$myArray = file("myblog.db");
$s = sizeof($myArray);
// reverse the order of the data
$myArray = array_reverse($myArray);
// how many lines of data to display
$display = 50;

// where to start depending on what page we're viewing
$start = ($page * $display) - $display;

// the actual news we're going to print
$news = array_slice($myArray, $start, $display);
?>

<?php
$end = $display * $page;

if ($start !== 0) {
    $new_page = $page - 1;
    $prev = "<a href='archive.php?page=$new_page'><b> previous page</a></b></font>";
} else {
    $prev = "";
}
if ($end < $s) {
    $new_page1 = $page + 1;
    $next = "<a href='archive.php?page=$new_page1'><b> next page</a></b></font>";
} else {
    $next = "";
}
?>
    <br>
<?php
echo "<table width=500 align='center' cellpadding=4 cellspacing=4><tr><td width=50% height=11>" . $prev . "</td><td align=right width=50% height=11><b>" . $next . "</b></font></td></tr></table>";
?>

    <table align=center width=430>
        <tr>
            <td>
                <?php

                //$article_id=(($page*$display)-$display);
                $r = count($myArray);
                $redfirst = "myblog.db";
                foreach ($news as $key) {
                    $buffer = explode("#", $key);
                    if (stripos($buffer[4], ".jpg") !== false) {
                        $pic = "<img src='imgblog/$buffer[4]'>";
                    } else {
                        $pic = "";
                    }

                    echo "<TABLE width=430>";
                    echo "<TR>";
                    echo "<TD align='left'><B> &#187; <a href='view.php?id=$buffer[1]'><font color='#FABA44'> $buffer[2] - $buffer[5] - Art Nr: $buffer[1]</a></B></TD>";
                    echo "</TR>";
                    echo "</TABLE><hr size=1 style='border: 1px dashed' width='95%'>";
                }

                ?>
            </td>
        </tr>
    </table>

<?php
echo "<table width=100% align='center' cellpadding=4 cellspacing=4><tr><td width=50% height=11>" . $prev . "</td><td align=right width=50% height=11><b>" . $next . "</b></font></td></tr></table>";
?>

<?php include('menu.php'); ?>

<?php include('footer.php'); ?>