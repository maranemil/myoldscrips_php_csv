<?
session_start();

/*

Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
Released.............: 03.04.2006
Created by...........: Emil Maran (maran-emil.de)
Release type.........: Script PHP/mySQL
Price................: Freeware
Version..............: 1.0 Beta
Contact..............: maran_emil@yahoo.com
----------------------------------------------------------------------------------*/
####################################################################################

if (($_SESSION['hasacces'] != "yes") && ($_SESSION['username']) && ($_SESSION['password'])) {
   echo "error 467. bad login! <a href='login.php'>login here</a>";
   exit;
}

?>


<?
####################################################################################
/* insert one new product in text DB */
if ($_POST['action'] == "insert") {
   if ($_FILES['logo']['name'] != "") {
	  $imageInfo = getimagesize($_FILES['logo']['tmp_name']); // get image size
	  $width     = $imageInfo[0]; // image width
	  $height    = $imageInfo[1];  // image height

	  if ($height > 610 || $width > 810) {
		 echo "<script> alert('Image is to big! Try to resize the picture!') </script>";
		 exit;
	  } // check size

	  $newimg1 = date("YmdHis") . ".jpg";  // set name for new image
	  $newimg2 = date("YmdHis") . ".pdf"; // set name for pdf if is necesary

	  if (stristr($_SERVER['OS'], "win")) {
		 $path = "prodimg/";
	  } // determin path of image folder
      elseif (stristr($_SERVER['OS'], "linux")) {
		 $path = str_replace("admin.php", "", $_SERVER['SCRIPT_FILENAME']) . "prodimg/";
	  }
	  else {
		 $path = "prodimg/";
	  }

	  move_uploaded_file($_FILES['logo']['tmp_name'], $path . $newimg1);
   }  // copy image in image folder
   else {
	  $newimg1 = "pc.gif";
   } // if is not posible than set image name as pc.gif

   $fp   = fopen("prodtable.db", "a"); // write the new product in text DB
   $line = "#" . $_POST['cat'] . "#" . $_POST['prodname'] . "#" . $_POST['price'] . "#" . $_POST['descr'] . "#" . $newimg1 . "\r\n";
   fwrite($fp, $line);

   echo "<script>location.replace('admin.php?action=showall')</script>";
}
?>

<?php
####################################################################################
// get ID from GET and delete product from text DB
if ($_GET['action'] == "delete") {  // start of delete action
   $id   = $_GET['id'];
   $file = file("prodtable.db");
   $size = sizeof($file);

   for ($i = 0; $i < $size; $i++) {
	  $buffer = explode("#", $file[$i]);
	  if ($id != $i) {
		 $newlist[] = $file[$i];
	  }
   }

   // DELETE OLD LIST
   $fp       = fopen("prodtable.db", "w");
   $inputstr = "";
   fwrite($fp, $inputstr);
   fclose($fp);
   // REWRITE NEW LIST
   foreach ($newlist as $value) {
	  //echo $value."<BR>";
	  $fp       = fopen("prodtable.db", "a");
	  $inputstr = $value;
	  fwrite($fp, $inputstr);
	  fclose($fp);

	  //die('delete fine');
	  echo "<script>alert('product $id has been deleted')</script>";
	  echo "<script>location.replace('admin.php?action=showall')</script>";
   }
} // end of delete action

?>



<?
####################################################################################
// get data from form and replace in text DB
if ($_GET['action'] == "editprodnow") {
   $cat      = $_GET['cat'];
   $prodname = $_GET['prodname'];
   $price    = $_GET['price'];
   $descr    = stripslashes($_GET['descr']);
   $descr    = str_replace("\'", "'", $descr);
   $descr    = str_replace('\"', '"', $descr);
   $logo     = $_GET['logo'];
   $mypdf    = $_GET['mypdf'];

   $id   = $_GET['id'];
   $file = file("prodtable.db");
   $size = sizeof($file);

   for ($i = 0; $i < $size; $i++) {
	  //$buffer = explode("#",$file[$i]);
	  if ($i == $id) {
		 $file[$i] = "#$cat#$prodname#$price#$descr#$logo";
	  }
	  //if($file[$i]!=""){$newlist[] =  $file[$i];}
	  $newlist[] = $file[$i];
	  echo $file[$i] . "<BR>";
   }

   //die();
   // DELETE OLD LIST
   $fp       = fopen("prodtable.db", "w");
   $inputstr = "";
   fwrite($fp, $inputstr);
   fclose($fp);
   // REWRITE NEW LIST
   foreach ($newlist as $value) {
	  //echo $value."<BR>";
	  $fp       = fopen("prodtable.db", "a");
	  $inputstr = $value;
	  fwrite($fp, $inputstr);
	  fclose($fp);
   }

   echo "<script>alert('product $id has been edited')</script>";
   echo "<script>location.replace('admin.php?action=showall')</script>";
}

