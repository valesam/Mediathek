<?php
/***
* Autor: Leon Bergmann
* Datum: 9.2.2012 22:33
* Zweck: Behandlung von Fehlern auf der gesamten Webseite
*/



/**Überprüft die Variable Fehler auf die von uns definierten Inhalte und reagiert passend  */
if($Fehler == "noUser" )
{
 	/** Ausgabe der Fehlermeldung */
 	echo "<p id='warnings'>Sie sind kein registriertes Mitglied!</p>";
 	/** 
 	* Behandlung der Fehlermeldung durch das Einbinden des Registrierungsmoduls. Momentan noch nicht eingebunden, weil die 
 	* datei noch nicht fertig gestellt ist
 	* include "registrieren.html";
 	*/
}
elseif($Fehler == "passwortIncorrect")
{
	/** Ausgabe der Fehlermedlung */
	echo "<p id='warnings'>Falsches Passwort oder falscher Username!</p>";
	/** 
 	* Behandlung des Fehler durch das Einbinden der des Loginmoduls. 
	*/
	include "login.html";
}
elseif($Fehler == "noLink")
{
	/** Ausgabe der Fehlermedlung */
	echo "<p id='warnings'>Kein valider link</p>";
	/** 
 	* Keine Behandlung des Fehler durch das Einbinden der 404.html.Momentan noch nicht eingebunden, weil die 
 	* Datei noch nicht fertig gestellt ist
 	* include "404.html"; 
 	*/
}
elseif($Fehler == "noLogin")
{
	/** Ausgabe der Fehlermedlung */
	echo "<p id='warnings'>Sie sind nicht angemeldet</p>";
	/** 
 	* Behandlung des Fehler durch das Einbinden der des Loginmoduls. 
	*/
	include "login.html";
}
else
{
	/* Ausgabe der Fehlermeldung wenn der Fehler nicht bekannt ist */
	echo "<p id='warnings'>Unbekannter Fehler</p>";
}
?>
		</div>
	</body>
</html> 