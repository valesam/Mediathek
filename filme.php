<?php
include("secoured.php");
?>
<html>
<head><title>Die Mediathek der Schule Marienau - Filme</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script type="text/javascript" src="/player/jwplayer.js"></script>
</head>
<body>

<div id="navbar">
 <div class="grpelem">
  <a href="main.php" id="home"></a>
  <a href="filme.php" id="filme">FILME</a>
  <a href="bilder.php" id="bilder">BILDER</a>
  <a href="dokumente.php" id="dokumente">DOKUMENTE</a>
  <a href="musik.php" id="musik">MUSIK</a>
  <a href="landkarten.php" id="landkarten">LANDKARTEN</a>
  <div id="pfeil" style="margin-left: 163px;"></div>
 </div>
</div>

<div id="content">
<div id="player">
<?php
$film_ID = $_GET["ID"];
// Altes Übergabekonzept: Alle Infos werden per POST übergeben
// Neues Übergabekonzept: Nur ID wird per GET von Auswahlseite übergeben. Auf abspielseite werden benötigte Infos aus DB gelade 


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