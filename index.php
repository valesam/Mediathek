
<?php
/**
* Autor: Leon Bergmann
* Datum: 9.2.2012 22:21
* Zweck : Seite die als aller erstes Aufgerufen wird wenn die Mediathek geöffnet wird. Hier Kann sich der User einlogen.
*/
include "menu.html";

?>

<!--
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
-->

		
			<form action="login.php" method="post" id="login_form">
				<ul>
					<li>
						Username:
						<ul>
							<li><input type="text" name="username" /></li>
						</ul>
					</li>
					<li>
						Passwort:
						<ul>
							<li><input type="password" name="password" /></li>
						</ul>
					</li>
					<li>
						<input type="submit" Value="login" />
					</li>
					<li>
						<!-- Noch nicht möglich da Modul noch nicht vorhanden <a href="registrieren.html" target="_self" >Hier registrieren</a> -->
					</li>
				</ul>
			</form>
		
	</body>
</html>