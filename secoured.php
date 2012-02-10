<?php
session_start();
if(!isset($_SESSION["sitepass"]))
   {
	$Fehler="noLogin";
	include "menu.html";
	include "error.php";
	exit;
   }
?>