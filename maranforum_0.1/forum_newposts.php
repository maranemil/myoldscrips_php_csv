<?php include('header.php'); ?>

    <br><br>

<?php include("forum_header.php"); ?>

    <table width="390" cellpadding="3" cellspacing="3" align=center>
        <?php

        //$the_array = Array();
        $handle = opendir('data/.');
        while (false !== ($file = readdir($handle))) {
            if ($file !== "." && $file !== "..") {
                // $the_array[] = $file;

                $ext = strlen($file);
                $ext_rem = substr($file, 0, 12);
                $read = file("data/$file");
                $sz = count($read);
                $readx = explode("#", $read[0]);
                $lastmodif = date("d.m.Y", filemtime("data/$file")); //
                $readx[30] = substr($readx[3], 0, 20);
                $readx[10] = substr($readx[1], 0, 20);
                $month = date("m.Y");

                if (stripos($lastmodif, $month) !== false) {
                    $lastmodif = str_replace((string)$month, "<font color=red>$month</font>", $lastmodif);

                    echo "<tr><td bgcolor='#FFFFDD'><a href='forum_view.php?page=$ext_rem' title='$readx[1]'> + $readx[10] </a></td><td bgcolor='#DDDDDE'> $readx[2] </td><td bgcolor=#FFFFDD> <b> [ $sz ] </b></font></td><td bgcolor='#DDDDDE' align=center> LPF: $lastmodif </font></td></tr>";
                }
            }
        }

        ?>

    </table>

<?php include("forum_header.php"); ?>
<?php include('footer.php'); ?>