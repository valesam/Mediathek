<?php
include("secoured.php");
?>
<html>
<head><title>Die Mediathek der Schule Marienau - Landkarten</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
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
  <div id="pfeil" style="margin-left: 930px;"></div>
 </div>
</div>


<div id="content">
<div id="googlemaps">
<h1><?php echo $PHP_SELF; ?> </h1>
<iframe width="90%"height="90%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.de/maps?f=q&amp;source=s_q&amp;hl=de&amp;geocode=+&amp;q=marienau&amp;ie=UTF8&amp;hq=marienau&amp;hnear=Bleckede,+L%C3%BCneburg,+Niedersachsen&amp;t=m&amp;vpsrc=6&amp;ll=53.205437,10.724372&amp;spn=0.011219,0.033023&amp;z=14&amp;iwloc=A&amp;cid=4274030099133855457&amp;output=embed"></iframe><br /><small><a href="http://maps.google.de/maps?f=q&amp;source=embed&amp;hl=de&amp;geocode=+&amp;q=marienau&amp;ie=UTF8&amp;hq=marienau&amp;hnear=Bleckede,+L%C3%BCneburg,+Niedersachsen&amp;t=m&amp;vpsrc=6&amp;ll=53.205437,10.724372&amp;spn=0.011219,0.033023&amp;z=14&amp;iwloc=A&amp;cid=4274030099133855457" style="color:#0000FF;text-align:left">Größere Kartenansicht</a></small>
</div>
</div>

</body>
</html>