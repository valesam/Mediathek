Arbeitsverzeichnis
<ul>
<pre>
<?php

$ordner = "files"; // ordner name

print_r ($alledatein = scandir($ordner)); // dursuchen des ordners

if(in_array("isndex.html",$alledatein))
{
echo "Es gib ne indäx";
}

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