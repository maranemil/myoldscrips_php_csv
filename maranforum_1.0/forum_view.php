<?
/*

Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
Released.............: 31.01.2006
Created by...........: Emil Maran (maran-emil.de)
Release type.........: Script PHP/mySQL
Price................: Freeware
Version..............: 1.0 Beta
Contact..............: maran_emil@yahoo.com
----------------------------------------------------------------------------------*/
?>
<? include('header.php'); ?>
<? include("forum_header.php"); ?>

<table width="390" cellpadding="3" cellspacing="3" align="center">
    <tr>
        <td>
		   <?
		   $page = $_GET["page"];

		   if ($page == "") {
			  echo "there is no target subject";
		   }
		   if ($page !== "") {
			  $file = file("data/$page.txt");
			  $size = count($file) - 1;

			  $subject = explode("#", $file[0]);
			  echo "<b>| @ subject: $subject[1]  <br>| </b><br><br>";

			  $i = -1;
			  while ($i < $size) {
				 $i++;
				 $filese = explode("#", $file[$i]);

				 $filese[3] = str_replace(array("& 351;", "& 259;", "& 350;", "& 355;", "& 354;", "("), array("s", "a", "S", "t", "T", ""), $filese[3]);
				 $filese[3] = wordwrap($filese[3], 75, "<br />", 1);

				 echo " + + + + + + <b> $filese[2] </b><br><div align=justify> ||| $filese[3] ||| </div> <br><b>$filese[4] </b><br><hr size=1 color=#000000>";
			  }

			  echo "<center><a href='forum_replay.php?page=$page&subject=$subject[1]'> | <B>+ answer at topic </B></a><a href='forum_index.php'>| <B>+ back to index</B> </a>|</center>";
		   }
		   ?>
        </td>
    </tr>
</table>

<?php include('footer.php'); ?>
