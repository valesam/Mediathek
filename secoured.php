<?php
session_start();
if(!isset($_SESSION["sitepass"]))
   {
	include("error.php");
	exit;
   }
?>