<?php
include('header.php');

for ($i = 0; $i < 5; $i++) {


    $file = array_reverse(file("myblog.db"));
    $size = count($file);
    //for display 10 articles on index
    $sizex = $size - ($size - 10);
    for ($ji = 0; $ji < $sizex; $ji++) {
        $buffer = explode("#", $file[$ji]);
        if (stripos($buffer[4], ".jpg") !== false) {
            $pic = "<img src='imgblog/$buffer[4]' alt=''>";
        } else {
            $pic = "";
        }

        if ($buffer[2] !== "") {
            $buffer[3] = str_replace(":sm0:", "<img src='emoticons/sm0.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm1:", "<img src='emoticons/sm1.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm2:", "<img src='emoticons/sm2.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm3:", "<img src='emoticons/sm3.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm4:", "<img src='emoticons/sm4.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm5:", "<img src='emoticons/sm5.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm6:", "<img src='emoticons/sm6.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm7:", "<img src='emoticons/sm7.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm8:", "<img src='emoticons/sm8.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm9:", "<img src='emoticons/sm9.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm10:", "<img src='emoticons/sm10.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm11:", "<img src='emoticons/sm11.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm12:", "<img src='emoticons/sm12.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm13:", "<img src='emoticons/sm13.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm14:", "<img src='emoticons/sm14.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm15:", "<img src='emoticons/sm15.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm16:", "<img src='emoticons/sm16.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm17:", "<img src='emoticons/sm17.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm18:", "<img src='emoticons/sm18.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm19:", "<img src='emoticons/sm19.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm20:", "<img src='emoticons/sm20.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm21:", "<img src='emoticons/sm21.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm22:", "<img src='emoticons/sm22.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm23:", "<img src='emoticons/sm23.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm24:", "<img src='emoticons/sm24.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm25:", "<img src='emoticons/sm25.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm26:", "<img src='emoticons/sm26.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm27:", "<img src='emoticons/sm27.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm28:", "<img src='emoticons/sm28.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm29:", "<img src='emoticons/sm29.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm30:", "<img src='emoticons/sm30.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm31:", "<img src='emoticons/sm31.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm32:", "<img src='emoticons/sm32.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm33:", "<img src='emoticons/sm33.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm34:", "<img src='emoticons/sm34.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm35:", "<img src='emoticons/sm35.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm36:", "<img src='emoticons/sm36.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm37:", "<img src='emoticons/sm37.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm38:", "<img src='emoticons/sm38.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm39:", "<img src='emoticons/sm39.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm40:", "<img src='emoticons/sm40.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm41:", "<img src='emoticons/sm41.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm42:", "<img src='emoticons/sm42.gif' alt=''>", $buffer[3]);
            $buffer[3] = str_replace(":sm43:", "<img src='emoticons/sm43.gif' alt=''>", $buffer[3]);

            echo "<TABLE width='480'>";
            echo "<TR>";
            echo "<TD><B><font size=5>$buffer[2]</font><br> - $buffer[5] - Art Nr: $buffer[1]</B><BR><BR></TD>";
            echo "</TR>";
            echo "<TR>";
            echo "<TD><FONT COLOR='#FFFFFF'>$buffer[3]</FONT></TD>";
            echo "</TR>";
            echo "<TR>";
            echo "<TD><BR><BR> $pic</TD>";
            echo "</TR>";
            echo "<TR>";
            echo "<TD align='right'><BR><BR><A HREF='comments.php?id=$buffer[1]'><B>Add comment</B></A> | <A HREF='view.php?id=$buffer[1]'><B>View comments</B></A></TD>";
            echo "</TR>";
            echo "</TABLE><BR><hr size=1 style='border: 1px dashed' width='95%'><BR>";
        }
    }
}
?>
<?php include('menu.php'); ?>
<?php include('footer.php'); ?>