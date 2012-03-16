<?php
/*
* Autor: Florian Giller	
* Datum: 2012-03-08
* Aufgabe: Uploaden einer Video-Datei + Schreiben der Video/Uploader Informationen in die Datenbank
* Abkürzungen: DB = Datenbank, 
* Rechtschreibfehler sind gewollt und dienen zur Verschönerung des Textes!
*/



/*	Die Daten aus dem vorherigen Formular werden in Sessions gespeichter, damit sie wieder bei der Korrektur der Eingaben, 
* 	in das Formular geladen werden können

*/	
function datenAnsFormular()
{
	$_SESSION["fehlerImUpload"] 	= true;
	$_SESSION['Name_cor'] 			= $_POST['Name']; // Daten aus dem Formular - Name des Films 
	$_SESSION['Genre_cor'] 			= $_POST['Genre'];// Daten aus dem Vormular
	$_SESSION['Beschreibung_cor']	= $_POST['Beschreibung'];// Daten aus dem Formular
	$_SESSION['High']				= $_POST['Hight'];
	$_SESSION['Width']				= $_POST['Width'];
	
	//exit;	//Bricht alles ab
}




session_start();
// Daten des Film	
$dateinameFilm = $_FILES['datei']['name'];
$dateitypFilm  = explode(".",$dateinameFilm);
// Daten des Covers
$dateinameCover = $_FILES['cover']['name'];
$dateitypCover  = explode(".",$dateinameCover);



/*	Der Inhalt, alle Dateien, des Upload-Ordner werden in ein Array geschrieben "scandir('uploads')" und dannach überprüft "in_array", 
*	ob der Name der hochzuladenen Datei "$dateiname" schon für eine Datei im Upload-Ordner benutzt wird bzw. im Array steht.
*/
if(in_array($dateinameFilm,scandir("uploads"))) 
{
	//Fehlerausgabe wenn Bedingung erfüllt
	datenAnsFormular();
	$Fehler = "vorhanden";
	include "error.php";
}
else
{

// Abfrage von Der Dateityp mp4, flv order 3gp ist
if($dateitypFilm[1] == "mp4" OR $dateitypFilm[1] == "flv" OR $dateitypFilm[1] == "3gp" OR $dateitypFilm[1] == "wmv")
{
	if($dateitypCover[1] == "jpg" OR $dateitypCover[1] == "png")
	{
	move_uploaded_file($_FILES['cover']['tmp_name'],"uploads/".$dateinameCover);
	
	// Verschieb die hochgeladenen Datei in den Ordner uploads
	move_uploaded_file($_FILES['datei']['tmp_name'], "uploads/".$dateinameFilm);
	
	echo $dateiname." hochgeladen!";
	

	//Serverconnection Daten
	include("funktionen/connect.php");

	
	
	// Abrufen der Daten aus dem Vorherigen Formular
	$Filmtitel = $_POST['Name']; // Daten aus dem Formular
	$Genre = $_POST['Genre'];// Daten aus dem Vormular
	$Beschreibung = $_POST['Beschreibung'];// Daten aus dem Formular
	$Hight = $_POST['Hight'];
	$Width = $_POST['Width'];
	$location = "http://webserver/Mediathek/uploads/".$dateinameFilm; // Kompletter Dateipfad wird für die Datenbank geschrieben
	$locationCover = "http://webserver/Mediathek/uploads/".$dateinameCover;
	// Daten über den Uploader werden gesammelt
	
	// Ip des Uplaoders
	if (! isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$client_ip = $_SERVER['REMOTE_ADDR']; 
	}
	else {
	$client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	
	
	$result 	= $_SERVER['HTTP_USER_AGENT'];

	$result2 	= explode("(",$result);
	$result3	= explode(")",$result2[1]);
	$osRow 		= explode(";",$result3[0]);		
	$user_os	= $osRow[0];						//Betriebssystem
	$result4 	= explode(" ",$result3[1]);
	$browser	= $result4[2];						//Browser
	
	if (!empty($_SESSION['user']))					//Username; 
	{
	$userName = $_SESSION['user'];
	}
	else { $userName = "Nomand"; }
	
	

	/*	Inhalt für die SQL_QUERY wird gesetzt; Informationen die in die Datenbank geschrieben werden sollen
	*	Informationen für die Datenbank: Name des Films, Genre, Beschreibung, SpeicherOrt des Filmes auf dem Server, IP des Uploader, System des Uploader, Browser des Uploaders, Name des Uploaders, aktuelles Datum
	*/	
	$sql = "INSERT INTO med_filme (name,Cover,Genre,Beschreibung,SpeicherOrt,UploaderIP,UploaderSystem,UploaderBrowser,Uploader,Datum,height,width) VALUES ('$Filmtitel','$locationCover','$Genre','$Beschreibung','$location','$client_ip','$user_os','$browser','$userName',NOW(),'$Hight','$Width')";

	
	//Abschicken des SQL-Statemant an die DB
	mysql_query($sql);
	
	// In eine Session wird gescheichter das es keinen Fehler im Upload gab
	$_SESSION["fehlerImUpload"] = false;
	$_GET['work'] = "filme";
	include "main.php";
	}
	else
	{
		datenAnsFormular();
		$Fehler = "formatCover";
		include "error.php";
	}
	
}
else
	{
	// Ausagbe des Fehlers falls Dateitype nicht den Vorgaben entspricht
	datenAnsFormular();
	$Fehler = "format";
	include "error.php";
	}
}
?>
