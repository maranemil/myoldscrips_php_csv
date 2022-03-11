<?php //setcookie("user","",time()-3600);?>
<?php
session_start();
?>

<form action='login.php' method='post'>
    <label>
        <input type=text name=username>
    </label><br>
    <label>
        <input type=password name=password>
    </label><br>
    <input type=submit name=submit value=submit><br>
    <input type=hidden name='doit' value=yes>
</form>

<?php
if ($_POST['doit'] === 'yes') {
   ######################################################################
   ///////////// here you can change your password/username //////////////
   $ma_user = "demo"; //your username
   $ma_pass = "demo"; //your password

////////////////////////////////////////////////////////////////////////

   if (($_POST['username'] === $ma_user) && ($_POST['password'] === $ma_pass)) {
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

