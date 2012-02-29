<?php
//Autor: Florian Giller auf Grundlage von Leon Bergmann
//Datum: 24.02.2012
//Anlegen eines neuen Benutzters
include "connect.php";
session_start();
if(!empty($_POST['username']) or !empty($_POST['password']) or !empty($_POST['password_check'])  )
{

	$Benutername = $_POST['username'];
	
	$newPasswort = $_POST['password'];
	$newPasswortCheck = $_POST['password_check'];
	
	$newPasswortHashed = hash('sha512',$newPasswort);
	$newPasswortCheckHashed = hash('sha512',$newPasswortCheck);
	$Email = $_POST['email'];
	if($newPasswortHashed != $newPasswortCheckHashed)
	{

		$Fehler = "passwortNotMatch"; /* Variable zu Behandlung der Ausgabe auf der Fehlerseite */
		include "../error.php"; /* einbinden der Fehlerseite */
	}
	else
	{
		$rest	= mysql_query("SELECT * FROM med_user where Username = '$Username'");
		if(mysql_num_rows($rest) != 0)
		{
			
		$Fehler = "usernameAlreadyExist"; /* Variable zu Behandlung der Ausgabe auf der Fehlerseite */
		include "../error.php"; /* einbinden der Fehlerseite */
		}
		else
		{
			$sql = "INSERT INTO med_user (Username,Passwort,Email) VALUES ('$Benutername','$newPasswortCheckHashed','$Email')";
			$rests = mysql_query($sql);
			echo "<font color='#00FF00'><b>Neuer Benutzer angelegt!</b></font>";
			$_SESSION['sitepass'] = 1;
			

		}
		
	}
}
else
{
	$Fehler = "usernameAlreadyExist"; /* Variable zu Behandlung der Ausgabe auf der Fehlerseite */
		include "../error.php"; /* einbinden der Fehlerseite */
		
}
?>