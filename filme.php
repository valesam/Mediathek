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
$film = $_POST["film"];

//$film = "/mediathek/uploads/video.mp4";
$film_preview = "/mediathek/player/preview.jpg";

include("funktionen/suche.html");
if (!empty($film))
{
echo "
<div id='mediaplayer'>Player nicht verfügbar!</div>
	
	<script type='text/javascript' src='/mediathek/player/jwplayer.js'></script>
	<script type='text/javascript'>
		jwplayer('mediaplayer').setup({
			flashplayer: '/mediathek/player/player.swf',
			file: '$film',
			image: '$film_preview'
		});
	</script>
	";
}
else
{
echo "Es wurde kein Film ausgewählt!";
}

?>
<!--
<embed type="video/divx" src="../uploads/Mabuse01.avi" custommode="none" width="800" height="660" autoPlay="false"  pluginspage="http://go.divx.com/plugin/download/"></embed>
-->

</div>
</div>
</body>
</html>