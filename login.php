<?php
/** 
* Autor : Leon Bergmann
* Datum : 9.2.2012 21:52
* Aufgabe der Datei: †berprŸft ob der User berechtigt ist die Mediathek zu benutzen!
*
* DafŸr wird mithilfe der Datenbank ŸberprŸft ob der User registriert ist. Danach wird das vom User eingegeben Passwort in einen SHA512 (http://de.wikipedia.org/wiki/Secure_Hash_Algorithm)
* umgewandelt, danach wird das, fals der User vorhanden ist, Passwort aus der Datenbank ebenfalls in einen 
* SHA512 Hash umgewandelt. Beide Hashes werden mit einander verglichen, sollte der eingegebene Hash dem aus der 
* Datenbank nicht gleichen, wird der User auf eine Fehlerseite glenkt und muss gegebenenfalls das Passwort wiederholen!
* Sollte das Passwort identisch sein wird eine Variable in der Session gesetzt die bei jedem Aufruf eine geschŸtzen Seite †berprŸft wird
*/ 

include "funktionen/connect.php"; // einbinden der Datenbankverbindung

$UserPasswort = $_POST['password']; // †bergabe das Passworts aus dem Formular
$Username = $_POST['username']; // †bergabe des Usernamen

$sql = "SELECT * FROM med_user where Username = '$Username'"; // SQL Query Definition die einen Datensatz aus der Datenbank abruft welcher den Username das User trŠgt

$resultOfQuery = mysql_query($sql); // AusfŸhren der oben beschriebenen Query

if(mysql_num_rows($resultOfQuery) == 0) //†berprŸfung ob die abfrage ein Ergebniss hatte | Die funktion mysql_num_rows ŸberprŸft die Anzahl der Ergebnisse (http://php.net/manual/de/function.mysql-num-rows.php)
{
	// wenn das Ergebnis 0 ist, also der User nicht in der Datenbank ist wird folgender Quellcode ausgefŸhrt:
	$Fehler = "noUser"; // Variable zu Behandlung der Ausgabe auf der Fehlerseite
	include "error.php"; // einbinden der Fehlerseite
}
else // Wenn der User in der Datenbank ist wird folgender Quellcode ausgefŸhrt
{
 $resultOfQueryFetched = mysql_fetch_object($resultOfQuery); // Das Ergebnis der SQL Abfrage wird in ein Object geschrieben | mysql_fetch_object(http://de.php.net/manual/de/function.mysql-fetch-object.php) | Object (http://php.net/manual/en/language.types.object.php)

 $DatabaseUserPasswort = $resultOfQueryFetched->Passwort; // Speichert das Passwort aus der Datenbank in einer Variable
 
 
 $DatabaseUserPasswortHashed	= hash('sha512',$DatabaseUserPasswort); // bildet einen Hash aus dem Passwort aus der Datenbank
 $UserPasswortHashed			= hash('sha512',$UserPasswort); // bildet einen Hash aus der Passworteingabe des Users
 
 if($DatabaseUserPasswortHashed != $UserPasswortHashed) // PrŸfung ob sich beide Hashes gleichen
 {
	// Wenn nein wird der User auf die Fehlerseite umgleitet und aufgefordert sein Passwort neu einzugeben 
	$Fehler = "passwortIncorrect"; // Variable zu Behandlung der Ausgabe auf der Fehlerseite
	include "error.php"; // einbinden der Fehlerseite
 }
 
 else
 {
	//wenn beide Passwšrter Ÿbereinstimmen wird eine Session eršffnet(http://de2.php.net/manual/de/intro.session.php)
	session_start(); // šffnen der Session
	$_SESSION["sitepass"]=$UserPasswortHashed; // Schreiben des Passwortes in die Session
	include "browser_info.php"; // einbinden der browser_info.php um Informationen Ÿber den Browser zusammeln
	$_SESSION['UserOs'] = $osName.$osVersion; // Speichern des Betriebssystems in der Session um bei spŠteren Aktionen diese Daten zu verwenden
	$_SESSION['UserBrowser'] = $Browser; // Speichern des Browsers in der Session um bei spŠteren Aktionen diese Daten zu verwenden
	include("main.php"); // einbinden der main.php | auf dieser Seite befinden sich alle weiteren Funktionen der Mediathek

 }
}
?>