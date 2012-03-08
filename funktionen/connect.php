<?php
//Serverconnection Daten
$host		= "localhost"; //Server der Datenbank
$user		= "root"; //User (mit allen rechten)| wird noch ge�ndert
#$pass		= "8uhbgt5";
$db			= "mediathek";
mysql_connect($host,$user,$pass);
mysql_select_db($db);
?>