<?php
/**
* Autor: Florian Giller
* Datum: 9.2.2012
* Aufgabe der Datei: Filme abspielen und aus der DB laden
*/
/** Änderung von Leon Bergmann am 10.2.2012 um 15:00 */


?>
<!-- Änderung am 11.2.2012 um 15:02 vom Leon Bergmann! Änderung der Styleclass des Mediaplayers -->
<div id="mediaplayer">
<?php
$Film_Titel = $_GET["film"];
// Altes Übergabekonzept: Alle Infos werden per POST übergeben
// Neues Übergabekonzept: Nu0r ID wird per GET von Auswahlseite übergeben. Auf abspielseite werden benötigte Infos aus DB geladen 


//Hier DB abfrage der nötigen infos durch die ID
//##########################################################################
$film_pfad = "";
$film_preview = "";
$film_titel = "";
$film_beschreibung = "";
//#########################################################################

//$film = $_POST["film"];

//$film = "/mediathek/uploads/video.mp4";

$film_preview = "/mediathek/player/preview.jpg";

include("funktionen/suche.html");
if (!empty($Film_Titel))
{

echo "
<h2>$Film_Titel</h2>

<div id='mediaplayer'>Player nicht verf&uuml;gbar!</div>
	
	<script type='text/javascript' src='/mediathek/player/jwplayer.js'></script>
	<script type='text/javascript'>
		jwplayer('mediaplayer').setup({
			flashplayer: '/mediathek/player/player.swf',
			file: '$film_pfad',
			image: '$film_preview'
		});
	</script>
	
	<br><br>
	Filmbeschreibung:<br>
	$film_beschreibung
	";
}
else
{
echo "<p id='warnings'>Es wurde kein Film ausgew&auml;hlt!</p>";
}

?>
<!--
<embed type="video/divx" src="../uploads/Mabuse01.avi" custommode="none" width="800" height="660" autoPlay="false"  pluginspage="http://go.divx.com/plugin/download/"></embed>
-->

</div>
</div>
