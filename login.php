<?php
include "funktionen/connect.php";
$UserPasswort = $_POST['password'];
$Username = $_POST['username'];

$sql = "SELECT * FROM med_user where Username = '$Username'";

$resultOfQuery = mysql_query($sql);

if(mysql_num_rows($resultOfQuery) == 0)
{
	include "error.php";
}
else
{
 $resultOfQueryFetched = mysql_fetch_object($resultOfQuery);

 $DatabaseUserPasswort = $resultOfQueryFetched->Passwort;
 
 $DatabaseUserPasswortHashed	= hash('sha512',$DatabaseUserPasswort);
 $UserPasswortHashed			= hash('sha512',$UserPasswort);
 
 if($DatabaseUserPasswortHashed != $UserPasswortHashed)
 {
	echo "Passwörter sind nicht übereinstimmend!";
	include "error.php";
 }
 else
 {
	session_start();
	$_SESSION["sitepass"]=$passwort;
	include "browser_info.php";
	$_SESSION['UserOs'] = $osName.$osVersion;
	$_SESSION['UserBrowser'] = $Browser;
	include("main.php");

 }
}
?>