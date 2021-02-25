<? include("header.php"); ?>

    <TABLE>
        <form action='sendorder.php' method='post'>
            <TR>
                <TD><B>Product name:</B></TD>
                <TD><input readonly type=text name=prodname value="<?= $_GET['prodname']; ?>"><BR></TD>
            </TR>
            <TR>
                <TD><B>Price:</B></TD>
                <TD><input readonly type=text name=price value="<?= $_GET['price'] . $curency; ?>"><BR></TD>
            </TR>
            <TR>
                <TD>Quantity:</TD>
                <TD><input type=text name=quantity><BR></TD>
            </TR>
            <TR>
                <TD>Your full name:</TD>
                <TD><input type=text name=name><BR></TD>
            </TR>
            <TR>
                <TD>Your email:</TD>
                <TD><input type=text name=email><BR></TD>
            </TR>
            <TR>
                <TD>Your phone:</TD>
                <TD><input type=text name=phone><BR></TD>
            </TR>
            <TR>
                <TD>Country:</TD>
                <TD><input type=text name=country><BR></TD>
            </TR>
            <TR>
                <TD></TD>
                <TD><input type=submit name=submit value='send order now'></TD>
            </TR>
        </form>
    </TABLE>

<? include("footer.php"); ?>