<?php
/**
* Autor : Leon Bergmann
* Datum : 10.2.2012 10:38
* Aufgabe der Datei:  Linkverarbeitung durch einbinden der entsprechenden Datei mittels dem include Befehls 
*
*/
/** NUR ZU TEST ZWECKEN*/
// Wenn dev = 1 ist wirk keine sicherung vorgenommen
$menu_punkt="-1";
if($_GET['dev'] != 1)
{
	include "secoured.php"; /* Einbinden der Sicherung der Webseite*/
}
include "menu.html"; /* Einbinden des Menüs*/
 
/** Abfrage des übergebenen Parameters aus der menu.html*/
$link = $_GET['work'];

/** Prüft welcher Wert übergeben wurde*/
if ($link == "index")
{
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Homeseite*/ 
	$menu_punkt="7";
	include "home.php";
	
}

elseif($link == "filme")
{
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Filmgalerie */
	$Film_ID = $_GET['film_name'];
	$menu_punkt="164";
	include "filme.php";
}
elseif($link == "filme" AND !empty($_GET['film_name']))
{

}
elseif($link == "bilder")
{
	$menu_punkt="336";
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Bilergalerie */
	include "bilder.php";
}
elseif($link == "dokumente")
{
	$menu_punkt="535";
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Dokumentengalerie */
	include "dokumente.php";
}
elseif ($link == "musik")
{
	$menu_punkt="732";
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Musikgalerie */
	include "musik.php";
}
elseif($link == "landkarten")
{
	$menu_punkt="931";
	/** Aktion beim Linkparameter in diesem Falle: einbinden  des Lankartenmoduks*/
	include "landkarten.php";
}
elseif($link == "" OR empty($link))
{
	$menu_punkt="200";
}
else
{
	/** Aktion beim Linkparameter in diesem Falle: */
	$Fehler = "noLink";
	include "error.php";
}
if($link == "filme")
{
	goto a;
}
echo "</div>
<style type='text/css'>
#pfeil{
background-image: url('style/arrow.png');
background-repeat: no-repeat;
background-position: center top;
margin-top: 25px;
z-index: 10;
width: 19px;
height: 9px;
margin-left: ".$menu_punkt."px;
}
</style>
";
a:
?>
	</body>
</html>