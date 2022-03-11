<?php
/**
 *
 * Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
 * Released.............: 31.01.2006
 * Created by...........: Emil Maran (maran-emil.de)
 * Release type.........: Script PHP/mySQL
 * Price................: Freeware
 * Version..............: 1.0 Beta
 * Contact..............: maran_emil@yahoo.com
 * ----------------------------------------------------------------------------------*/
?>
<?php include('header.php'); ?>
<?php include('forum_header.php'); ?>

<table>

    <?php

    //$the_array = Array();
    $handle = opendir('data/.');
    while (false !== ($file = readdir($handle))) {
        if ($file !== "." && $file !== "..") {
            $the_array[] = $file;
        }
    }
    rsort($the_array);
    //script de afisare per pagina din array

    $page = $_GET['page'];
    if ($_GET['page'] === "") {
        $page = "1";
    }
    $perpage = 20;

    $x = ($page * $perpage) - $perpage;
    $y = $page * $perpage;

    while ($x < $y) {
        if ($the_array[$x] !== "") {
            $read = file("data/$the_array[$x]");
            $ext = strlen($the_array[$x]);
            $ext_rem = substr($the_array[$x], 0, 12);
            $sz = count($read);
            $readx = explode("#", $read[0]);
            $lastmodif = date("d.m.Y", filemtime("data/$the_array[$x]")); // / H:i:s
            $readx[30] = substr($readx[3], 0, 20);
            $readx[10] = substr($readx[1], 0, 20);
            $month = date("m.Y");
            if (stripos($lastmodif, $month) !== false) {
                $lastmodif = str_replace((string)$month, "<span style=\"color: red; \">$month</span>", $lastmodif);
            }

            echo "<tr>
                    <td>
                        <a href='forum_view.php?page=$ext_rem' title='$readx[1]'> + $readx[10] </a>
                    </td>
                    <td> $readx[2] </td>
                    <td> 
                        <b> [ $sz ] </b>
                    </td>
                    <td> LPF: $lastmodif </td>
                </tr>";
        }

        $x++;
    }

    ?>

</TABLE>

<div style="text-align: center;">
    <TABLE border="0" cellpadding="2" cellspacing="2">
        <TR>
            <TD>
                <?php
                echo "<BR><BR>";
                $size = count($the_array);
                $numer = round($size / $perpage) + 1;
                $k = 0;
                $last = $numer;
                $pevious = 1;
                if ($page !== $last) {
                    $j = $page + 1;
                    echo "<a href='forum_index.php?page=$j'> <B>next</B> </a>";
                }
                while ($k < $numer) {
                    $k++;
                    echo "<a href='forum_index.php?page=$k'>| $k </a> ";
                }
                if ($page !== $pevious) {
                    $g = $page - 1;
                    echo "<a href='forum_index.php?page=$g'> <B>| back</B> </a>";
                }
                ?>
            </TD>
        </TR>
    </TABLE>
</div>

<?php include('forum_header.php'); ?>
<?php include('footer.php'); ?>
