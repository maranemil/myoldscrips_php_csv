<?php /** @noinspection SpellCheckingInspection */

#############################
#
# shoutBOX v1.2
#
# coded: kai
# email: kai@endity.com
# site: http://endity.com
#
#############################

//--------------------------------------------------------------------------- Start Vars

// Place your settings between the two speech marks like the examples

$color1 = "#2C333B";
$color2 = "#2C333B";
$color3 = "#2C333B";
$text = "#ffffff";

// These are the text field colours

$color4 = "#ffffff";
$color5 = "#ffffff";
$color6 = "#ffffff";

// Link Colours

$link1 = "#FF9900";
$link2 = "#666666";
$link3 = "#FF9900";

// These are the colours for the post backgrounds and border

$table1 = "#2C333B";
$table2 = "#2C333B";
$table_bdr = "#2C333B";

// Time Adjust (enter 12 to -12 to alter the time displayed under the posters name)

$time_a = "0";

// Max Characters allowed to be posted in the message field

$max_char = "100";

// Swear filter

$word1 = "fuck";
$censor1 = "f**k";
$word2 = "shit";
$censor2 = "s**t";
$word3 = "bastard";
$censor3 = "b*****d";
$word4 = "ass";
$censor4 = "a$$";

// Scroll (Yes or No)

$scroll = "no";

//-----------DO NOT EDIT BELOW THIS LINE---------------------------

//--------------------------------------------------------------------------- End Vars

