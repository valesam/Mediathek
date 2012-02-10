<?php
/**
* Autor: Florian Giller
* Datum : unbekannt
* Aufgabe : Auslesesen aller relevanten Daten des Clientbrowsers
*/
$result 	= $_SERVER['HTTP_USER_AGENT'];


$result2 	= explode("(",$result);
$result3	= explode(")",$result2[1]);
$osRow 		= explode(";",$result3[0]);
$osName		= $osRow[0];
$osVersion	= $osRow[1];

$result4 	= explode(" ",$result3[1]);
$browser	= $result4[2];

?>