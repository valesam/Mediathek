<?php
$dateiname = $_FILES['datei']['name'];
$dateityp  = explode(".",$dateiname);
if($dateityp[1] == "mp4" OR $dateityp[1] == "flv" OR $dateityp[1] == "3gp")
{
	move_uploaded_file($_FILES['datei']['tmp_name'], "uploads/".$dateiname);
	echo $dateiname." hochgeladen!";

}
else
{
	echo "Der Film den Sie hochladen m&ouml;chten ist in einem nicht zul&auml;ssigen Format. Bitte konvertieren Sie ihn in ein geiegnetes Format";
}

?>