$act = $_REQUEST['act'];
if ($act === "add") {
//--------------------------------------------------------------------------- Start Add

    echo "<link rel='stylesheet' href='text.css' type='text/css'>";
    echo "<body bgcolor='$color1' style='margin: 0;'>";

    $info = $_REQUEST['info'];
    $site = $_REQUEST['site'];
    $name = $_REQUEST['name'];
    $name = strip_tags($name, "");

    if ($site === "https://") {
        $name_link = $name;
    } elseif ($site === "") {
        $name_link = "$name";
    } else {
        $name_link = "<a href=\"$site\" target=\"_blank\">$name</a>";
    }

    if ($name === "name") {
        print "<meta http-equiv=\"refresh\" content=\"0; URL=board.php?message=Enter+Name&info2=$info&site2=$site\">";
    } elseif ($name === "") {
        print "<meta http-equiv=\"refresh\" content=\"0; URL=board.php?message=Enter+Name&info2=$info&site2=$site\">";
    } elseif ($info === "") {
        print "<meta http-equiv=\"refresh\" content=\"0; URL=board.php?message=Enter+Message&name2=$name&site2=$site\">";
    } elseif ($info === "message") {
        print "<meta http-equiv=\"refresh\" content=\"0; URL=board.php?message=Enter+Message&name2=$name&site2=$site\">";
    } elseif (strlen($info) > $max_char) {
        print "<meta http-equiv=\"refresh\" content=\"0; URL=board.php?message=Max+Characters+($max_char)&name2=$name&site2=$site\">";
    } else {
        $file = "data.dat";

//----------------------- Start Bcode

        $info = strip_tags($info, "");
        $info = str_replace(":)", "<img src='smilies/smile.gif' alt=''/>", $info);
        $info = str_replace(":(", "<img src='smilies/sad.gif' alt=''/>", $info);
        $info = str_replace(":P", "<img src='smilies/bigrazz.gif' alt=''>", $info);
        $info = str_replace(":D", "<img src='smilies/biggrin.gif' alt=''>", $info);
        $info = str_replace("8)", "<img src='smilies/cool.gif' alt=''>", $info);
        $info = str_replace(":@", "<img src='smilies/mad.gif' alt=''>", $info);
        $info = str_replace(";)", "<img src='smilies/wink.gif' alt=''>", $info);
        $info = str_replace("???", "<img src='smilies/confused.gif' alt=''>", $info);
        $info = str_replace("[url]", "[<a href=\"", $info);
        $info = str_replace("[/url]", "\" target=\"_blank\">www</a>]", $info);
        $info = str_replace("[mail]", "[<a href=\"mailto:", $info);
        $info = str_replace("[/mail]", "\">@</a>]", $info);
        $info = str_replace("$word1", "$censor1", $info);
        $info = str_replace("$word2", "$censor2", $info);
        $info = str_replace("$word3", "$censor3", $info);
        $info = str_replace("$word4", "$censor4", $info);
        $info = stripslashes($info);
        $name = stripslashes($name);
        $name_link = stripslashes($name_link);

//----------------------- End Bcode

//----------------------- Start Add Content

        $date = date("G:i", time());

        $date_array = explode("-", $date);

        $new = $date_array[0] . $time_a;

        $daten = date(":: m/d @ $new:i ::", time());

        print "<meta http-equiv=\"refresh\" content=\"0; URL=board.php\">";

        $fp = fopen($file, 'rb+') or die ("error when opening $file");
        flock($fp, 2);
        $old = fread($fp, filesize($file));
        rewind($fp);
        fwrite($fp, ":: <b>$name_link</b> : $info<br>$daten<br>\n" . $old);
        flock($fp, 3);
        fclose($fp);
//----------------------- End Add Content

    }
//--------------------------------------------------------------------------- End Add

} elseif ($act === "all") {
//--------------------------------------------------------------------------- Start View All

    print "<html lang='en'><head>

<style type=\"text/css\">
<!--
a:active {  color: $link3; text-decoration: none}
a:visited {  color: $link1; text-decoration: none}
a:hover {  color: $link2; text-decoration: none}
a:link {  color: $link3; text-decoration: none}
-->
</style>

<style>body{scrollbar-face-color: $color2; scrollbar-shadow-color: $color3; 
scrollbar-highlight-color: $color2; scrollbar-3dlight-color: $color3; 
scrollbar-darkshadow-color: $color2; scrollbar-track-color: $color2; 
scrollbar-arrow-color: $color3;}</style>

<title>:: shoutBOX</title>

<link rel='stylesheet' href='text.css' type='text/css'></head>

<body bgcolor=\"$color1\" style=\"margin: 0;\">";

    $file = "data.dat";
    $fp = fopen($file, 'rb') or die ("error when reading $file");
    while (!feof($fp)) {
        $line = fgets($fp, 9216);
        print "<table width=\"220\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
        <tr> 
          <td bgcolor=\"$table1\"><span color=\"$text\" size=\"1\">$line</span></td>
        </tr></table>";
    }

    print "<br><div align=\"center\"><span color=\"$text\" size=\"1\">[ <a href=\"javascript:self.close()\">close</a> ]</div></font></body></html>";
//--------------------------------------------------------------------------- End View All

} elseif ($act === "help") {
//--------------------------------------------------------------------------- Start Help

    print "<html lang='en'>
<head>
<title>:: shoutBOX : Info</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">

<style>body{scrollbar-face-color: $color2; scrollbar-shadow-color: $color3; 
scrollbar-highlight-color: $color2; scrollbar-3dlight-color: $color3; 
scrollbar-darkshadow-color: $color2; scrollbar-track-color: $color2; 
scrollbar-arrow-color: $color3;}</style>

<style type=\"text/css\">
<!--
a:active {  color: $link3; text-decoration: none}
a:visited {  color: $link1; text-decoration: none}
a:hover {  color: $link2; text-decoration: none}
a:link {  color: $link3; text-decoration: none}
-->
</style>

</head>

<body bgcolor=\"$color1\" text=\"$text\" style=\"margin: 0;\">
<table width=\"220\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"200\">
  <tr>
    <td valign=\"top\">
      <p><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">:: I want 
        a shoutBOX!<br>
        </font></b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">Point 
        you browser to endity.com where you will be able to download the latest 
        version of shoutBOX</font></p>
      <p><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">:: Bcode<br>
        </font></b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">shoutBOX 
        has the ability to convert smilies. It also has certain codes for links 
        etc. Heres a list of the codes that can be used:</font></p>
      <table width=\"220\" border=\"0\" cellspacing=\"3\" cellpadding=\"0\" align=\"center\">
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">Code</font></b></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">Appears</font></b></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">:)</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><img src=\"smilies/smile.gif\"></font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">:(</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><img src=\"smilies/sad.gif\"></font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">;)</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><img src=\"smilies/wink.gif\"></font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">:P</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><img src=\"smilies/bigrazz.gif\"></font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">:D</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><img src=\"smilies/biggrin.gif\"></font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">:@</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><img src=\"smilies/mad.gif\"></font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">???</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><img src=\"smilies/confused.gif\"></font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">8)</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><img src=\"smilies/cool.gif\"></font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">[url]http://end<br>
              ity.com[/url]</font></div>
          </td>
          <td width=\"50%\"> 
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">[<a href=\"http://endity.com\">www</a>]</font></div>
          </td>
        </tr>
        <tr bgcolor=\"$table2\"> 
          <td width=\"50%\">
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">[mail]name@msn<br>
              .com[/mail]</font></div>
          </td>
          <td width=\"50%\">
            <div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">[<a href=\"mailto:name@msn.com\">@</a>]</font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table></body>
