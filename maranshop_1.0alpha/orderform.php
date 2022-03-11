<?php include("header.php"); ?>
    <form action='sendorder.php' method='post'>
        <TABLE>

            <TR>
                <TD><B>Product name:</B></TD>
                <TD>
                    <label>
                        <input readonly type=text name=prodname value="<?= $_GET['prodname'] ?>">
                    </label>
                </TD>
            </TR>
            <TR>
                <TD><B>Price:</B></TD>
                <TD><label>
                        <input readonly type=text name=price value="<?= $_GET['price'] . $curency ?>">
                    </label><BR></TD>
            </TR>
            <TR>
                <TD>Quantity:</TD>
                <TD><label>
                        <input type=text name=quantity>
                    </label><BR></TD>
            </TR>
            <TR>
                <TD>Your full name:</TD>
                <TD><label>
                        <input type=text name=name>
                    </label><BR></TD>
            </TR>
            <TR>
                <TD>Your email:</TD>
                <TD><label>
                        <input type=text name=email>
                    </label><BR></TD>
            </TR>
            <TR>
                <TD>Your phone:</TD>
                <TD><label>
                        <input type=text name=phone>
                    </label><BR></TD>
            </TR>
            <TR>
                <TD>Country:</TD>
                <TD><label>
                        <input type=text name=country>
                    </label><BR></TD>
            </TR>
            <TR>
                <TD></TD>
                <TD><input type=submit name=submit value='send order now'></TD>
            </TR>

        </TABLE>
    </form>
<?php include("footer.php"); ?>