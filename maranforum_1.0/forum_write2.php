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
<?php include ('header.php');  ?>

<? if($_POST['checkcode1']!=$_POST['checkcode2']){echo "wrong code!"; exit;}?>
<? if((!$_POST['subject'])||(!$_POST['comment'])||(!$_POST['name'])){echo "incomplete fields"; exit;}?>

<?
#######################################################################################
	if ( $_FILES['filemx']['name'] != "" ) { 
		$imageInfo = getimagesize($_FILES['filemx']['tmp_name']);
		$width = $imageInfo[0];
		$height = $imageInfo[1]; 
		if($height >673 || $width > 862){echo "<script> alert('Image is to big! Try to resize the picture!') </script>";exit;}
		$newimg = date("YmdHis").".jpg"; 

		if(stristr($_SERVER['OS'],"linux")){
			$path = str_replace("admin.php","",$_SERVER['SCRIPT_FILENAME']) . "datafoto/";
			}
		else{
			$path = "datafoto/";
		}

		$file_name = $_FILES['filemx']['name']; 
		$file_type = $_FILES['filemx']['type']; 
		$file_ext = strtolower(substr($file_name,strrpos($file_name,"."))); 

		$FILE_MIMES = array('image/pjpeg','image/jpg','mage/jpeg'); 
		$FILE_EXTS  = array('.jpg','.jpeg','.JPG','.JPEG');
		
		if ((!in_array($file_type, $FILE_MIMES)) && (!in_array($file_ext, $FILE_EXTS))) {
			echo "<script> alert('File is not JPG image!') </script>"; exit;  
		}
		
		move_uploaded_file ( $_FILES['filemx']['tmp_name'], $path . $newimg  );

	}
	else{
		$newimg="noimg.jpg"; 
	}


#######################################################################################

$name=$_POST["name"];
$name =str_replace("#"," ",$name);
$subject=$_POST["subject"];
$subject =str_replace("#"," ",$subject);
$comment = $_POST["comment"];
$comment =str_replace("#"," ",$comment);
$comment = ereg_replace("\r\n","<BR>",$comment);

$page=$_POST["page"];
$infodate = date ('r');
$ip = $_SERVER["REMOTE_ADDR"];
//$time = date("YmdHi");

	$fp = fopen("data/$page.txt","a");
	$line = "#$subject#$name#$comment <BR><img src='datafoto/$newimg'><BR>#$infodate#$ip \r\n";
	fwrite($fp,$line);
	fclose($fp);


echo "<script>location.replace('forum_index.php')</script>";

?>