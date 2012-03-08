Arbeitsverzeichnis
<ul>
<?php

$ordner = "files"; // ordner name
$alledatein = scandir($ordner); // dursuchen des ordners

foreach($alledatein as $datei) //dursuchen / temporär speichern in variable / ausgeben
{
$dateiinfo = pathinfo($ordner."/".$datei);// Datei info
$size = ceil(filesize($ordner."/".$datei)/1024); //Größe

if ($datei !="." && $datei != "..")
{
?>
<li><a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>"><!--Ausgabe mit html  als link zum anklicken !!-->
<?php echo $dateiinfo['filename']; ?></a> (<?php echo $dateiinfo['extension']; ?> | <?php echo $size;?>kb)</li> <!-- ausgabe der datei infos -->
<?php

}
}
?>
</ul>