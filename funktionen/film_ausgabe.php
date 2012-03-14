<?php
include "connect.php";

// Übergebener Film Name
 ;
if ($_GET["all"] == "1")
{
$maxCount = 10;
}
else
{
$maxCount = 5;
}
// Abfrage in der Datenbank: Gibt alle Daten zu dem Film mit dem selben Titel wie der vom User eingeben Titel
$sql = "Select * From med_filme";
// Ausführen der Query so wie Speichern der Rückgabe


$result		= mysql_query($sql) or DIE (mysql_error().": Ausf&uuml;hrungs error."); 		//Falls Fehler wird abgebrochen
					
$count = 0;
while($row = mysql_fetch_array($result) AND $count<= $maxCount)			//Für jedes Array findet ein Durchlauf der Funktion statt
{
$count++;
echo $row['name'].", <br> ";
}
mysql_close($verbindung);				//Datenbankverbindung wird geschlossen

?>