<?php
session_start();
if(!isset($_SESSION["sitepass"]))
   {
	$Fehler="no";
	include("error.php");
	exit;
   }
?>