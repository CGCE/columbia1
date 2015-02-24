<?php
ini_set('display_errors',1);
error_reporting(999);

session_start();
include "../include/lang_FR.php";
$_SESSION['lang']="fr";
if(isset($_GET['en']))
	{
	include "../include/lang_EN.php";
	$_SESSION['lang']="en";
	}
	
include "../include/class.CJForm.php";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php 
echo "<title>Reid Hall, {$lang['titre']}</title>\n";
echo "<script type='text/JavaScript'>var date_format=\"{$lang['date_format']}\";</script>\n";
?>
<link rel='shortcut icon' type='image/x-icon' href='http://www.reidhall.com/informations/img/favicon.ico' /> 
<link rel='stylesheet' type='text/css' href= 'style.css' media='all' />
<link rel='stylesheet' type='text/css' href= 'vendor/jquery-ui-1.10.4.custom/css/CGC/jquery-ui-1.10.4.custom.min.css' media='all' />
<script type='text/JavaScript' src='vendor/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js'></script>
<script type='text/JavaScript' src='vendor/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js'></script>
<script type='text/JavaScript' src='script.js'></script>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
</head>

<body onload='init_form();'>
<form name='form' method='post' action='valid.php' onsubmit='return control_form();'>
<input type='hidden' name='page' />
<center>
<table style='width:90%;'>
<tr style='vertical-align:middle;'><td style='width:50%;'>
<div id='entete'>
<img src='../img/logo.gif' alt='REID HALL Columbia Global Centers | Europe'/>
</div>
</td>

<td>
<div id='entete2'>
<?php 
echo "<h2>{$lang['titre']}</h2>\n";
echo "<div style='text-align:right;'>\n";
if(isset($_GET['en']))
	echo "<a href='index.php'><img src='../img/drapeau_francais.jpg' alt='Français' border='0'/></a>\n";
else
	echo "<a href='index.php?en'><img src='../img/drapeau_anglais.jpg' alt='English' border='0'/></a>\n";
?>
</div>
</div>
</td></tr></table>

<hr/>
<div id='page1'>
<table>

<?php


$f=new CJForm();
$f->setLanguage($_SESSION['lang']);

$f->p("intro1");
$f->separator();

$f->h("project");
$f->inputText("CUGlobalCenter",true);
$f->inputText("school",true);
$f->inputText("programTitle",true);
$f->inputText("programProject",true);
$f->inputText("costEstimate",true);
$f->inputDates("beginningDate",true);
$f->inputDates("endingDate",true);

$f->separator();
$f->h("organizer");
$f->inputText("organizer",true);
$f->inputText("firstname",true);
$f->inputText("lastname",true);
$f->inputText("courriel",true);

$f->separator();
//$f->h("roomReserved");
$f->h("nature");
$f->select("roomReserved","grandeSalle,salleConference,autre_precisez",true);

//$f->separator();
//$f->h("nature");
$f->select("type","colloque,conference,seminaire,table-ronde,autre_precisez",true);
$f->radio("refreshments","oui,non",true,2);
$f->p("contact_paris_admin");

//$f->separator();
//$f->h("timesRequested");
$f->selectHours("timesRequested",true);

//$f->separator();
//$f->h("public");
$f->checkbox("public",array(array("professeurs","etudiants","professionnels","grand_public"),array("europeen","francais","americain","international")));
/*



$lang['intervenants']="Nombre d'intervenants";
$lang['personnes']="Nombre de personnes attendues";
Attendees

Professors

Students

Professionals

General public

European

French

American

International
*/
?>
</table>
</div>	<!-- page1 -->
<?php
/*
include "page1.php";
echo "<br/><hr/>\n";
include "page2.php";
echo "<br/><hr/>\n";
include "page3.php";
*/
?>

</center>
<br/>
<?php echo "* {$lang['obligatoire']}\n"; ?>
<br/>
<br/>
<?php echo "<input type='submit' value='{$lang['valider']}' name='valider' />\n"; ?>

</form>

</body>
</html>	
