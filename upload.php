<?php
$dateiname = $_FILES['datei']['name'];
$dateityp  = explode(".",$dateiname);
if($dateityp[1] == "mp4" OR $dateityp[1] == "flv" OR $dateityp[1] == "3gp")
{
	move_uploaded_file($_FILES['datei']['tmp_name'], "uploads/".$dateiname);
	echo $dateiname." hochgeladen!";
	
	

	//Serverconnection Daten
	include("connect.php");

	// Abfrage der Daten aus dem Vorherigen Formular
	$Filmtitel = $_POST['Name']; // Daten aus dem Vormular
	$Genre = $_POST['Genre'];// Daten aus dem Vormular
	$FSK = $_POST['FSK'];// Daten aus dem Vormular
	$Bewertung = $_POST['Bewertung'];// Daten aus dem Vormular
	$file_name = $_POST['file_name'];// Daten aus dem Vormular
	
	$sql = "INSERT INTO med_filme (Filmtitel,FSK,Bewertung,Genre) VALUES ('$Filmtitel','$FSK,$Bewertung','$Genre')";
	echo $sql;
	// Verbimdungs aufbau mit Abruch bei Fehlern
	//mysql_connect($host,$user) or die (mysql_error().". Host");
	//mysql_select_db($db) or die(mysql_error().". db");
	//mysql_query($sql) or die (mysql_error());

	
	
}
else
{
	echo "Der Film den Sie hochladen m&ouml;chten ist in einem nicht zul&auml;ssigen Format. Bitte konvertieren Sie ihn in ein geiegnetes Format HIER LINK FÜR ZUKÜCK EINFÜGEN UND DATEN AUS DEM FORMULAR WEIDER EINFÜGREN";
}

?>
