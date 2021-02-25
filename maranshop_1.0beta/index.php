<?
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
<? include("header.php"); ?>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td height="6"><img src="images/spacer.gif" border="0" height="6" width="1"></td>
        </tr>
    </table>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td background="images/mid_nav_bg.gif" height="25">

                <table class="TopNav" align="center" border="0" cellpadding="2" cellspacing="0" width="100%">
                    <tr>
                        <td class="TopNav" align="left" valign="top" width="100%">&nbsp;&nbsp;<a href="" class="nav">Demo Store</a> � Welcome</td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td>

                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td height="6"><img src="images/spacer.gif" border="0" height="6" width="1"></td>
                    </tr>
                </table>

                <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                    <tr>
                        <td height="100%" valign="top">
                            <div align="left">
                                <font class="HeadingFont">Welcome</font><br><br>

                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla a turpis. Suspendisse sollicitudin lacus. Praesent pede lorem, lacinia et,
                                aliquam nec, luctus at, lectus. Aliquam vulputate pharetra purus. Vivamus mattis. Aliquam mi. Proin tellus. Duis interdum blandit lorem. Nullam
                                sit amet felis. Ut accumsan orci ut nisi. Morbi viverra. Etiam mauris. Nullam orci orci, vehicula sit amet, nonummy n .... <br><br>

                            </div>
                        </td>
                    </tr>
                </table>

                <table class="CenterTableItems" border="0" cellpadding="2" cellspacing="0" width="100%">
                    <tr>
                        <td class="CenterTableHeading" valign="top">New Products</td>
                    </tr>
                </table>

                <table width='547' align='center' cellpadding='5' cellspacing='5'>
                    <tr>
					   <?
					   ShowIndexProd(2);
					   ShowIndexProd(3);
					   ShowIndexProd(4);
					   ?>
                    </tr>
                </TABLE>

                <table width='547' align='center' cellpadding='5' cellspacing='5'>
                    <tr>
					   <?
					   ShowIndexProd(5);
					   ShowIndexProd(6);
					   ShowIndexProd(7);
					   ?>
                    </tr>
                </TABLE>

                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td height="6"><img src="images/spacer.gif" border="0" height="6" width="1"></td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td height="6"><img src="images/spacer.gif" border="0" height="6" width="1"></td>
        </tr>
    </table>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td background="images/bottom_area_top.gif" height="11"><img src="images/spacer.gif" border="0" height="1" width="1"></td>
        </tr>
        <tr>
            <td background="images/bottom_area_bottom.gif" height="20"></td>
        </tr>
    </table>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td height="6"><img src="images/spacer.gif" border="0" height="6" width="1"></td>
        </tr>
    </table>

    <!--  end main -->
<? include("footer.php"); ?>