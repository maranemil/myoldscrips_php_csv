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
	include("maranxssfilter.php");
	include("functions.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Demo Maran Store - Welcome</title>

<?
// this is your currency : can be $, Euro, ....
$currency = "$";

?>

	<meta name="title" content="Demo Maran Store">
	<meta name="copyright" content="2007">
	<meta name="organization" content="Demo Maran Store">
	<meta name="keywords" content="PHP, Shopping Cart, Cart, SunShop, Turnkey, Web, Tools">
	<meta name="description" content="Demo Maran Store shop. Do not buy from this shop.">
	<meta name="page-topic" content="Demo Maran Store">
	<meta name="audience" content="All">
	<meta name="robots" content="All">
	<meta name="revisit-after" content="7 DAYS">
	<meta name="language" content="English">

	<link rel="stylesheet" href="styles.css" type="text/css">

</head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginheight="0" marginwidth="0">


<div align="center">
	<table border="0" cellpadding="0" cellspacing="0" width="757">
		<tr>
			<td background="images/top_left_bg.gif" height="11" width="547"><img src="images/spacer.gif" alt="" border="0" height="1" width="1"></td>
			<td width="8"><img src="images/spacer.gif" border="0" height="1" width="8"></td>
			<td background="images/top_right_bg.gif" height="11" width="202"><img src="images/spacer.gif" border="0" height="1" width="1"></td>
		</tr>
		<tr>
			<td colspan="3" height="6"><img src="images/spacer.gif" border="0" height="6" width="1"></td>
		</tr>
		<tr>
			<td background="images/logo_bg.gif" height="83" width="547"><img src="images/spacer.gif" border="0" height="1" width="1"></td>
			<td width="8"><img src="images/spacer.gif" border="0" height="1" width="8"></td>
			<td width="202">
				<!--// Start Search //-->
			
			
			<table border="0" cellpadding="4" cellspacing="0" width="100%">
				<tr>
					<td class="search" align="left">Site Search:</td>
				</tr>
				<tr>
					<td align="center">
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td>

								<form action='search.php' method=get>
								<input type=text name=query style='font-size:11px'>
								<input name="Submit" src="images/submit.gif" border="0" type="image">
								</form>
								</td>
								<td>&nbsp;&nbsp;</td>
							</tr>
						</table>

				</td>
			</tr>
		</table>

			<!--// End Search //-->

		</td>
	</tr>
	<tr>
		<td colspan="3" height="6"><img src="images/spacer.gif" border="0" height="6" width="1"></td>
	</tr>
	<tr>
		<td width="547">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td><a href="index.php"><img src="images/home_off.gif" alt="" border="0" height="35" width="71"></a></td>
					<td><a href="terms.php"><img src="images/tos_off.gif" alt="" border="0" height="35" width="156"></a></td>
					<td><a href="terms.php"><img src="images/privacy_off.gif" alt="" border="0" height="35" width="122"></a></td>
					<td><a href="index.php"><img src="images/itemlist_off.gif" alt="" border="0" height="35" width="91"></a></td>
					<td><a href="contact.php"><img src="images/contact_off.gif" alt="" border="0" height="35" width="107"></a></td>
				</tr>
			</table>
		</td>
		<td width="8"><img src="images/spacer.gif" border="0" height="1" width="8"></td>
		<td width="202">
			
		</td>
	</tr>
	<tr>
		<td colspan="3" height="6"><img src="images/spacer.gif" border="0" height="6" width="1"></td>
	</tr>
</table>

<!--  end header -->

<table border="0" cellpadding="0" cellspacing="0" width="757">
<tr>
	<td valign="top" width="547">


<!--  start main -->