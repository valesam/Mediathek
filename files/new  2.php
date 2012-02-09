<?php
include "connect.php";
 $content = $_POST['editor'];
 $ID = $_POST['id'];
 $source = $_POST['source'];
 $Head = $_POST['Head'];
 $Beschreibung = $_POST['Beschreibung'];
 $Ort = $_POST['Ort'];
 $Anschrift = $_POST['Anschrift'];
 $Erweiterung = $_POST['Erweiterung'];
 $Tag = $_POST['adate'];
 
 

 // Zeiten Ende include "edit_meta.php";
 include "edit_body.php";
 $Text = $Header."\n".$body;;
 
 
 $sql = "INSERT INTO '$content', Beschreibung = '$Beschreibung',SeitenTitel = '$Head',Ort = '$Ort', Anschrift = '$Anschrift',Erweiterung = '$Erweiterung',Datum ='$Datum',Von = '$von', Bis = '$bis' where ID = '$ID'";
 mysql_query($sql) or die (mysql_error());
 
 $FilePointer = fopen($source, "w");
 fwrite($FilePointer, $Text);
 fclose($FilePointer);
 $ex = "mv $source ../workshop";
 exec($ex);
 mysql_close($verbindung);
 echo "Zurueck zur Auswahl";
 