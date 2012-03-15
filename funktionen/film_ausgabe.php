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
$maxCount = 2;
}
// Abfrage in der Datenbank: Gibt alle Daten zu dem Film mit dem selben Titel wie der vom User eingeben Titel
$sql = "Select * From med_filme";
// Ausführen der Query so wie Speichern der Rückgabe


$result		= mysql_query($sql) or DIE (mysql_error().": Ausf&uuml;hrungs error."); 		//Falls Fehler wird abgebrochen
					
$count = 0;

$ausgabe="
<div id='filmausgabe'>
";


while($row = mysql_fetch_array($result) AND $count<= $maxCount)			//Für jedes Array findet ein Durchlauf der Funktion statt
{
$count++;

//echo $row['Name']." <br> ";


$ausgabe = $ausgabe."

<div style='width:742px'>
	<div style='float:left'>
    <img src='".$row['Cover']."' border=0 style='width:105px;max-width:105px;' alt='".$row['Name']."' title='".$row['Name']."'>&nbsp;    	<BR>
    </div>
<div style='min-height:170px;'>
<span style='font-size:18px;'>
    <H1 style='font-size:18px;display:inline;'>
        <a href='#'  onclick='Suche(\"".$row['Name']."\")' style='color:#000000;'>
           ".$row['Name']."       </a>
    </H1>
  
            </span>
<div class='moviedescription'>
".$row['Beschreibung']."
</div>
<br><br>
";
}
$ausgabe = $ausgabe. "</div>";
echo $ausgabe;

?>