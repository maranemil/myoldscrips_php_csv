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
<?php include("maranxssfilter.php"); ?>
    <style>
        A:link {
            color: #6BA21F;
            TEXT-DECORATION: none
        }

        A:hover {
            color: #6BA21F;
            TEXT-DECORATION: none
        }

        A:active {
            color: #6BA21F;
            TEXT-DECORATION: none
        }

        A:visited {
            color: #6BA21F;
            TEXT-DECORATION: none
        }

        TD, input, select, textarea, a, b, strong {
            COLOR: #444444;
            font-family: Tahoma, serif;
            font-size: 11px;
            vertical-align: top;
        }

        .maran {
            color: #6BA21F;
        }
    </style>

<?php
// inputs cleaner 
function CleanTagsPOST()
{
    if ($_POST) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = str_replace(array('<', '>', '?', 'script', '(', '=', ')'), '', $value);
        }
    }
}

CleanTagsPOST();

?>