<?php
/*

Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
Released.............: 03.04.2006
Created by...........: Emil Maran (maran-emil.de)
Release type.........: Script PHP/mySQL
Price................: Freeware
Version..............: 1.0 Beta
Contact..............: maran_emil@yahoo.com
----------------------------------------------------------------------------------*/
?>
<?php include("header.php"); ?>

    <TABLE>
        <form action='sendorder.php' method='post'>
            <TR>
                <TD><B>Product name:</B></TD>
                <TD><input readonly type=text name=prodname value="<?= $_GET['prodname'] ?>"><BR></TD>
            </TR>
            <TR>
                <TD><B>Price:</B></TD>
                <TD><input readonly type=text name=price value="<?= $_GET['price'] . $curency ?>"><BR></TD>
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

<?php include("footer.php"); ?>