?>

<style>
    td {
        font-size: 11px;
        font-family: verdana;
        vertical-align: top;
        background: #EEEEEE;
        color: #333333;
        padding: 5px
    }

    input, select {
        font-size: 11px;
        font-family: verdana
    }

    td:hover {
        background: #DDDDDD;
        color: #FF0000
    }
</style>

<table border='0' width=700 align='center' cellpadding='2' cellspacing='2' bgcolor='#EEEEEE'>
    <tr>
        <td>
            <B>administration area</B> <BR><BR>

            | <A HREF="admin.php?action=showall"><B>show all products</B></A>
            | <A HREF="admin.php?action=addnew"><B>add new product</B></A>
            | <A HREF="login.php?action=logout"><B>Logout </B></A>
        </td>
    </tr>
</table>
<BR><BR>

<?
####################################################################################
if ($_GET['action'] == "showall") {
   $tim     = file("prodtable.db");
   $sizecat = count($tim);
   ////////////////////////////////////
   for ($i = 0; $i < $sizecat; $i++) {
	  $deti = explode("#", $tim[$i]);

	  if ($i % 2) {
		 $bgcolor = "#FFFFFF";
	  }
	  else {
		 $bgcolor = "#DDDDDD";
	  }

	  echo "<table bgcolor='#000000' border='0' width=700 align='center' cellpadding='1' cellspacing='1'>";
	  echo "
			<tr>
			<td width=150><B>Title:</B> " . $deti[2] . "/<B> <BR>Price:</B>" . $deti[3] . "<BR><BR></td>
			<td width=50> <A HREF='admin.php?id=$i&action=editprod'>edit</A>  <BR>
			<A HREF='admin.php?id=$i&action=delete'>delete</A><BR>
			<A HREF='prodshow.php?id=$i' target='_new'>view</A></td>
			<td  width=50> <img src='prodimg/$deti[5]' width=50>  </td><td> Info:</B> " . $deti[4] . "</td>
			</tr>";
	  echo "</table><BR>";
   }
}

?>




<?
####################################################################################
if ($_GET['action'] == "addnew") {
   echo "<CENTER><form action='admin.php' method='post' enctype='multipart/form-data'>";
   echo "<select name=cat><option value='cars' selected> - Select one category -";

   $file = file("cat.php");
   $sz   = sizeof($file);
   for ($i = 0; $i < $sz; $i++) {
	  echo "<option value='$file[$i]'> $file[$i]";
   }

   echo "</select><BR>";
   echo "<table>";
   echo "<tr><td> prod. name: </td><td><input type=text name=prodname size=30></td></tr>";
   echo "<tr><td> price: </td><td><input type=text name=price size=30 ></td></tr>";
   echo "<tr><td> description: </td><td><textarea name=descr cols=30 rows=7></textarea></td></tr>";
   echo "<tr><td> prod. image: </td><td><input type=file name=logo size=20></td></tr>";
   echo "<tr><td> </td><td><input type=submit name=submit value='add product'></td></tr>";
   echo "<tr><td> </td><td><input type=hidden name=action value=insert></td></tr>";
   echo "<tr><td></td><td></form></td></tr>";
   echo "</table>";
}
?>






<?
####################################################################################
if ($_GET['action'] == "editprod") {
   echo "<CENTER><form action='admin.php' method='get'>";

   $filex = file("prodtable.db");
   $szx   = sizeof($file);
   $id    = $_GET['id'];
   $detim = explode("#", $filex[$id]);

   echo "<table><tr><td>";
   echo "category: <input type=text name=cat size=30 readonly value='" . $detim[1] . "'><BR>";
   echo "product name: <input type=text name=prodname size=30 value='" . $detim[2] . "'><BR>";
   echo "price: <input type=text name=price size=30 value='" . $detim[3] . "'><BR>";
   echo "description: <textarea name=descr cols=30 rows=7>" . $detim[4] . "</textarea><BR>";
   echo "<input type=hidden name=logo size=20 readonly value='" . $detim[5] . "'><BR>";
   echo "<input type=hidden name=mypdf size=20 readonly value='" . $detim[6] . "'><BR>";
   echo "<input type=submit name=submit value='change product info now'><BR>";
   echo "<input type=hidden name=action value=editprodnow><BR>";
   echo "<input type=hidden name=id value='" . $id . "'><BR>";
   echo "</form></CENTER>";
   echo "</td></tr></table>";
}
?>


