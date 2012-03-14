<?php
/*
* Autoren: Leon Bergmann Florian Giller
* Datum  : ab 2 März 2012 bis Fertigstellung
* Zweck  : Auslesen der Daten des Gewählten Films aus der Datenbank sowie das bereitstellen des Players
*/ 
//einbinden der Verbindung zur Datenbank
include "connect.php";

// Übergebener Film Name
$Film_Titel 		= $_POST["film"];
// Abfrage in der Datenbank: Gibt alle Daten zu dem Film mit dem selben Titel wie der vom User eingeben Titel
$sql = "Select * From med_filme Where Name LIKE '$Film_Titel'";
// Ausführen der Query so wie Speichern der Rückgabe

$result = mysql_query($sql);
if(mysql_num_rows($result) == 0)
{
Echo "<p id='warnings'>Es gibt keinen solchen Film in unserer Datenbank</p># ";
exit;
}
// Verarbeiten der Rückgabe
$resultAsAObject = mysql_fetch_object($result);

#########################################################################
$Film_Titel 		= htmlentities($_POST["film"], ENT_QUOTES);
$film_pfad         	= $resultAsAObject->SpeicherOrt;
$film_preview      	= $resultAsAObject->Cover;
$film_beschreibung 	= htmlentities($resultAsAObject->Beschreibung, ENT_QUOTES);
$film_beschreibung  = chunk_split($film_beschreibung,80, "<br />");
$film_player_size 	= "width='$resultAsAObject->width' height='$resultAsAObject->height'";

#######################################################################
// Ausgabe des Player 
if($film_player_size == "width='' height=''")
{
	$film_player_size = "width='640' height='480'";
}
echo "<div class='Beschreibung Title'>
		<lable>$Film_Titel</lable>
	  </div>";
echo "<div class='Beschreibung Box'><p>$film_beschreibung</p></div>";
echo "#";
echo "<object ".$film_player_size."><param name='movie' value='http://webserver/Mediathek/player/StrobeMediaPlayback.swf'></param>
<param name='flashvars' value='src=".$film_pfad."&poster=".$film_preview."'></param>
<param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param>
<param name='wmode' value='direct'></param><embed src='http://webserver/Mediathek/player/StrobeMediaPlayback.swf' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' wmode='direct' ".$film_player_size." flashvars='src=".$film_pfad."&poster=".$film_preview."'></embed></object>";

?>
