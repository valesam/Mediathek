<?php
/**
* Autor : Leon Bergmann
* Datum : 10.2.2012 10:38
* Aufgabe der Datei:  Linkverarbeitung durch einbinden der entsprechenden Datei mittels dem include Befehls 
*
*/

include "secoured.php"; /* Einbinden der Sicherung der Webseite*/
include "menu.html"; /* Einbinden des Menüs*/
 
/** Abfrage des übergebenen Parameters aus der menu.html*/
$link $_GET['work'];

/** Prüft welcher Wert übergeben wurde*/
if ($link == "index")
{
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Homeseite*/ 
	include "home.php";
}
elseif($link == "filme")
{
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Filmgalerie */
	include "film.php";
}
elseif($link == "bilder")
{
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Bilergalerie */
	include "bilder.php";
}
elseif($link == "dokumente")
{
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Dokumentengalerie */
	include "dokumente.php";
}
elseif ($link == "musik")
{
	/** Aktion beim Linkparameter in diesem Falle: einbinden der Musikgalerie */
	include "musik.php";
}
elseif($link == "landkarten")
{
	/** Aktion beim Linkparameter in diesem Falle: einbinden  des Lankartenmoduks*/
	include "lankarten.php";
}
else
{
	/** Aktion beim Linkparameter in diesem Falle: */
	$Fehler = "noLink";
	include "error.php";
}
?>