</html>";
//--------------------------------------------------------------------------- End Help

} else {
//--------------------------------------------------------------------------- Start Board View

    $file = "data.dat";
    $fp = fopen($file, 'rb+') or die ("error when reading $file");
    $mess = file($file);

    if ($name2 === "$name") {
        $name2 = "name";
    }

    if ($info2 === "$info") {
        $info2 = "message";
    }

    if ($site2 === "$site") {
        $site2 = "https://";
    }

    print " color=\\";
    print "<table width=\"230\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td bgcolor=\"$table_bdr\"> 
      <table width=\"230\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">
        <tr> 
          <td bgcolor=\"$table1\"><font face=\"Verdana\" color=\"$text\" size=\"1\">$mess[0]</font></td>
        </tr>
        <tr>
          <td bgcolor=\"$table2\"><font face=\"Verdana\" color=\"$text\" size=\"1\">$mess[1]</font></td>
        </tr>
        <tr>
          <td bgcolor=\"$table1\"><font face=\"Verdana\" color=\"$text\" size=\"1\">$mess[2]</font></td>
        </tr>
        <tr>
          <td bgcolor=\"$table2\"><font face=\"Verdana\" color=\"$text\" size=\"1\">$mess[3]</font></td>
        </tr>
        <tr>
          <td bgcolor=\"$table1\"><font face=\"Verdana\" color=\"$text\" size=\"1\">$mess[4]</font></td>
        </tr>
        <tr>
          <td bgcolor=\"$table2\"><font face=\"Verdana\" color=\"$text\" size=\"1\">$mess[5]</font></td>
        </tr>
      </table>
    </td>
  </tr>
</table>";
    print "</font>";
    print "<div align=\"center\"><form name=\"input\" method=\"post\" action=\"board.php?act=add\">
  <font face=\"Verdana, Arial, Helvetica, sans-serif\"> <font size=\"1\" color=\"$text\"> 
  <input type=\"text\" name=\"name\" value=\"$name2\" onfocus=\"this.value=''\" class=\"text\" style=\"border:1px solid $color4; border-style: solid; background-color:$color5;\" size=\"17\"><br>
<input type=\"text\" name=\"site\" value=\"$site2\" class=\"text\" style=\"border:1px solid $color4; border-style: solid; background-color:$color5;\" size=\"17\">
  <br>
  <input type=\"text\" name=\"info\" value=\"$info2\" onfocus=\"this.value=''\" class=\"text\" style=\"border:1px solid $color4; border-style: solid; background-color:$color5;\" size=\"17\"><br>
  <input type=\"submit\" name=\"Submit\" value=\"shout\" class=\"text\" style=\"border:1px solid $color4; border-style: solid; background-color:$color6;\"> [ <a href=\"javascript:openScript('?act=all','150','400')\">all</a> : <a href=\"javascript:openScript('?act=help','216','400')\">info</a> ] 
<br><font color=\"#FF0000\"><br><b> $message </b></font>
  </font> </font> 
</form></html></div>";
//--------------------------------------------------------------------------- End Board View

}

