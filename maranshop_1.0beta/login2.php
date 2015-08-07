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
<?
$ma_pass=$_GET['ma_pass'];
$action=$_GET['action'];
//$datecookie = date("d");
$usercookie = $ma_pass;


if($action=="login"){
	setcookie("user","$usercookie",time()+3600);
	echo "<script>location.replace('admin.php')</script>";
}

if($action=="logout"){
	//setcookie("user","",time()-3600);
	
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['hasacces']);
	echo "<script>location.replace('login.php')</script>";
}
?>