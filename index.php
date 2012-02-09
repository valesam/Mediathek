<?php
session_start();
if(isset($_SESSION["sitepass"]))
   {
	include("main.php");
	exit;
   }
?>
<html>
<head><title>Die Mediathek der Schule Marienau</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<div id="navbar">
 <div class="grpelem">
  <a href="index.php" id="home"></a>
  <a href="filme.php" id="filme">FILME</a>
  <a href="bilder.php" id="bilder">BILDER</a>
  <a href="dokumente.php" id="dokumente">DOKUMENTE</a>
  <a href="musik.php" id="musik">MUSIK</a>
  <a href="landkarten.php" id="landkarten">LANDKARTEN</a>
  <div id="pfeil" style="margin-left: 8px;"></div>
 </div>
</div>

<div id="content">
<form action="login.php" method="post" id="login_form">
<table border="0" cellpadding="3" cellspacing="0">
    <tr>
      <td>Mit dem richtigen Zugangs-Code k&ouml;nnen Sie sich einloggen:</td>
    </tr>
	
	<tr>
		<td><br /></td>
	</tr>
    
	<tr>
		<td> Username:<input type="text" size="24" maxlength="50" name="username"></td>
    </tr>  
	
	<tr>
		<td><br /></td>
	</tr>
	
	<tr>
		<td>Passwort:<input type="password" size="24" maxlength="50" name="password"></td>
	</tr>
	<tr>
		<td><br /></td>
	</tr>
	<tr>
		<td><input type="submit" value="Login"></td>
	 </tr>
	
	

</form>
</div>

<div class="preload_images">
 <img class="preload" src="homehover.png" alt="preload image"></img>
</div>

</body>
</html>