<?php
//Autor: Florian Giller
//Funktion: durchsuchen der Datenbank nach Eintrag und anschließende Ausgabe der Ergebnisse in einer Tabelle




//Serverconnection Daten
include("connect.php");


// Abfrage der Daten aus dem Vorherigen Formular
$Filmtitel	= $_POST['Name']; // Daten aus dem Vormular
$Genre		= $_POST['Genre'];// Daten aus dem Vormular
$FSK		= $_POST['FSK'];// Daten aus dem Vormular
$Bewertung	= $_POST['Bewertung'];// Daten aus dem Vormular

mysql_connect($host,$user,$pass) or die (mysql_error().". Host");
mysql_select_db($db) or die(mysql_error().". db");
//SQL Statments
$sql 		= "SELECT Filmtitel,FSK,Bewertung From Filme Where Filmtitel='".$Filmtitel."' OR Genre = '".$Genre."' OR FSK <= ".$FSK;


// SQL-Statment zur abfrage der Vorhandene Filme in der Datenbank mit den vom User übergeben Parametern
// Verbimdungs aufbau mit Abruch bei Fehlern 



$result = mysql_query($sql);// Abschicken des SQl Statements


//Ausgabe der Ergebenisse der Querry (Einfaches Layoute: Bessere wird von Valerio noch gelifert)


// noch Überschriften (Wird noch um geschrieben)

//neue Zeile
//neue Zeile
//abschluss der Spalte
// Daten

// Table erzeigt eine Tabbelle 
echo "<table border='2px'>"
	
	."<tr>"				//neue Headzeile
	."<th>FSK</th>"			//Überschriften der Spalten
	."<th>Filmtitel</th>"
	."<th>Bewertung</th>"
	."<th></th>"
	."</tr>";




// Verarbeiten der Querry || Die Ergebenisse werden in ein Object mit verschiedenen Beiteichnungen geschrieben | Aufzurufen über $row->"Spaltennamen der DB"
//Letzte Spalte der Tabelle: Übergabe des Pfades der Datei. Mögliche andere Übergabemethode wünschenswert

while($row = mysql_fetch_object($result)){

echo "<tr>
<td><input type='radio' name='Wahl' value=''></td>
<td>".$row->FSK."</td><td>".$row->Filmtitel."</td>
<td>Noch Leer</td>
<td><button name='clickbutton'  type='submit' value='pfad=".$row->film_pfad."' ></button></td>
</tr>";




	
while($row = mysql_fetch_object($result))// Verarbeiten der Querry || Die Ergebenisse werden in ein Object mit verschiedenen Beiteichnungen geschrieben | Aufzurufen über $row->"Spaltennamen der DB"
{
	echo "<tr><td><input type='radio' name='Wahl' value=''></td>
	<td>".$row->FSK."</td><td>".$row->Filmtitel."</td><td>Noch Leer</td>
	<td><a herf='?ID=".$row->ID."'</td>
	</tr>";

}

echo "</table>";

?>