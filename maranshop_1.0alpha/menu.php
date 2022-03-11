<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td class="SideTableHeading" height="27">Category Index</td>
    </tr>
    <tr>
        <td bgcolor="#b9a993" height="1"><img src="images/spacer.gif" border="0" height="1" width="1" alt=""></td>
    </tr>
    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td bgcolor="#b9a993" width="1"><img src="images/spacer.gif" border="0" height="1" width="1" alt="">
                    </td>
                    <td>
                        <table border="0" cellpadding="4" cellspacing="0">
                            <tr>
                                <td>
                                    <?php
                                    $file = file("cat.php");
                                    $sz = count($file);
                                    for ($i = 0; $i < $sz; $i++) {
                                        ?>

                                        <table>
                                            <tr>
                                                <td>&nbsp;
                                                    &nbsp;<a href="prod.php?cat=<?= $file[$i] ?>"
                                                             class="cats">
                                                        &#187; <?= $file[$i] ?></a></td>
                                            </tr>
                                        </table>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td bgcolor="#b9a993" width="1"><img src="images/spacer.gif" border="0" height="1" width="1" alt="">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="8"></td>
    </tr>
</table>

<table>
    <tr>
        <td height="6"><img src="images/spacer.gif" border="0" height="6" width="1" alt=""></td>
    </tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td class="SideTableHeading" height="28">Current Specials</td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><img src="images/spacer.gif" border="0" height="1" width="1" alt=""></td>
                    <td>
                        <table>
                            <tr>
                                <td valign="bottom" width="33%">

                                    &nbsp;&nbsp;<B>&#187; <A HREF="about.php"> About Us</A> </B><br>
                                    &nbsp;&nbsp;<B>&#187; <A HREF="index.php"> Store</A> </B><br>
                                    &nbsp;&nbsp;<B>&#187; <A HREF="terms.php"> Terms & Conditions</A> </B><br>
                                    &nbsp;&nbsp;<B>&#187; <A HREF="contact.php"> Contact</A> </B><br>
                                    &nbsp;&nbsp;<B>&#187; <A HREF="howto.php"> How to buy</A> </B><br>

                                </td>
                            </tr>
                        </table>

                    </td>
                    <td bgcolor="#cecece" width="1">
                        <img src="images/spacer.gif" border="0" height="1" width="1" alt="">
                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td height="10"></td>
    </tr>
</table>

<table>
    <tr>
        <td height="6"><img src="images/spacer.gif" height="6" width="1" alt=""></td>
    </tr>
</table>

<table>
    <tr>
        <td height="6"><img src="images/spacer.gif" height="6" width="1" alt=""></td>
    </tr>
</table>