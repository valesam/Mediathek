<?php
include("secoured.php");
?>
<html>
<head><title>Die Mediathek der Schule Marienau - Dokumente</title>
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
  <div id="pfeil" style="margin-left: 533px;"></div>
 </div>
</div>

<div id="content">
<h1>Dateiname:<?php echo $_SERVER['PHP_SELF']; ?> </h1>
<?php
include("auslesen.php");
include("hochladen.php");
?>
</div>

</body>
</html>