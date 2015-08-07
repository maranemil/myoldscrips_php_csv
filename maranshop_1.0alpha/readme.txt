################################################################################################
####
####   Maran php miniSHOP
####
################################################################################################
####
#### download site : http://maran.pamil-visions.com/
#### author: maran emil
#### email me at: maran_emil@yahoo.com
#### date: 03.04.2006
#### update: 16.04.2006
####
################################################################################################
################################################################################################

Instalation:

Copy file in root site folder. 
Create one folder "/prodimg/" and set chmod  777.
Create one folder "/maranlog/" and set chmod  777.

You can edit categories with notepad, just add or delete categories on cat.php file.

Currency can be changed from header.php

The order email adress can be set on sendorder.php
Repalce your@mail-adress.com with your email adress on  $to = "your@mail-adress.com"; code line.


Admin module is loaded by accesing login.php. The username/password can be changed on login.php and admin.php.
////////////////////////////////////////////////////////////////////////////////////////////////
in admin.php replace if($readcookie!="demo")  cu if($readcookie!="your_password")
in login.php replace demo with you password


$ma_user = "demo"; //your username
$ma_pass = "demo"; //your password
///////////////////////////////////////////////////////////////////////////////////////////////
size of pictures can be set in pixel from header.php 
$imgwsize="150"; //width
$imghsize="111"; //height
///////////////////////////////////////////////////////////////////////////////////////////////
For instalation help sent email to  maran_emil@yahoo.com.


################################################

important:

For import product/fotos you have 2 ways. 
1. you can use the admin area with add / edit/ delete
2. you can copy fotos in /prodimg/ folder and after you can edit the prodtable.db with some text editor and add new line like:

category/ prodname/ price/ about/ picture

example is next line:
 
#cars#Jaguar#40000#speed car#photo.jpg

every product has a line like this :)

#########################################################################################

Instalare: 

Copiaza fisierele in root.
Creaza un folder "/prodimg/" pe care il setezi chmod 666 sau 777.
Creaza un folder "/maranlog/" pe care il setezi chmod 666 sau 777.

Categoriile se pot edita usor in notepad, pur si simplu se adauga sau se scot din fisierul cat.php 

Adresa de email pe care doriti sa primiti comenzile se seteaza din fisierul sendorder.php
In loc de your@mail-adress.com inlocuiti cu adresa de email pe care doriti sa primiti comanda in linia $to = "your@mail-adress.com";

Modulul de administrare se aceseaza de la fisierul login.php. Parola se schimba tot din login.php precum si admin.php.
////////////////////////////////////////////////////////////////////////////////////////////////
in admin.php inlocuiti if($readcookie!="demo")  cu if($readcookie!="parola_dorita")
in login.php inlocuiti demo cu parola dorita

$ma_user = "demo"; //your username
$ma_pass = "demo"; //your password
///////////////////////////////////////////////////////////////////////////////////////////////
marimea pozelor se seteazain pixel din header.php 
$imgwsize="150";
$imghsize="111";
///////////////////////////////////////////////////////////////////////////////////////////////

Daca aveti nevoie de ajutor la instalare trimiteti email pe adreasa  maran_emil@yahoo.com. 