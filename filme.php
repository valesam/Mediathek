<?php
/**
* Autor: Florian Giller
* Datum: 9.2.2012
* Aufgabe der Datei: Filme abspielen und aus der DB laden
*/
/** Änderung von Lein Bergmann am 10.2.2012 um 15:00 */


?>

<div id="player">
<?php
$film_ID = $_GET["ID"];
// Altes Übergabekonzept: Alle Infos werden per POST übergeben
// Neues Übergabekonzept: Nur ID wird per GET von Auswahlseite übergeben. Auf abspielseite werden benötigte Infos aus DB geladen 


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
if (!empty($film))
{
echo "
<h2>$film_titel</h2>

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
echo "Es wurde kein Film ausgew&auml;hlt!";
}

?>
<!--
<embed type="video/divx" src="../uploads/Mabuse01.avi" custommode="none" width="800" height="660" autoPlay="false"  pluginspage="http://go.divx.com/plugin/download/"></embed>
-->

</div>
</div>
</body>
</html>