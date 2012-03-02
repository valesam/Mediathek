
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
$film_pfad = "..%2FMediathek%2Fuploads%2Fvideo.mp4";
$film_preview = "";
$film_titel = "Filmname";
$film_beschreibung = "<h1>Das ist ein Test</h1>";
$film_player_size = "width='470' height='320'";
#########################################################################

//$film = $_POST["film"];

//$film = "/mediathek/uploads/video.mp4";

$film_preview = "/mediathek/player/preview.jpg";

echo "<object ".$film_player_size."> <param name='movie' value='../Mediathek/player/StrobeMediaPlayback.swf'></param>
<param name='flashvars' value='src=".$film_pfad."&post=".$film_preview."'></param>
<param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param>
<param name='wmode' value='direct'></param><embed src='../Mediathek/player/StrobeMediaPlayback.swf' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' wmode='direct' ".$film_player_size." flashvars='src=".$film_pfad."&post=".$film_preview."'></embed></object>";

?>
