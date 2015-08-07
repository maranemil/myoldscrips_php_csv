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
####################################################################################
$to = "your@mail-adress.com";

if(($_POST['name']!="")&&($_POST['email']!="")&&($_POST['phone']!="")&&($_POST['quantity']!="")){

	####### dont edit the code after this line! ###################################
	$subject = 'inquery from my shop site !!!';
	$from = $_POST['email'];
	$content = "Name:" . $_POST['name'] ."<br>Email:". $_POST['email'] ."<br>Phone:". $_POST['phone'] ."<br>Country:". $_POST['country'] ."<br>Product name:". $_POST['prodname'] ."<br>Price:". $_POST['price'] ."<br>Quantity:". $_POST['quantity'];

	mail($to , $subject, $content, "From: $from \n" ."MIME-Version: 1.0\n" . "Content-type: text/html; charset=iso-8859-1");
	echo "<script>alert('order was sent! thank you!')</script>";
}
else{
	echo "<script>alert('order fail! message was not complete!')</script>";
}
echo "<script>location.replace('index.php')</script>";
?>