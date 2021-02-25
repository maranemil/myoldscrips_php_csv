<? //setcookie("user","",time()-3600);?>
<?
session_start();
?>
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
<form action='login.php' method='post'>
    <input type=text name=username><br>
    <input type=password name=password><br>
    <input type=submit name=submit value=submit><br>
    <input type=hidden name='doit' value=yes>
</form>

<?
if ($_POST['doit'] == 'yes') {
   ######################################################################
   ///////////// here you can change your password/username //////////////
   $ma_user = "demo"; //your username
   $ma_pass = "demo"; //your password

////////////////////////////////////////////////////////////////////////

   if (($_POST['username'] == $ma_user) && ($_POST['password'] == $ma_pass)) {
	  $_SESSION['username'] = $ma_user;
	  $_SESSION['password'] = $ma_pass;
	  $_SESSION['hasacces'] = 'yes';

	  echo "<script>location.replace('admin.php')</script>";
   }
   else {
	  echo "Login Error! Username or Password are not match! Try again!";
	  exit;
   }
}

?>

