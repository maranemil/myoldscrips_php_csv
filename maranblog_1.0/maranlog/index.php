<html lang="">
<head>

    <title>maranlog version 0.1a</title>

    <style>
        td {
            vertical-align: top
        }

        .static {
            font-family: verdana, serif;
            font-size: 11px
        }
    </style>

</head>

<body bgcolor=#000000>
<table height=150 border=0 cellspacing=8 cellpadding=8>
    <tr>
        <td width=200 bgcolor="#EEEEEE">

            <font class="static">

                <?php

                $month = $_GET['month'];
                if ($month === "") {
                    $month = date("Ym");
                }
                $op = -1;
                if ($handle = opendir('.')) {
                    while (false !== ($file = readdir($handle))) {
                        $op++;
                        if ($file !== "." && $file !== ".." && (strpos($file, ".db") !== false) && (strpos($file, $month) !== false)) {

                            echo " <a href='index.php?file=$file&month=$month'>$file</a><br>";
                        }
                    }
                    closedir($handle);
                }


                ?>


        </td>
        <td width=200 bgcolor="#DDDDDD">
            <font class="static">
                <form action='index.php' action='get'>
                    <select name=month style='font-size:12px'>
                        <option value='200501'>01 .2005
                        <option value='200502'>02 .2005
                        <option value='200503'>03 .2005
                        <option value='200504'>04 .2005
                        <option value='200505'>05 .2005
                        <option value='200506'>06 .2005
                        <option value='200507'>07 .2005
                        <option value='200508'>08 .2005
                        <option value='200509'>09 .2005
                        <option value='200510'>10 .2005
                        <option value='200511'>11 .2005
                        <option value='200512'>12 .2005
                    </select>
                    <input type=submit name=submit value="select month" style='font-size:12px'>
                </form>

                <hr>

                <form action='index.php' action=get>
                    <select name=month style='font-size:12px'>
                        <option value='200601'>01 .2006
                        <option value='200602'>02 .2006
                        <option value='200603'>03 .2006
                        <option value='200604'>04 .2006
                        <option value='200605'>05 .2006
                        <option value='200606'>06 .2006
                        <option value='200607'>07 .2006
                        <option value='200608'>08 .2006
                        <option value='200609'>09 .2006
                        <option value='200610'>10 .2006
                        <option value='200611'>11 .2006
                        <option value='200612'>12 .2006
                    </select>
                    <input type=submit name=submit value="select month" style='font-size:12px'>
                </form>

                <hr>
                <b>
                    maranlog version 0.1a <br>
                    copyright @ 2005 <br><br>
                </b>


                <?php echo "Are " . $op . " log files stored."; ?>


        </td>
        <td bgcolor="#DDDDDD" width=410>
            <font class="static">

                <?php

                if ($_GET['file'] === "") {
                    exit;
                }

                $file = file($_GET["file"]);
                $size = count($file) - 1;

                echo "<b>today hits</b>: " . $size;
                echo "<br>";

                $i = 0;
                while ($i < $size) {
                    $i++;
                    $news = explode("#", $file[$i]);
                    $buffer[$i] = $news[2];

                }

                echo "<hr>";
                $result = array_unique($buffer);
                $count = count($result);
                echo "<b> unique visitors </b>: $count";
                echo "<hr>";
                echo "<b>visitors ip adress</b>:<br><br>";

                foreach ($result as $key => $value) {
                    print "$value <br>";    // $key
                }


                // https://www.wallpapers4u.com/josie01.htm

                ?>


        </td>
    </tr>
</table>


<table  height=150 border=0 cellspacing=8 cellpadding=8><tr><td width=500 bgcolor="#EEEEEE">
<textarea rows=10 cols=120 style='font-size:11px'>
<?php
$fn = file("refer.db");
$sn = count($fn);
$k = -1;
while ($k < $sn) {
    $k++;
    $refx = trim(str_replace("#", "", $fn[$k]));
    echo "$refx \n";
}
?>
</textarea>

</td></tr></table>

