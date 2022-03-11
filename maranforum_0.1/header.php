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