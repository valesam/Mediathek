<?php
//Serverconnection Daten
$host		= "localhost"; //Server der Datenbank
$user		= "root"; //User (mit allen rechten)| wird noch geändert
$db			= "Mediatheke";

// Abfrage der Daten aus dem Vorherigen Formular
$Filmtitel	= $_POST['Name']; // Daten aus dem Vormular
$Genre		= $_POST['Genre'];// Daten aus dem Vormular
$FSK		= $_POST['FSK'];// Daten aus dem Vormular
$Bewertung	= $_POST['Bewertung'];// Daten aus dem Vormular
$file_name	= $_POST['file_name'];// Daten aus dem Vormular





//SQL Statments
$sql 		= "SELECT Filmtitel,FSK,Bewertung From Filme Where Filmtitel='".$Filmtitel."' OR Genre = '".$Genre."' OR FSK <= ".$FSK."";// SQL-Statment zur abfrage der Vorhandene Filme in der Datenbank mit den vom User übergeben Parametern
echo $sql;
// Verbimdungs aufbau mit Abruch bei Fehlern 
mysql_connect($host,$user) or die (mysql_error().". Host");
mysql_select_db($db) or die(mysql_error().". db");

$sql = "INSERT INTO Mediatheke (Filmtitel,FSK,Bewertung,Genre) VALUES ('$Filmtitel','$FSK,$Bewertung','$Genre')";
mysql_query($sql) or die (mysql_error());




$result = mysql_query($sql);// Abschicken des SQl Statements


//Ausgabe der Ergebenisse der Querry (Einfaches Layoute: Bessere wird von Valerio noch gelifert)

// Table erzeigt eine Tabbelle 
echo "<table border='2px'>"
	// noch Überschriften (Wird noch um geschrieben)
	."<tr>"//neue Spalte
	."<td>FSK</td>"//neue Zeile
	."<td>Filmtitel</td>"//neue Zeile
	."<td>Bewertung</td>"
	."</tr>";//abschluss der Spalte
	// Daten
while($row = mysql_fetch_object($result))// Verarbeiten der Querry || Die Ergebenisse werden in ein Object mit verschiedenen Beiteichnungen geschrieben | Aufzurufen über $row->"Spaltennamen der DB"
{
echo "<tr>"//neue Spalte
	."<td><input type='radio' name='Wahl' value=''></td>"
	.'<td>'.$row->FSK.'</td>' //neue Zeile
	."<td>".$row->Filmtitel."</td>" // neue Zeile
	."<td>Noch Leer</td>" // neue Zeile
	."</tr>"; // Abschluss der Spalte
}

echo "</table>";

?>