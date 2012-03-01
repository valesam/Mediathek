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
$film_beschreibung = "";
#########################################################################

//$film = $_POST["film"];

//$film = "/mediathek/uploads/video.mp4";

$film_preview = "/mediathek/player/preview.jpg";

/* Damit nicht bei jedem Request das Suchfenster eingeblendet wird prüfen wir ob
* die Variable AJAX null ist, wenn dies so ist wird das Suchfeld eingeblendet,weil
* der Request für diese Datei nicht von der Suche ausgelöst wurde, diese übermittel nähmlich
* den Wert Eins für die Variable $AJAX siehe oben.
*/
if($AJAX == 0)
{
	include("funktionen/suche.html");
}
else
{
	if (!empty($Film_Titel) or 1==1)
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
}
?>
<!--
<embed type="video/divx" src="../uploads/Mabuse01.avi" custommode="none" width="800" height="660" autoPlay="false"  pluginspage="http://go.divx.com/plugin/download/"></embed>
-->

</div>
</div>
