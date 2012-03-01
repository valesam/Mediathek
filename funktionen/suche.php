
<?php
// Änderung am 22.2.2012 um 22:47 von Leon Bergmann von Get zu Post: Aufgrund von AJAX
$Film_Titel = $_POST["film"];
// Variable um zu überfrüfen ob der Request von einem AJAX Request stamm
$AJAX 		= $_POST["ajax"];
/* Altes Übergabekonzept: Alle Infos werden per POST übergeben
* Altes 2 Übergabekonzept: Nur ID wird per GET von Auswahlseite übergeben. Auf abspielseite werden benötigte Infos aus DB geladen 
* Neues Übergabekonzept: Alle Infos werden per POST übergeben aufgrund von AJAX
*/
//Hier DB abfrage der nötigen infos durch die den Film Titel
#########################################################################
$film_pfad = "/mediathek/uploads/video.mp4";
$film_preview = "";
$film_titel = "Filmname";
$film_beschreibung = "<h1>Das ist ein Test</h1>";
#########################################################################

//$film = $_POST["film"];

//$film = "/mediathek/uploads/video.mp4";

$film_preview = "/mediathek/player/preview.jpg";

echo $film_pfad."#".$film_preview."#".$film_beschreibung;
?>
