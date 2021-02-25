<?php
/*
if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            //echo "$file\n";
			echo "<a href='".$file."'> ".$file." </a><br />";
        }
    }
    closedir($handle);
}*/
?>

<?

if ($handle = opendir('.')) {
   while (false !== ($file = readdir($handle))) {
	  if ($file != "." && $file != "..") {
		 //echo "$file\n";
		 //echo "<a href='".$file."'> ".$file." </a><br />";
		 $afile[] = $file;
	  }
   }
   closedir($handle);
}

sort($afile);
$anz = count($afile);
for ($i = 0; $i < $anz; $i++) {
   echo "<a href='" . $afile[$i] . "'> " . $afile[$i] . " </a><br />";
}
?>